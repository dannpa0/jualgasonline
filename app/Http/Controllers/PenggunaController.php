<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PenggunaController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all()->sortBy('createdDate');
        return view('pengguna', [
            'users' => $users
        ]);
    }


    public function show($id)
    {
        // die($id);
        $user = User::findOrFail($id)->first();
        // dd($user);
        return view('detail-pengguna', [
            'pengguna' => $user
        ]);
    }

    public function saveById($id, Request $request)
    {
        // dd($id);

        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string']
        ]);

        $user = User::find($id);
        $message = NULL;
        if($user === NULL)
        {
            // dd($user);    
            User::create([
                'name' => $request->username,
                'email' => $request->email,
                'role' => $request->role,
                // 'password' => Hash::make($request->password),
            ]);
            $message = 'Pengguna berhasil dibuat';
        }
        else
        {
            $user->name = $request->username;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->save();
            $message = 'Pembaruan pengguna berhasil';
            // dd($user);
        }

        return view('detail-pengguna', [
            'pengguna' => $user
        ])->with('toastmsg', $message);
    }
}
