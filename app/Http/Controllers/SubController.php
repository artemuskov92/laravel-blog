<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubController extends Controller
{
    public function subscribe(Request $request)
    {   
        $this->validate($request, [
            'email'=>'required|unique:subscriptions'
        ]);

        Subscription::add($request->get('email'));

        return redirect()->back()->with('status','Check you email');
    }
}
