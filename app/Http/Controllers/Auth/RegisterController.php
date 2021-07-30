<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Image;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'min:11'],
            'nid_number' => ['required','min:8'],
            'city' => ['string'],
            'position' => ['string'],
            'address' => ['string'],
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
        // return User::create([
        $user=  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 2,
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'photo' => $data['photo'],
            'nid_number' => $data['nid_number'],
            'city' => $data['city'],
            'position' => $data['position'],
            'address' => $data['address'],
        ]);
        // if(request()->hasFile('photo')){
        //     $photo=request()->file('photo')->getClientOriginalName();
        //     request()->file('photo')->storeAs('images',$user->id . '/' .$photo,);
        //     $user->update(['photo'=>$photo]);
        // }

        if(request()->hasFile('photo')){
            $photo=request()->file('photo');
            $file_name=time().'.'.$photo->getClientOriginalExtension();
            $photo_resize=Image::make($photo->getRealPath());
            $photo_resize->resize(150,150);
            $photo_resize->save('images/users/'.$file_name);
            $user->update(['photo'=>$file_name]);

        }
        return $user;
    }
}
