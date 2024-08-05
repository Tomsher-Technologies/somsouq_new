<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoatType;
use App\Models\Color;
use Illuminate\Http\Request;

class BoatTypeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $query = BoatType::query();
        $searchText = "";
        if ($request->get('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', '%' . $search . '%');
        }
        $boatTypes = $query->latest()->paginate(10);
        return view('admin.vehicle.boat.index', compact('boatTypes', 'searchText'));
    }

    public function create()
    {
        return view('admin.vehicle.boat.create', [
            'languages' => \App\Models\Language::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        try {
            $color = new BoatType();
            $color->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);
            $color->save();

            flash('Boat type store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(BoatType $boatType)
    {
        $languages =  \App\Models\Language::all();
        return view('admin.vehicle.boat.edit', compact('boatType', 'languages'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        try {
            $color = BoatType::find($request->get('boat_id') ?? "");
            $color->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);
            $color->save();

            flash('Boat type updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(BoatType $boatType)
    {
        try {
            $boatType->delete();
            flash('Boat type deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $help = BoatType::find($request->get('id'));
            $help->is_active = $request->get('status');
            $help->save();

            return response()->json([
                'success' => true,
                'message' => 'Color status change successfully.'
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }
}
