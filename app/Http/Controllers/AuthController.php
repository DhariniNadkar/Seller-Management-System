<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Hash;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        return redirect('/category');
    }

    public function loginView() {
        return view('categories.auth.login');
    }
    public function login(Request $request) {
        $request->validate([
            'email'=> 'required|email|unique:info|max:30',
            'password'=>'required|max:8'
        ]);
        
        $user = User::where('email','=',$request->email)->first();
        // dd($user);
        /*if($user) {
            if(Hash::check($request->password,$user->password)) {
                // dd($user->id);
                session(['loginId' => $user->id]);
                return redirect()->route('category.index');
                return redirect('/category');//->withError('Error');
                
            }
            else {
                return back()->with('fail','password not matched');
            }
            
        }
        else {
            return back()->with('fail','Something wrong');
        }*/
        if(\Auth::attempt($request->only('email', 'password'))){
            return redirect('/category')->withError('Error');
        }
        
         return redirect('login')->withError('Login details are not valid');
    }

    public function registerView() {
            return view('categories.auth.register');
    }
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|alpha|max:10',
            'email'=> 'required|email|unique:info|max:30',
            'password'=>'required|confirmed|max:8'
        ]);
        //To save the user into DB table
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>\Hash::make($request->password),
        ]);
       //checking for user authentication
        if(\Auth::attempt($request->only('email', 'password'))){
            return redirect('login');
        }
        return redirect('register')->withError('Error');
    }

    public function logout(Request $request) {

        // dd($request->session()->get('loginId'));
        \Session::flush();
        \Auth::logout();
         return redirect()->route('login.user');
        
        // if(Session::has('loginId')){
        //     Session::pull('loginId');
        //     return redirect('login');
        // }
        // 
    }
    // public function home(){
    //     $data = array();
    //     if(Session::has('loginId')){
    //         $data = User::where('id','=' ,Session::get('loginId'))->first(); 
    //     }
    //     return view('/category',compact('data'));
    // }
}
