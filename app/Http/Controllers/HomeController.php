<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function home()
    {
        $famousUsers = User::where('is_famous', true)->limit(5)->get();
        $totalMembers = User::count(); // Total family members
        $maleMembers = User::where('gender', 'male')->count(); // Total male members
        $femaleMembers = User::where('gender', 'female')->count(); // Total female members
        return view('home', compact('famousUsers', 'totalMembers', 'maleMembers', 'femaleMembers'));
    }

    public function famousUsers()
    {
        $famousUsers = User::where('is_famous', true)->get();

        return view('famous_users', compact('famousUsers'));
    }

    public function familyHistory()
    {
        return view('family_history');
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function developer_profile()
    {
        return view('developer_profile');
    }

    public function familyTree()
    {
        $users = User::where('is_admin', 0)->where('gender', 'male')->whereNull('parent_id')->with('allChildren')->get();
        return view('tree', compact('users'));
    }

    public function getRegisterForm()
    {
        $parents = User::where('is_admin', 0)->where('gender', 'male')->get();
        return view('register', compact('parents'));
    }


    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'nullable|email|unique:users',
            'password' => 'nullable|min:6|confirmed',
            'phone' => 'nullable|numeric',
            'address' => 'nullable',
            'birthdate' => 'nullable|date',
            'age' => 'nullable|integer',
            'job' => 'nullable|string|max:255',
            'number_of_children' => 'nullable|integer',
            'wife_name' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'gender' => 'nullable|in:male,female',
            'sort' => 'nullable|integer',
            'parent_id' => 'nullable|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $userData = $request->all();
        if ($request->hasFile('image')) {
            $userData['image'] = $request->file('image')->store('user_images', 'public');
        }
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }
        User::create($userData);
        return back()->with('success', 'User created successfully');
    }
}
