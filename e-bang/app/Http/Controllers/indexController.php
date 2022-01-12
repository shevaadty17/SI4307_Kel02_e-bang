<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class indexController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function doLogin(Request $request){
        $hash = md5($request->password);
        $findUser = Auth::where('username', $request->username)->where('password', $hash)->first();
        if($findUser){
            $attributes = [
                'id' => $findUser->id_user,
                'username' => $findUser->username,
                'name' => $findUser->nm_user,
                'jk' => $findUser->jk_user,
                'role' => $findUser->role_user
            ];

            session(['auth' => $attributes]);
            if($findUser->role_user == '1'){ //Admin
                return redirect('/dashboard-admin');
            }else{
                return redirect('/dashboard-customer');
            }
        }else{
            $request->session()->flash('err-pw', 'Username atau Password yang anda masukan salah');
            return redirect('/');
        }
    }

    public function doLogout(Request $request){
        session()->forget('auth');
        return redirect('/');
    }

    public function register(Request $request){
        return view('register');
    }

    public function registerCust(Request $request){
        $data = $request;
        if($data->pw1 != $data->pw2){
            $request->session()->flash('err-pw', 'Password tidak sesuai');
            return redirect('register');
        }elseif(!isset($data->jk)){
            $request->session()->flash('err-pw', 'Pilih jenis kelamin');
            return redirect('register');
        }

        $saveCust = new Auth();
        $saveCust->nm_user = $request->nm;
        $saveCust->username = $request->username;
        $saveCust->password = md5($request->pw1);
        $saveCust->jk_user = $request->jk;
        $saveCust->role_user = '2';
        $saveCust->save();

        $request->session()->flash('success-reg', 'Berhasil Daftar');
        return redirect('/');
    }

    public function editProfile(Request $request){
        $auth = Auth::where('id_user', $request->id_user)->first();
        $auth->nm_user = $request->nm;
        $auth->jk_user = $request->jk;
        $auth->username = $request->username;
        $auth->save();

        if(isset($request->pw1) && $request->pw_old != md5($request->pw1)){
            $auth->password = md5($request->pw1);
            $auth->save();
        }
        return Redirect::back();
    }
}
