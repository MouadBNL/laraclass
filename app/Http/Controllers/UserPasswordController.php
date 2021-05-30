<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPasswordController extends Controller
{
    
    public function update(User $user)
    {
        $data = request()->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user->update([
            'password' => bcrypt($data['password'])
        ]);

        return redirect()->back()->with('status', 'Mot de pass modifier.');
    }

}
