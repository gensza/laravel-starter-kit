<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = User::select('*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('role', function ($row) {
                    if ($row->role_id == 1) {
                        return 'Admin';
                    } else {
                        return 'User';
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('users.index');
    }
}
