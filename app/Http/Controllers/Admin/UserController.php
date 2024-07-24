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
        $query = User::query()
            ->leftJoin('states', 'states.id', '=', 'users.state_id')
            ->leftJoin('cities', 'cities.id', '=', 'users.city_id')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.username',
                'users.phone_number',
                'states.name as state',
                'cities.name as city',
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

        $data['state_id'] = "";
        if ($request->get('state_id')) {
            $query->where('users.state_id', $request->get('state_id'));
            $data['state_id'] = $request->get('state_id');
        }

        $data['users'] = $query->orderBy('id', 'DESC')->paginate(10);

       return view('admin.user.index', $data);
    }
}

