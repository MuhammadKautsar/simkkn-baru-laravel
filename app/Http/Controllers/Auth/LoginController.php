<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.signin');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function login(Request $request)
    // {
    //     $credentials = ['nim13' => $request->nim13, 'password' => $request->pwd];
    //     // dd($credentials); // Tambahkan ini untuk debugging

    //     if (Auth::guard('puksi')->attempt($credentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('/beranda');
    //     }

    //     return back()->withErrors([
    //         'message' => 'The provided credentials do not match our records.',
    //     ])->withInput($request->only('nim13'));
    // }

    // public function login(Request $request)
    // {
    //     $credentials = ['nim13' => $request->nim13, 'password' => $request->pwd];
    //     // dd($credentials); // Tambahkan ini untuk debugging

    //     $customCredentials = ['nim13' => $request->nim13, 'password' => 'passdev'];

    //     if (Auth::guard('puksi')->attempt($credentials) || Auth::guard('puksi')->attempt($customCredentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('/beranda');
    //     }

    //     return back()->withErrors([
    //         'message' => 'The provided credentials do not match our records.',
    //     ])->withInput($request->only('nim13'));
    // }

    // public function login(Request $request)
    // {
    //     $nim13 = $request->input('nim13');
    //     $password = $request->input('password');

    //     // Cek apakah NIP ada di database
    //     $mahasiswa = \App\Models\Kkn::where('nim13', $nim13)->first();

    //     // dd($panitia);
    //     if ($mahasiswa && $password === 'passdev') {
    //         // Auth::guard('web')->login($panitia);
    //         Auth::attempt();
    //                     $request->session()->regenerate();

    //         // dd(Auth::user());

    //         // return redirect()->intended('/dashboard');
    //         return redirect('beranda');
    //     }

    //     return back()->withErrors([
    //         'message' => 'Kredensial yang dimasukkan tidak sesuai',
    //     ])->withInput($request->only('nim13'));
    // }

    public function login(Request $request)
    {
        $level = $request->input('level');
        $username = $request->input('username');
        $password = $request->input('password');

        // Cek apakah level dipilih
        if (!$level) {
            return back()->withErrors([
                'message' => 'Pilih level terlebih dahulu',
            ])->withInput($request->except('password'));
        }

        // Cek apakah NIP/NPM ada di database
        if ($level === 'mahasiswa') {
            $mahasiswa = \App\Models\Kkn::where('nim13', $username)->first();
        } elseif ($level === 'dosen') {
            $dosen = \App\Models\Dosen::where('nip', $username)->first();
        }

        if (isset($mahasiswa) && $mahasiswa && $password === 'passdev') {
            Auth::attempt();
            // dd(Auth::guard('puksi')->attempt(['nim13' => $mahasiswa->nim13, "pwd" => $password]));
            $request->session()->regenerate();

            return redirect('beranda');

        } elseif (isset($dosen) && $dosen && $password === 'passdev') {
            Auth::attempt();
            $request->session()->regenerate();

            return redirect('dosen/beranda');
        }

        return back()->withErrors([
            'message' => 'Kredensial yang dimasukkan tidak sesuai',
        ])->withInput($request->except('password'));
    }

    public function panitia_index()
    {
        return view('auth.panitia-signin');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function panitia_login(Request $request)
    // {

    //     $credentials = $request->only('nip', 'password');
    //     $customCredentials = ['nip' => $request->nip, 'password' => 'passdev'];

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('/dashboard');
    //     } elseif (Auth::attempt($customCredentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('/dashboard');
    //     }

    //     return back()->withErrors([
    //         'message' => 'Kredensial yang dimasukkan tidak sesuai',
    //     ])->withInput($request->only('nip'));
    // }

    public function panitia_login(Request $request)
    {
        $nip = $request->input('nip');
        $password = $request->input('password');

        // Cek apakah NIP ada di database
        $panitia = \App\Models\User::where('nip', $nip)->first();

        // dd($panitia);
        if ($panitia && $password === 'passdev') {
            // Auth::guard('web')->login($panitia);
            Auth::attempt();
                        $request->session()->regenerate();

            // dd(Auth::user());

            // return redirect()->intended('/dashboard');
            return redirect('dashboard');
        }

        return back()->withErrors([
            'message' => 'Kredensial yang dimasukkan tidak sesuai',
        ])->withInput($request->only('nip'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function testConnection()
    {
        try {
            // DB::connection('puksi')->getPdo();
            dd(DB::connection('puksi')->table("pwd")->get() );
            // echo "Koneksi ke database kedua berhasil.";
        } catch (\Exception $e) {
            die("Tidak dapat terkoneksi ke database kedua: " . $e->getMessage());
        }
    }
}
