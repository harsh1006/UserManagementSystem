<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserManagementRepository;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    protected $userManagementRepo;

    public function __construct(UserManagementRepository $userManagementRepo)
    {
        $this->userManagementRepo = $userManagementRepo;
    }
    public function list(){
        $users = $this->userManagementRepo->getUsers();
        return view('list',compact('users'));
    }

    public function add(){
        return view('add');
    }

    public function store(Request $request){
            $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/list')->with('success', 'User added successfully');
    }
}
