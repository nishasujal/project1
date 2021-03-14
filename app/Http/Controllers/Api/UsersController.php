<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Input;
use Validator;
use Redirect;
Use Auth;
Use DB;
use View;
use Hash;

class UsersController extends Controller
{
	
  #Function to display userindex: 13/03/2021
  public function getindex()
  {
  	$user =  User::select('id','name','email','status','password','created_at','updated_at')
                    ->get();
    return response()->json(['success'=>$user],200);
  }

  #Function to load login page for admin- 13/03/2021
  public function adminlogin()
 {
    return view('admin.auth.login');
 }
 #Function to Dashboard: 13/03/2021
  public function getdashboard()
  {
      return view('admin/home/index');
  }

 #Function for adminLogin: 13/03/2021
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
             
              return response(['error' => 'You dont have privilage']);
            }
            if($user->status == 1)
            {
              return view('admin.home.index');
              
            }else{
              
            	return response(['error' => 'You dont have privilage']);
            }
                    
          }else{
                  return response(['error' => 'Incorrect username or passwords']);
          }
      }else{
             return response(['error' => $validate->errors(), 'Validation Error']);
       } 
  }

  #Function to display userindex: 13/03/2021
  public function getuserindex()
  {
  	$user1 =  User::select('id','name','email','status','password','created_at','updated_at')
                    ->get();
    
          $user = json_decode($user1, true);
	return view('admin/user/index', ["user"=>$user]);

  }

  #Function to add users to user database- 13/03/2021
  public function addUser()
  {
    return view('admin.user.add');
  }

  #Function to store usres to userdatabase- 13/03/2021
  public function getStore()
  {
    $input=Input::all();
    $id=Input::get('id');
    if(!empty($input))
    {
      $validate = Validator::make(Input::all(), ['name'  => 'required',
        'password' =>'required|min:4|same:confirm_password',
        'status'=>'required|numeric|between:0,1',
        'email' => 'required|email',  
            ]);
      if(!$validate->fails())
      {
                
        $user             =  new User;
        $user1=Input::get('name');
        $name=User::select('name')
                ->where('name','=',$user1)
                ->first();
                if(!empty($name))
                {
                	return response(['error' => 'username already exist']);
                  
                }
                
        $password   = Input::get('password');
        $c_password     = Input::get('confirm_password');
       }else{
              return response(['error' => $validate->errors(), 'Validation Error']);
      }
            $user->name=Input::get('name');
            $user->email   =Input::get('email');
            
            $password=Hash::make($password);
            $user->password   =$password;
            
            $user->status   =Input::get('status');
            $user->save();

          return Redirect::to('api/user/index')->with('success', 'user added successfully!');
            
    }
    
  }
  #Function to edit user from Userdatabase- 13/03/2021
  public function getEdit($id)
  {
    
    $user=User::find($id);
	return view('admin/user/edit', compact('user'));

    //return view('api.user.edit',['user'=>$user]);
    // }
  }
  #Function to update user from Userdatabase- 13/03/2021
  public function getUpdate()
  {
    $input = Input::all();
    if(!empty($input))
    {
      $id=Input::get('id');
       
      $validate = Validator::make(Input::all(), [
          'name'  => 'required',
        'password' =>'required|min:4|same:confirm_password',
        'status'=>'required|numeric|between:0,1',
        'email' => 'required|email',  
        ]);
       
        if (!$validate->fails())
        {

          $user = Auth::user();
          $user1=Input::get('name');
          $name=User::select('name','id')
                    ->where('name','=',$user1)
                    ->where('id','!=',$id)
                    ->first();
                      if(!empty($name))
                      {
                        return redirect::back()->with('error',' username already exist');
                      }
         
          $user          =   User::find($id);
          $user->name    = Input::get('name');
          $user->status =Input::get('status');
          
          $user->email = Input::get('email');
         
          $user->save();
		  $user1 =  User::select('id','name','email','status','password','created_at','updated_at')
                    ->get();
    
          $user = json_decode($user1, true);
			return view('admin/user/index', ["user"=>$user]);
        }else{
          return Redirect::back()->withErrors($validate,'register')->withInput();
        }
      }
  }
  #Function to delete user data- 13/03/2021     
  public function userdelete(Request $request, $id)
  {  

        $user = User::find($id);
        $user->delete();
 
		$user1 =  User::select('id','name','email','status','password','created_at','updated_at')
                    ->get();
		$user = json_decode($user1, true);
	return view('admin/user/index', ["user"=>$user]);
  }
  #Function to adminLogout: 13/03/2021
  public function getLogout()
  {
      Auth::logout();
      return Redirect::intended('api/admin/login');
  }



}