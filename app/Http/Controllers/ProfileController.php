<?php

namespace App\Http\Controllers;
use App\Models\album;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{


    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user(); // Huidige ingelogde gebruiker
        $albums = Album::where('users_id', $user->id)->get(); // Albums van de ingelogde gebruiker

        return view('profile.edit', [
            'user' => $user,
            'albums' => $albums, // Geef de albums door aan de view
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile image.
     */
    /**
     * Update the user's profile image.
     */
    public function updateProfileImage(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_image' => 'required|image|mimetypes:image/jpeg,image/png,image/gif,image/webp|max:2048',
        ], [
        'profile_image' => 'De afbeelding moet een geldig afbeeldingsformaat zijn.',

    ]);



        $user = $request->user();
        $imageName = time() . '.' . $request->profile_image->extension();

        // Sla de afbeelding op in de 'public/storage/profile_images' map
        $path = $request->file('profile_image')->storeAs('profile_images', $imageName, 'public');

        // Update de gebruiker met de nieuwe afbeeldingsnaam
        $user->profile_image = $imageName; // Alleen de profielfoto bijwerken
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Profielafbeelding succesvol geüpload.');
    }




    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function toggleStatus( $user)
    {
        // Toggle de status
        $user->status = !$user->status; // of gebruik een specifieke logica voor de status
        $user->save();

        return redirect()->back()->with('status', 'Gebruikersstatus succesvol gewijzigd.');
    }


}
