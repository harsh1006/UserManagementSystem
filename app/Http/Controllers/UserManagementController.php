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

    public function edit($id){
        $info = $this->userManagementRepo->getEditInfo($id);
        return view('edit',compact('info'));
    }

    public function delete($id){

        $delete = $this->userManagementRepo->deleteUser($id);       
        if($delete){
             return redirect('/')->with('success', 'User Deleted successfully');
        }else{
             return redirect('/')->with('Error', 'Not Able to delete user');
        }

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
        if($request->has('user_id')){
            $user = User::find($request->user_id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect('/')->with('success', 'User Updated successfully');
        }else{
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect('/')->with('success', 'User Added successfully');
        }
    }
}
