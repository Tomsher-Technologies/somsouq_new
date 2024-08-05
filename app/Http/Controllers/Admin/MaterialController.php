<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fashion\Material;
use App\Services\Front\CategoryNameService;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $subCategories = $this->getSubCategory();

            $query = Material::query()
                ->leftJoin('categories', 'categories.id', '=', 'materials.sub_category_id');

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

            $materials = $query->select('materials.*', 'categories.en_name')
                ->orderBy('materials.created_at', 'DESC')
                ->paginate(10);

            return view('admin.fashion.material.index', compact('materials', 'searchText', 'subCategory', 'subCategories'));
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('admin.fashion.material.create', [
            'languages' => \App\Models\Language::all(),
            'subCategories' => $this->getSubCategory(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_category' => 'required',
            'name_en' => 'required',
        ]);

        try {
            $material = new Material();
            $material->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);

            $material->sub_category_id = $request->get('sub_category');

            $material->save();

            flash('Material store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(Material $material)
    {
        return view('admin.fashion.material.edit',[
            'languages' => \App\Models\Language::all(),
            'subCategories' => $this->getSubCategory(),
            'material' => $material
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'sub_category' => 'required',
            'name_en' => 'required',
        ]);

        try {
            $material = Material::find($request->get('material_id') ?? "");
            $material->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);

            $material->sub_category_id = $request->get('sub_category');

            $material->save();

            flash('Material updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(Material $material)
    {
        try {
            $material->delete();
            flash('Material deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $material = Material::find($request->get('id'));
            $material->is_active = $request->get('status');
            $material->save();

            return response()->json([
                'success' => true,
                'message' => 'Material status change successfully.'
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }

    public function getSubCategory()
    {
        return Category::where('parent_id', CategoryNameService::FASHION)->where('is_active', 1)->get([
            'id',
            'en_name',
            'ar_name',
            'so_name'
        ]);
    }
}
