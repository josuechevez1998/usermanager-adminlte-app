<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserSessionProfileController extends Controller
{
    public function index()
    {
        $userSession = auth()->user();

        return view('user-session.profile.index', [
            'user' => $userSession
        ]);
    }

    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
            ]);

            $user->update($request->all());

            return Redirect::route('users.profile')
                ->with('success', __('User updated successfully'));
        } catch (\Exception $e) {

            return Redirect::route('users.profile')
                ->with('success', __('Error 503: Server Error'));
        }
    }

    public function deactivate(): void {}

    public function changePassword()
    {
        return view('user-session.change-password.index', [
            'user' => auth()->user()
        ]);
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'required|string|min:8|max:16',
            'reset_password'   => 'required|string|same:password|min:8|max:16',
        ]);

        // Verifica si la contraseña es correcta
        if (!Hash::check($request->password, Auth::user()->password)) {
            return back()
                ->withErrors([
                    'password' => __('The password provided is incorrect.')
                ]);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Cerrar todas las sesiones activas
        Auth::logoutCurrentDevice($request->password);

        return Redirect::route('users.profile')
            ->with('success', __('Password Updated'));
    }

    /**
     * Subir foto de usuario
     *
     * @param Request $request
     * @param User $user
     * @return void
     */
    public function uploadPhoto(Request $request, User $user)
    {

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->file('avatar')) {

            // Verifica si el archivo existe antes de intentar eliminarlo
            if (Storage::disk('public')->exists($user->userPhoto->path . "/" . $user->userPhoto->name)) {
                Storage::disk('public')->delete($user->userPhoto->path . "/" . $user->userPhoto->name);
            }

            $request->avatar
                ->store('public/avatars');

            // eliminar foto actual de la db
            $user->userPhoto->delete();

            $newPhoto = new UserPhoto();
            $newPhoto->name = $request->avatar->hashName();
            $newPhoto->path = 'avatars';
            $newPhoto->user_id = $user->id;
            $newPhoto->save();

            return Redirect::route('users.profile')
                ->with('success', __('Photo Updated'));
        }
    }
}
