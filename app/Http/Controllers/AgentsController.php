<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Referral_agent;
use App\Referred_student;
use App\Course;
use App\Course_package;
use App\Course_enrollment;
use App\Payment;
use App\Personal_information;
use Spatie\Permission\Models\Role;
use DB;

class AgentsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:pending-agent-list', ['only' => ['pending_agent_list']]);
        $this->middleware('permission:agent-list', ['only' => ['agent_list']]);
        $this->middleware('permission:suspended-agent-list', ['only' => ['suspended_agent_list']]);
    }

    public function pending_agent_list()
    {
        $data = User::with('personal_information')->whereHas("roles", function($q){ $q->where("name", "Agent"); })->where('is_active',0)->orderBy('id','DESC')->get();
        return view('backend.agents.pending_agents_list',compact('data'));
    }

    public function agent_list(){
        $data = User::with('personal_information')->whereHas("roles", function($q){ $q->where("name", "Agent"); })->where('is_active',1)->orderBy('id','DESC')->get();
        return view('backend.agents.agents_list',compact('data'));
    }

    public function suspended_agent_list(){
        $data = User::with('personal_information')->whereHas("roles", function($q){ $q->where("name", "Agent"); })->where('is_active',2)->orderBy('id','DESC')->get();
        return view('backend.agents.suspended_agent_list',compact('data'));
    }

    public function account_summery(){
        $id = auth()->user()->id;
        $referral_code = Referral_agent::where('user_id',$id)->select('referral_code','commission_rate')->first();
        $output = new Referred_student();
        $outputs = $output->my_referred_enrolled_studrnt($referral_code->referral_code);
        $earnings = $output->monthly_earning($referral_code->referral_code,$referral_code->commission_rate);

        $commissionPaid = Payment::where([['user_id',$id],['is_withdraw',1]])->sum('paid_amount');
        $withdrawRequest = Payment::where([['user_id',$id],['is_withdraw',0]])->first();
        $monthlyWithdraw = DB::table('payments')
            ->where([['user_id',$id],['is_withdraw',1]])
            ->select('created_at', DB::raw('SUM(paid_amount) as totalWithdraw'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        $totalEarning = 0;
        foreach($outputs['student'] as $std){
            $stdID = $std->studentID;
            $courseInfo = Course_enrollment::where('user_id',$stdID)->get();
            foreach($courseInfo as $course){
                $courseFee = DB::table('transactions')->where([['tran_id',$course->tran_id],['status','Complete']])->first();
                $totalEarning = $totalEarning + $courseFee->origin_cost;
            }
        }

        $totalCommission = ($totalEarning * $referral_code->commission_rate) / 100;
        $totalOutstanding = $totalCommission - $commissionPaid;

        return view('backend.agents.account_summery',compact('totalCommission','totalOutstanding','commissionPaid','earnings','monthlyWithdraw','withdrawRequest'));
    }
}
