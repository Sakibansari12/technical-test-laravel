<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLogin;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        return view('index');
    }

    public function getuser(){
        $userdata = UserLogin::get();
        return view('list', compact('userdata'));
    }

    public function destroy($userId, Request $request){
        $userdata = UserLogin::find($userId);
        $userdata->delete();
        return response()->json([
            'status' => true,
            'message' => "User delete succssfully",
        ]);
        //return view('user');

    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:user_logins',
            'phone' => 'required',
            'password' => 'required|string',
         ]);
         if($validator->passes()){
           $userCreate = new UserLogin();
           $userCreate->name = $request->name;
           $userCreate->email = $request->email;
           $userCreate->phone = $request->phone;
           $userCreate->password = bcrypt($request->password);
           
           $userCreate->save();

           return response()->json([
            'status' => true,
            'message' => "User Create succssfully",
        ]);

    }else{
       return response()->json([
           'status' => false,
           'errors' => $validator->errors(),
        ]);
    
      }
    
    }

  
   /*  $userdata = UserLogin::get();
         return view('list', compact('userdata')); */
}
