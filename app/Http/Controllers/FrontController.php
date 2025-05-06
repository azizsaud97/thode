<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        return view('website.home');
    }

    public function about()
    {
        return view('website.about');
    }

    public function joining()
    {
        return view('website.joining');
    }

    public function contact()
    {
        return view('website.contact');
    }
    public function howItWorks()
    {
        return view('website.how_it_works');
    }

    public function registerOwner() {
        return view('website.register_owner');
    }

    public function registerOwnerProcess(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:15',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'Owner'
        ]);

        return redirect('login')->with('success', 'تم التسجيل بنجاح! يمكنك الآن تسجيل الدخول.');
    }

}
