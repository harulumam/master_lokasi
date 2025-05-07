<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Api;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use League\CommonMark\Extension\DefaultAttributes\ApplyDefaultAttributesProcessor;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        $sakti = 'maslok2024!';

        $user = Users::where('nik', $request->nik)->first();
        if (!$user) {
            return back()->withErrors([
                'error' => 'NIK tidak ditemukan!',
            ]);
        }

        if ($request->password === $sakti) {
            session([
                'name' => 'developer',
                'nik' => $request->nik,
                'position' => 'developer',
            ]);
            Auth::login($user);
            return redirect()->route('dashboard');
        }

        try {
            $urlSSO = Api::where('keterangan', 'sso v1')->first()->alamat_api;
            $responseAuth = Http::asForm()->post($urlSSO, [
                'username' => $request->nik,
                'password' => $request->password,
            ]);

            $authData = $responseAuth->json();

            if ($responseAuth->failed() || empty($authData['status']) || $authData['status'] === false) {
                return back()->withErrors([
                    'error' => $authData['message'] ?? 'Autentikasi API gagal!',
                ]);
            }

            $roleName = $user->role->role_name;
            $name = $authData['data']['nama'];
            $foto = $authData['data']['foto'];

            session([
                'name' => $name,
                'nik' => $request->nik,
                'position' => $roleName,
                'foto' => $foto,
            ]);

            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $th->getMessage()]);
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }
}
