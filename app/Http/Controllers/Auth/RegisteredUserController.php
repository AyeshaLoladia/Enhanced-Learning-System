<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // $branches = ['COMP', 'IT', 'EXTC', 'ETRX', 'Mech', 'Chem', 'Bio', 'Civil', 'MCA', 'MBA', 'MMS', 'MSc', 'PhD'];
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            // 'branch' => ['required', 'string', 'max:255'],
            'rollno' => ['required', 'numeric', 'min:0', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => (strpos( $request->email, '@somaiya.edu' ) == true)
                        ? 'Somaiya'
                        : 'Regular',
            // 'branch' => $request->branch,
            'rollno' => $request->rollno,
            'password' => Hash::make($request->password),
        ])->assignRole('student');

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
