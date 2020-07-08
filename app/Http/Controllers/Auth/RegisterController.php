<?php

namespace App\Http\Controllers\Auth;

use App\Avatars;
use App\Http\Controllers\Controller;
use App\Persons;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'surname' => ['required', 'string', 'min:2', 'max:50', 'alpha_dash'],
            'first_name' => ['required', 'string', 'min:2', 'max:50', 'alpha'],
            'patronymic' => ['nullable', 'min:2', 'max:50', 'alpha'],
            'avatar' => ['file', 'mimetypes:image/jpeg,image/png', "max:11000"],
            'phone' => ['max:17'],
            'degree' => ['max:100'],
            'position' => ['required', 'max:100'],
            'link' => ['max:250'],
            'email' => ['required', 'string', 'regex:/(?:[a-z0-9!#$%&\'*+\=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\=?^_`{|}~-]+)*
            |"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")
            @(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])
            |1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:
            (?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/', 'max:255', 'unique:users'],
            'password' => ['required', 'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/m', 'min:8', 'confirmed'],
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (isset($data['isadmin'])) {
            if ($data['isadmin'] == "on") {
                $isadmin = 1;
            } else {
                $isadmin = 0;
            }
        } else {
            $isadmin = 0;
        }

        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => $isadmin,
        ]);

        $person = Persons::create([
            'user_id' => $user->id,
            'surname' => $data['surname'],
            'name' => $data['first_name'],
            'patronymic' => $data['patronymic'],
            'phone' => $data['phone'],
            'degree' => $data['degree'],
            'position' => $data['position'],
            'link' => $data['link'],

        ]);


        if (!empty($data['avatar'])) {
            $path = '/storage/' . $data['avatar']->store('/avatars', ['disk' => 'public']);
            Avatars::create([
                'persons_id' => $person->id,
                'path' => $path
            ]);
        }
    }

    protected function registered(Request $request)
    {
        return redirect('/register/success')->with(['success' => 1]);
    }

    protected function success(Request $request)
    {
        if (Session::get('success')) {
            return view('auth.regsuccess');
        }

        return redirect('/');
    }
}
