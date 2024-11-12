<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\agents;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class frontendcontroller extends Controller
{
    //
    public function __construct()
    {

    }
    public function home()
    {
         return view('home');
    }
    public function login(Request $request)
    {
        if (Auth::check())
        {
            $user = Auth::guard()->user();
            if ($user)
            {
                      return view('dashboard',compact('user'));
            }
        }
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function forget()
    {
        return view('forgetpass');
    }
    public function addNewUser(Request $request)
    {
         $validated=$request->validate([
           'firstName' =>'required | string',
           'lastName' =>'required | string',
           'email' =>'required |email',
           'password' =>'required |string | min:6',
           'role' =>'required |string | in:customer,deliveryAgent',
           'file' =>'required |file|mimes:jpg,png,gif,jpeg ',
         ]);
         if(!$validated)
         {
            return back()->withErrors(['error'=>'Something Went Wrong']);
         }

               if($request->hasfile('file'))
               {
                  $file=$request->file('file');
                  $name=$file->getClientOriginalName();
                  $ext=$file->getClientOriginalExtension();
                  $extensions=['jpg','jpeg','png','gif'];
                  if(in_array($ext,$extensions))
                  {
                     //dd('Valid Image');
                     $destinationPath=public_path('uploads');
                     $fileName = time() . '_' . $name;
                     $upload=$file->move($destinationPath, $fileName);
                     if($upload)
                     {
                        $url = asset('uploads/' . $fileName);
                        //dd($url);
                         User::create([
                            'name' => ucfirst($validated['firstName']).' '.ucfirst($validated['lastName']),
                            'email' =>$validated['email'],
                            'password' =>Hash::make($validated['password']),
                            'role'=>$validated['role'],
                            'profile_pic'=>$url,
                            'is_active'=>'0',
                            'created_at'=>Carbon::now(),
                            'updated_at'=>Carbon::now(),
                         ]);
                         return redirect()->route('register')->with('success','User Registered Success');
                     }

                  }
                  else
                  {
                      return back()->withErrors(['error'=>'Invalid Upload']);
                  }
               }
              // exit;




    }
}
