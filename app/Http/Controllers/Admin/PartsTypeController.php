<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle\AutoPartType;
use Illuminate\Http\Request;

class PartsTypeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $query = AutoPartType::query();

        $searchText = "";
        if ($request->get('search')) {
            $searchText = $request->get('search');
            $query->where('name', 'like', '%' . $searchText . '%');
        }

        $parts = $query->latest()->paginate(10);
        return view('admin.vehicle.partsType.index', compact('parts', 'searchText'));
    }

    public function create()
    {
        return view('admin.vehicle.partsType.create', [
            'languages' => \App\Models\Language::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        try {
            $parts = new AutoPartType();
            $parts->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);
            $parts->save();

            flash('Parts type store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(AutoPartType $autoPartType)
    {
        $languages =  \App\Models\Language::all();
        return view('admin.vehicle.partsType.edit', compact('autoPartType', 'languages'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        try {
            $parts = AutoPartType::find($request->get('part_id') ?? "");
            $parts->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);
            $parts->save();

            flash('Parts type updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(AutoPartType $autoPartType)
    {
        try {
            $autoPartType->delete();
            flash('Parts type deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $help = AutoPartType::find($request->get('id'));
            $help->is_active = $request->get('status');
            $help->save();

            return response()->json([
                'success' => true,
                'message' => 'Parts type status change successfully.'
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }
}
