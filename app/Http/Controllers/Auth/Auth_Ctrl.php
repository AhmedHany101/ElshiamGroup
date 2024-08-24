<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Auth_Ctrl extends Controller
{
    //register
    public function register_fun(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'Registration successful'], 200);
    }
    //login
    public function signin_fun(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
          ]);
          if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            if (Auth::user()->role_as == '1!_1$') {
              return redirect('admin/index');
            } else {
              return redirect('/');
            }
          }
          return redirect()->back()->with('message2', __('public.key_04'));
        }
    //logout
    public function logout_fun(Request $request)
    {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/');
    }
}
