<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Course;
use App\Course_package;
use App\Course_enrollment;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    //use ThrottlesLogins;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {

        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);

        if(isset($request->courseID)){
            $courseInfo = explode('_',$request->courseID);
            if($courseInfo[1] == 'course'){
                $courseData = Course::where('id',$courseInfo[0])->first();
                $enrollmentData = array(
                    'course_id' => $courseInfo[0],
                    'type' => $courseInfo[1],
                    'user_id' => $user->id,
                    'enrollment_start_date' => date('Y-m-d',strtotime($courseData->course_cost->last()->course_start_date)),
                    'enrollment_end_date' => date('Y-m-d',strtotime($courseData->course_cost->last()->course_start_date.' + '.$courseData->course_duration.' Days')),
                );
                Course_enrollment::create($enrollmentData);
            }else{
                $courseData = Course_package::where('id',$courseInfo[0])->first();
                $enrollmentData = array(
                    'course_id' => $courseInfo[0],
                    'type' => $courseInfo[1],
                    'user_id' => $user->id,
                    'enrollment_start_date' => date('Y-m-d',strtotime($courseData->course_package_cost->last()->package_start_date)),
                    'enrollment_end_date' => date('Y-m-d',strtotime($courseData->course_package_cost->last()->package_start_date.' + '.$courseData->package_duration.' Days')),
                );
                Course_enrollment::create($enrollmentData);
            }

        }
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials['is_active'] = 1;

        return $credentials;
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        // Load user from database
        $user = User::where($this->username(), $request->{$this->username()})->first();

        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if ($user && \Hash::check($request->password, $user->password) && $user->is_active != 1) {
            $errors = [$this->username() => 'Your account is not active.'];
        }

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
}
