<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Designation;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Session;
use DB;
use App\Http\Requests;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
	protected $maxLoginAttempts =2; // Amount of bad attempts user can make
	protected $lockoutTime = 60;

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
	 protected function authenticated($request, $user)
    {
        if($user->remember_token=='') 
		{
            return redirect('/resetPassword/'. $user->id.'/edit');
        }
		// elseif($user->role =='employee')
		 // {
            // return redirect()->intended('/statelist');
        // }
				$designations =  DB::table('designations')->where('id',$user->designationId)->value('designation');
				if($designations == "superAdmin")
				{
					$request->session()->put('entityId',$user->entityId);
					$request->session()->put('designationId',$user->designationId);
					return redirect()->intended('/statelist');
				}
				else{
		 		$request->session()->put('entityId',$user->entityId);
		 		$request->session()->put('designationId',$user->designationId);
					$stateId =  DB::table('addresses')->where('entityId', $user->entityId)->value('stateId');
					$request->session()->put('currentStateId',$stateId);	
					return redirect()->intended('/employee');
				}
    }
	
		//$redirectTo = '/statelist';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
		
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
			'username' => 'required|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
	

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
			'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
	
	 
}
