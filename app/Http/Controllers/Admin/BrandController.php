<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $categories = $this->getCategory();

        $query = Brand::query();
        $category = $request->get('category') ?? "";
        if ($request->get('category')) {
            $category = $request->get('category');
            $query->where('category_id', '=', $category);
        }

        $brands = $query->latest()->paginate(10);

        return view('admin.brand.index', compact('brands', 'categories', 'category'));
    }

    public function create()
    {
        $categories = $this->getCategory();

        return view('admin.brand.create', [
            'languages' => \App\Models\Language::all(),
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'name_en' => 'required',
        ]);

        try {
            $brand = new Brand();
            $brand->category_id = $request->get('category');
            $brand->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);
            $brand->save();

            flash('Brand store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(Brand $brand)
    {
        $categories = $this->getCategory();

        $languages =  \App\Models\Language::all();
        return view('admin.brand.edit', compact('brand', 'languages', 'categories'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'name_en' => 'required',
        ]);

        try {
            $brand = Brand::find($request->get('brand_id') ?? "");

            $brand->category_id = $request->get('category');
            $brand->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);
            $brand->save();

            flash('Updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(Brand $brand)
    {
        try {
            $brand->delete();
            flash('Brand deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $help = Brand::find($request->get('id'));
            $help->is_active = $request->get('status');
            $help->save();

            return response()->json([
                'success' => true,
                'message' => 'Brand status change successfully.'
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }

    public function getCategory()
    {
        return [
            '3' => 'Vehicle',
            '6' => 'Electronic'
        ];
    }
}
