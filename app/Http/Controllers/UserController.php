<?php


namespace App\Http\Controllers;


use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin/user/index', ['users' => $users]);
    }

    public function create(){
//        $roles =
        return view('admin/user/create');
    }

    public function addNew(UserRequest $request){
        $user = new  User($request->all());
        $password = Hash::make($request->password);
        $user->password = $password;
        $role_id = 2; // user thuong
        if (isset($request->role_id)) {
            $role_id = 1; //admin
        }
        $user->assignRole([$role_id]);
        $user->save();
        return redirect(route("user.index"));
    }

    public function getRole(){
        return Role::all();
    }
}
