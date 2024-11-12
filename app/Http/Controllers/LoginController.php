<?php


namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        if(Auth::check()) {
            return redirect()->route('user.index');
        }
        return view('login');
    }

    public function index(LoginRequest $request): RedirectResponse
    {
        $username = $request->name;
        $credentials = $request->except(['_token']);
        if (auth()->attempt($credentials)) {
            return redirect()->route('user.index');
        }
        return back()->with(['msg' => __('user.Message Error'), 'username' => $username]);
    }
}
