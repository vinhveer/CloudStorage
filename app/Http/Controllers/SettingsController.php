<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class SettingsController extends Controller
{
public function index()
{
return view('settings.account');
}

public function updateName(Request $request)
{
$request->validate([
'name' => ['required', 'string', 'max:255'],
]);

$user = Auth::user();
$user->name = $request->name;
$user->save();

return back()->with('success', 'Name updated successfully.');
}

public function updateEmail(Request $request)
{
$request->validate([
'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::id()],
'current_password' => ['required', 'current_password'],
]);

$user = Auth::user();
$user->email = $request->email;
$user->email_verified_at = null;
$user->save();

return back()->with('success', 'Email updated successfully. Please verify your new email address.');
}

public function updatePassword(Request $request)
{
$request->validate([
'current_password' => ['required', 'current_password'],
'password' => ['required', 'confirmed', Password::defaults()],
]);

$user = Auth::user();
$user->password = Hash::make($request->password);
$user->save();

return back()->with('success', 'Password updated successfully.');
}
}

