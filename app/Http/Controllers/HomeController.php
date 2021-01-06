<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profile = User::find(Auth::user()->id);
        return view('auth.profile',compact('profile'));
    }
    public function update(Request $request)
    {
        $profile = User::find(Auth::user()->id);
        $this->validate($request, [
                'name' => 'required',
                'phone' => 'required|numeric|digits_between:0,13',
                'email' => 'required|email',        
            ],
            [
                'required' => ':attribute không được để trống',
                'numeric' => ':attribute phải là định dạng số',
                'digits_between' => ':attribute nằm trong khoản 0 đến 13',
                'email' => ':attribute phải là định dạng email',
            ],
            [
                'name' => 'Tên',
                'phone' => 'SĐT',
                'email' => 'Email',     
            ]
        );
        $input = $request->all();
        
        if(!empty($request->input('password')))
        { 
            $input['password'] = Hash::make($request->input('password'));
        }
        else
        {
            $profile = array_except($profile,array('password'));    
        }
        $profile->update($input);
        
        return redirect()->back()->with('success','Update successfully');
    }
    

}
