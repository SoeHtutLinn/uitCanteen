<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\shop;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:shop');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'img'=> ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function shopValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $file = Input::file('img');
        $filename = $file->getClientOriginalName(); // getting image extension
        $file->move('uploads/profile/', $filename);


        return User::create([
            
            'name' => $data['name'],
            'email' => $data['email'],
            'img' => $filename,
            
            'password' => Hash::make($data['password']),

        ]);
    }
    protected function createShop(Request $request)
    {
        $file = Input::file('img');
        $filename = $file->getClientOriginalName(); // getting image extension
        $file->move('uploads/shop/', $filename);

        $this->shopValidator($request->all())->validate();
        $shop = shop::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'img' => $filename,
            'description' => $request['description'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('/login/shop');
    }
}
