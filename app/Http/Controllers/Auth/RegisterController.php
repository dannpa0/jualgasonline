<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Alamat;
use App\Models\Pelanggan;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // die(var_dump($data));
        // dd($data);
        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'regex:/^[08][0-9]+/', 'min:8'],
            'full_address' => ['required', 'string'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = null;
        
        $user = User::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'role' => 'PELANGGAN',
            'password' => Hash::make($data['password']),
        ]);

        $alamat = Alamat::create([
            'kecamatan' => $data['kecamatan'],
            'kelurahan' => $data['kelurahan'],
            'rt' => $data['rt'],
            'rw' => $data['rw'],
            'kota' => 'Bogor',
            'alamat_lengkap' => $data['full_address']
        ]);

        Pelanggan::create([
            'nama' => $data['full_name'],
            'no_hp' => $data['phone_number'],
            'user_id' => $user->id,
            'id_alamat' => $alamat->id
            
        ]);
        return $user;

        
    }
}
