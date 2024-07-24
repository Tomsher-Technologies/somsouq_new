<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index']]);
    }

    public function index(Request $request)
    {
        $query = Report::join('posts', 'posts.id', '=', 'reports.post_id')
            ->join('users', 'users.id', '=', 'reports.user_id');

        $search = "";
        if ($request->get('search')) {
            $search = $request->get('search');
            $query->where('posts.tracking_number', 'like', '%' . $search . '%');
        }

        $reports = $query->select('reports.*', 'posts.tracking_number', 'users.name')->latest()->paginate(10);

        return view('admin.report.index', compact('reports', 'search'));
    }

}
