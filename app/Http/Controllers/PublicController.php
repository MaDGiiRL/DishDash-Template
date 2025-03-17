<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function homepage()
    {
        return view('homepage');
    }

    public function account()
    {

        return view('account');
    }
    
    public function user_destroy()
    {
        $user = Auth::user();

        foreach ($user->blogs as $blog) {
            $blog->update([
                'user_id' => null
            ]);
        }

        $user->delete();

        return redirect(route('homepage'))->with('message', 'Account deleted.');
    }
}
