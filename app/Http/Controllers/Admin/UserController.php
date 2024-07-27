<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:roles', ['only' => ['index','store','create','show','edit','update','destroy']]);
    }

    public function index(Request $request)
    {
        $query = User::query()->select(
                'users.id',
                'users.name',
                'users.email',
                'users.username',
                'users.phone_number',
                'users.sign_up_for',
            );

        if ($request->get('phone_number')) {
            $query->where('users.phone_number', 'like', '%' . $request->get('phone_number') . '%');
            $data['phone_number'] = $request->get('phone_number');
        }

        if ($request->get('email')) {
            $query->where('users.email', 'like', '%' . $request->get('email') . '%');
            $data['email'] = $request->get('email');
        }

        if ($request->get('username')) {
            $query->where('users.username', 'like', '%' . $request->get('username') . '%');
            $data['username'] = $request->get('username');
        }

        $data['account_type'] = "";
        if ($request->get('account_type')) {
            $data['account_type'] = $request->get('account_type');
            $query->where('users.sign_up_for', $data['account_type']);
        }

        $data['users'] = $query->orderBy('id', 'DESC')->paginate(10);

       return view('admin.user.index', $data);
    }
}

