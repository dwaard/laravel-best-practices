<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountController extends Controller
{
    /**
     * Display the users account.
     *
     * @return Application|Factory|View
     */
    public function show()
    {
        $user = Auth::user();

        return view('account.show', [
            'user' => $user
        ]);
    }

    /**
     * Create a personal API token for the authenticated user.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function createToken(Request $request)
    {
        $user = Auth::user();

        $token = $user->createToken($request['name']);

        // Show the plainText token to the user so he can use it to pass the
        // token in the Authorization header as a Bearer token like:
        // authorization: Bearer <token>
        return redirect()->route('account.show')
            ->with('token', $token->plainTextToken);
    }

}
