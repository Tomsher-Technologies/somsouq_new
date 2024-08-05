<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fashion\Gemstone;
use App\Models\Fashion\Material;
use App\Services\Front\CategoryNameService;
use Illuminate\Http\Request;

class GemstoneController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $query = Gemstone::query();

            $searchText = "";
            if ($request->get('search')) {
                $searchText = $request->get('search');
                $query->where('materials.name', 'like', '%' . $searchText . '%');
            }

            $subCategory = "";
            if ($request->get('category')) {
                $subCategory = $request->get('category');
                $query->where('materials.sub_category_id', '=', $subCategory);
            }

            $gemstones = $query->latest()->paginate(10);

            return view('admin.fashion.gemstone.index', compact('gemstones', 'searchText', 'subCategory'));
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('admin.fashion.gemstone.create', [
            'languages' => \App\Models\Language::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        try {
            $material = new Gemstone();
            $material->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);

            $material->save();

            flash('Gemstone store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(Gemstone $gemstone)
    {
        return view('admin.fashion.gemstone.edit',[
            'languages' => \App\Models\Language::all(),
            'gemstone' => $gemstone
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        try {
            $gemstone = Gemstone::find($request->get('stone_id') ?? "");
            $gemstone->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);

            $gemstone->save();

            flash('Gemstone updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(Gemstone $gemstone)
    {
        try {
            $gemstone->delete();
            flash('Gemstone deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $gemstone = Gemstone::find($request->get('id'));
            $gemstone->is_active = $request->get('status');
            $gemstone->save();

            return response()->json([
                'success' => true,
                'message' => 'Gemstone status change successfully.'
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }
}
