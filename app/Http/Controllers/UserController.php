<?php


namespace App\Http\Controllers;


use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users= DB::table('users')->select(['users.*', 'roles.name as roleName'])
            ->join('model_has_roles', 'model_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->orderBy('users.id')->get();
        return view('admin/user/index', ['users' => $users]);
    }

    public function create(){
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

    public function edit($id){
        $user = User::find($id);
        $role= DB::table('model_has_roles')
           ->where(['model_id' => $id])
            ->pluck('role_id');
        $roleName = 0;
        if (!empty($role[0] && $role[0]== 1)) {
            $roleName= 1;
        }

        return view('admin/user/edit', ['user'=>$user, 'roleName' => $roleName ]);
    }

    public function update($id, UserRequest $request) {
        $user =  User::find($id);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $password = Hash::make($request->password);
        $user->password = $password;
        $role_id = 2; // user thuong
        if (isset($request->role_id)) {
            $role_id = 1; //admin
        }
        if(auth()->id() !== $id) {
            $user->syncRoles([$role_id]);
        }
        $user->save();
        return redirect(route("user.index"));
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Delete success');
    }

    public function getRole(){
        return Role::all();
    }
}
