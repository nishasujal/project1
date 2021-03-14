<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Input;
use Validator;
use Redirect;
Use Auth;
Use DB;
//Use Resources to convert into json
// use App\Http\Resources\UserResource as UserResource;
class UserController extends Controller
{
    public function getinsert(Request $request)
    {
    	echo"hai";
    	exit;
        $user = new User;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->save();
        return response()->json($users);
    }



    #Function to load login page for admin- 24/01/2021
	public function adminlogin()
	{
    	return view('admin.auth.login');
  }

	#Function for adminLogin: 24/01/2021
  public function admindologin()
  {
   	$input = Input::all();
    $validate = Validator::make(Input::all(), [
          'email' => 'required',
        'password' => 'required'

      ]);
    if (!$validate->fails())
    {
      $userdata = array(
              'email'     => Input::get('email'),
              'password'  => Input::get('password')
          );
          if (Auth::attempt($userdata)) 
          {
            $user = Auth::user();
            if($user->status == 0)
            {
              Auth::logout();
              return Redirect::back()->with('error', 'You dont have privilage.');
            }
            if($user->status == 1)
            {
              return view('admin.home.index');
              //return redirect()->intended('admin/home/index');
            }else{
              return Redirect::back()->with('error', 'You dont have privilage.');
            }
                    
          }else{
            return Redirect::back()->with('error', 'Incorrect username or passwords');
          }
      }else{
        return Redirect::back()->with('error', 'Incorrect username or password.');
      }
  }

public function createStudent(Request $request) {
    $user = new User;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->save();

    return response()->json([
        "message" => "student record created"
    ], 201);
  }

  #Function to display userindex: 24/01/2021
  public function getindex()
  {
  	$user =  User::select('id','name','image','email','status','password','created_at','updated_at')
                    ->get();
    return response()->json(['success'=>$user],200);
  }





}
