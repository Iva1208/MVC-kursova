<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Къде да пренасочим след регистрация.
     *
     * @var string
     */
    protected $redirectTo = '/home'; // може да го смениш например на '/dashboard'

    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Показва формата за регистрация.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Обработва регистрацията.
     */
    public function register(Request $request)
    {
        // Валидация
        $this->validator($request->all())->validate();

        // Проверка дали потребител с този email вече съществува
        $existing = User::where('email', $request->email)->first();
        if ($existing) {
            return redirect()->back()->with('error', 'Потребител с този имейл вече съществува.')->withInput();
        }

        // Създаване на потребителя
        $user = $this->create($request->all());

        // Event (ако искаш да пращаш потвърждение и др.)
        event(new Registered($user));

        // Влизане в системата автоматично (по желание)
        // auth()->login($user);

        // Пренасочване с успех
        return redirect()->route('login')->with('success', 'Регистрацията беше успешна! Влезте в системата.');
    }

    /**
     * Правила за валидация.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Създаване на нов потребител.
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
