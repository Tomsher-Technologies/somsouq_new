<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BodyType;
use Illuminate\Http\Request;

class BodyTypeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $query = BodyType::query();

        $searchText = "";
        if ($request->get('search')) {
            $searchText = $request->get('search');
            $query->where('name', 'like', '%' . $searchText . '%');
        }

        $bodyTypes = $query->latest()->paginate(10);
        return view('admin.bodyType.index', compact('bodyTypes', 'searchText'));
    }

    public function create()
    {
        return view('admin.bodyType.create', [
            'languages' => \App\Models\Language::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        try {
            $body = new BodyType();
            $body->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);
            $body->save();

            flash('Body type store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(BodyType $bodyType)
    {
        $languages =  \App\Models\Language::all();
        return view('admin.bodyType.edit', compact('bodyType', 'languages'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        try {
            $body = BodyType::find($request->get('body_id'));
            $body->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);
            $body->save();

            flash('Body type updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(BodyType $bodyType)
    {
        try {
            $bodyType->delete();
            flash('Body type deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $help = BodyType::find($request->get('id'));
            $help->is_active = $request->get('status');
            $help->save();

            return response()->json([
                'success' => true,
                'message' => 'Body type status change successfully.'
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }
}
