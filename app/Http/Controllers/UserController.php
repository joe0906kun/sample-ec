<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\LineItem;

class UserController extends Controller
{
    public function postLogin(Request $request)
    {
        // validation and authentication logic here...

        // If the user is authenticated
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            // update line_items records for this user
            $this->updateLineItems($user);
            return redirect()->intended('cart');
        }

        // If the user is not authenticated
        // ...
    }

    private function updateLineItems(User $user)
    {
        // Here we are updating line_items records for the authenticated user
        // You can customize this logic based on your requirements
        LineItem::where('user_id', $user->id)->update([
            // the fields you want to update
        ]);
    }
}
