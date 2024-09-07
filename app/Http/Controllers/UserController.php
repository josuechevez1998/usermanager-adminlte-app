<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $user = new User();

        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        // Generar una contraseña aleatoria
        $password = $this->generatePassword();

        // Crear el usuario con la contraseña hashada
        $newUser = User::create(array_merge(
            $request->validated(),
            ['password' => Hash::make($password)]
        ));

        // Generar un token de restablecimiento de contraseña
        $token = Password::broker()->createToken($newUser);

        // Enviar notificación de restablecimiento de contraseña
        $newUser->sendPasswordResetNotification($token);

        return Redirect::route('users.index')
            ->with('success', 'User created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return Redirect::route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();

        return Redirect::route('users.index')
            ->with('success', 'User deleted successfully');
    }

    /**
     * Enviar correo nativo de larave 
     * para resturar contraseña
     */
    public function resetPassword(User $user)
    {

        // Generar un token de restablecimiento de contraseña
        $token = Password::broker()
            ->createToken($user);

        // Enviar notificación de restablecimiento de contraseña
        $user->sendPasswordResetNotification($token);

        session()->flash('success', __('The password is reset'));

        return redirect()->route('users.index')
            ->with('success', __('Password reset email sents'));
    }


    /**
     * Generar contraseña para nuevos usuario
     * 
     * @return string nueva contraseña
     */
    public function generatePassword()
    {
        return Str::password(8, true, true, false, false);
    }
}
