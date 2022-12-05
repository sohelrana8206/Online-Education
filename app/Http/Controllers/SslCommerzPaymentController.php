<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Referral_agent;
use App\Referral_package;
use App\Course_enrollment;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;

class SslCommerzPaymentController extends Controller
{

    public function index(Request $request)
    {

        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "transactions"
        # In "transactions" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $price = $request->input('price');
        $origin_cost = $request->input('origin_price');
        $packageID = $request->input('packageID');
        $enrollmentID = $request->input('enrollmentID');

        $post_data = array();
        $post_data['total_amount'] = $price; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = auth()->user()->name;
        $post_data['cus_email'] = auth()->user()->email;
        $post_data['cus_add1'] = "Dhaka";
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "Dhaka";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "1207";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '01738451191';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['num_of_item'] = 2;
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
//        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('transactions')
            ->where('tran_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'origin_cost' => $origin_cost,
                'status' => 'Pending',
                'tran_id' => $post_data['tran_id'],
                'currency' => $post_data['currency'],
                'created_at' => date('Y-m-d H:i:s')
            ]);

        if(!empty($enrollmentID)){
            $enrollment = Course_enrollment::find($enrollmentID);
            $enrollment->tran_id = $post_data['tran_id'];
            $enrollment->save();
        }else{
            $userID = Referral_agent::where('user_id',auth()->user()->id)->first();

            if(!empty($userID)){
                $referral_package = Referral_package::find($packageID);
                $today = date('Y-m-d');
                $referral_agent = Referral_agent::find($userID->id);
                $referral_agent->tran_id = $post_data['tran_id'];
                $referral_agent->referral_package_id = $packageID;
                $referral_agent->package_end_date = date('Y-m-d',strtotime($today.' + '.$referral_package->duration.' Months'));
                $referral_agent->save();
            }else{
                $referral_package = Referral_package::find($packageID);
                $today = date('Y-m-d');
                $referral = new Referral_agent;
                $referral->user_id = auth()->user()->id;
                $referral->referral_package_id = $packageID;
                $referral->referral_code = strtoupper(uniqid('FTCB'));
                $referral->package_start_date = $today;
                $referral->package_end_date = date('Y-m-d',strtotime($today.' + '.$referral_package->duration.' Months'));
                $referral->tran_id = $post_data['tran_id'];
                $referral->save();
            }
        }

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function success(Request $request)
    {

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_detials = DB::table('transactions')
            ->where('tran_id', $tran_id)
            ->select('id','tran_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $validation = $sslc->orderValidate($tran_id, $amount, $currency, $request->all());

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */

                //dd(session('userID'));

                $update_product = DB::table('transactions')
                    ->where('tran_id', $tran_id)
                    ->update(['status' => 'Complete', 'updated_at'=>date('Y-m-d H:i:s')]);

                $enrollment = Course_enrollment::where('tran_id',$tran_id)->first();

                if(!empty($enrollment)){
                    DB::table('course_enrollments')
                        ->where('tran_id', $tran_id)
                        ->update(['status' => 1,'is_payment' => 1]);

                    return redirect('dashboard')
                        ->with('toast_success','Transaction is successfully Completed.');
                }else{
                    DB::table('referral_agents')
                        ->where('tran_id', $tran_id)
                        ->update(['status' => 1]);

                    return redirect('dashboard')
                        ->with('toast_success','Transaction is successfully Completed.');
                }
            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $update_product = DB::table('transactions')
                    ->where('tran_id', $tran_id)
                    ->update(['status' => 'Failed', 'updated_at'=>date('Y-m-d H:i:s')]);
                echo "validation Fail";
            }
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            echo "Transaction is successfully Completed";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('transactions')
            ->where('tran_id', $tran_id)
            ->select('tran_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('transactions')
                ->where('tran_id', $tran_id)
                ->update(['status' => 'Failed', 'updated_at'=>date('Y-m-d H:i:s')]);
            echo "Transaction is Falied";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('transactions')
            ->where('tran_id', $tran_id)
            ->select('tran_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('transactions')
                ->where('tran_id', $tran_id)
                ->update(['status' => 'Canceled', 'updated_at'=>date('Y-m-d H:i:s')]);
            echo "Transaction is Cancel";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('transactions')
                ->where('tran_id', $tran_id)
                ->select('tran_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($tran_id, $order_details->amount, $order_details->currency, $request->all());
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('transactions')
                        ->where('tran_id', $tran_id)
                        ->update(['status' => 'Processing', 'updated_at'=>date('Y-m-d H:i:s')]);

                    echo "Transaction is successfully Completed";
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = DB::table('transactions')
                        ->where('tran_id', $tran_id)
                        ->update(['status' => 'Failed', 'updated_at'=>date('Y-m-d H:i:s')]);

                    echo "validation Fail";
                }

            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

}
