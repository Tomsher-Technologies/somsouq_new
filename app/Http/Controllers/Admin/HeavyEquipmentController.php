<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeavyEquipmentType;
use Illuminate\Http\Request;

class HeavyEquipmentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $query = HeavyEquipmentType::query();
        $searchText = "";
        if ($request->get('search')) {
            $searchText = $request->get('search');
            $query->where('name', 'like', '%' . $searchText . '%');
        }
        $equipments = $query->latest()->paginate(10);
        return view('admin.equipment.index', compact('equipments', 'searchText'));
    }

    public function create()
    {
        return view('admin.equipment.create', [
            'languages' => \App\Models\Language::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        try {
            $equipment = new HeavyEquipmentType();
            $equipment->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);
            $equipment->save();

            flash('Heavy equipment store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(HeavyEquipmentType $heavyEquipmentType)
    {
        $languages =  \App\Models\Language::all();
        return view('admin.equipment.edit', compact('heavyEquipmentType', 'languages'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        try {
            $equipment = HeavyEquipmentType::find($request->get('equipment_id') ?? "");
            $equipment->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);
            $equipment->save();

            flash('Heavy equipment updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(HeavyEquipmentType $heavyEquipmentType)
    {
        try {
            $heavyEquipmentType->delete();
            flash('Heavy equipment deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $help = HeavyEquipmentType::find($request->get('id'));
            $help->is_active = $request->get('status');
            $help->save();

            return response()->json([
                'success' => true,
                'message' => 'Heavy equipment status change successfully.'
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }
}
