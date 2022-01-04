<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname'=>['required', 'string', 'max:255','min:5'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'confirm' =>['required', 'string', 'min:8','same:password'],
            'image'=>['required','max:2048'],
        ],[
            'firstname.required'=>'firstname is required',
            'lastname.required'=>'lastname is required',
            'firstname.string'=>'reel firstname',
            'email.unique'=>'email already exists',
            'password.min'=>'password must contain at least 8 char',
            'confirm.same'=>'password is not the same',
            'image.required'=>'image is required',
            'image.max'=>'size is not allowed over 2M',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)//C'est cette fonction qui permet d'insérer dans la database
    {
        // dd($data);
        $image=$data['image'];
        $storage=$image->store('avatars');// stocker l'image dans le dossier avatars
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'confirm'=>Hash::make($data['password']),
            'image'=> $storage,
        ]);
    }
}
