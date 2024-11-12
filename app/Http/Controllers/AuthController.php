<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function dologin(Request $request)
    {
          //dd($request->all());
          $validated=$request->validate([
              'email' =>'required | string | email',
              'password' =>'required | string |min:6',
          ]);
          if($validated)
          {
               $email=$validated['email'];
               $passw=$validated['password'];
               $credentials=[
                'email'=>$email,
                'password'=>$passw,
               ];
               $remember = $request->has('remember_me'); // Check if remember me is selected

               if (Auth::guard()->attempt($credentials,$remember))
               {
                  // Get the authenticated user
                  $user = Auth::guard()->user();
                  //dd($user);
                  // Check if the user is authenticated
                  if ($user)
                  {
                    //dd($user);
                    return view('dashboard',compact('user'));
                  }

               }
               // Authentication failed, redirect back with an error
               return back()->withErrors([
                           'email' => 'The provided credentials do not match our records.',
               ]);

               //dd([$email,$passw]);
          }
          else
          {
            redirect()->route('login')->with(['error'=>'Something Went Wrong'],500);
          }
    }
    public function logout(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
