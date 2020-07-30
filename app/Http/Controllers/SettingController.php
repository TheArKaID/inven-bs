<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SettingController extends Controller
{
    public function index()
    {
        return view('settings');
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::find($request->id);

        $pass = $request->password;
        if(!password_verify($pass, $user->password)){
            return redirect()->back()->with('error', 'Password Salah');
        }

        if(!empty($request->newpassword) || !empty($request->repassword)){
            if(empty($request->newpassword) || empty($request->repassword)){
                return redirect()->back()->with('error', 'New Password dan Re Password harus diisi.');
            }
            if($request->newpassword!=$request->repassword){
                return redirect()->back()->with('error', 'New Password dan Re Password Tidak Sama');
            }
            $user->password = password_hash($request->newpassword, PASSWORD_DEFAULT);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('sukses', 'Profil berhasil diubah');
    }
}
