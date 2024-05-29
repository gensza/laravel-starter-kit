<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            return datatables()->of(User::all())->toJson();
        }
        return view('users.index');
    }
}
