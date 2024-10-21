<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        var_dump($users);exit();
        return view('admin/user/index', ['users' => $users]);
    }

    public function create(){
        return view('admin/user/create');
    }

    public function addNew(Request $request){
        $user = new  User($request->all());
        $password = Hash::make($request->password);
        $user->password = $password;
        $user->save();
        return redirect(route("user.index"));
    }
}
