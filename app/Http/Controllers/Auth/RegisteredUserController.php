<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {



        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/images/', $filename);
            $request->merge(['image' => $filename]);
        } else {
            dd("NOP");
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            "bol" => ["required"],
            "dob" => ["required"],
            "address" => ["required", "min:10"],
            "phone" => ["required"],
            "fee_amount" => ["required"],
            "nationality" => ["required"],
            "image" => ["required"]
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        UserInfo::create([
            "user_id" => $user->id,
            "bol" => $request->bol,
            "dob" => $request->dob,
            "address" => $request->address,
            "phone" => $request->phone,
            "fee_amount" => $request->fee_amount,
            "nationality" => $request->nationality,
            "job" => $request->job,
            "mother_and_father_name" => $request->mother_and_father_name,
            "signature" => $request->signature
        ]);




        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
