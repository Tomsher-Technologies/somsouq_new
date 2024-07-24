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
        $categories = Category::where('parent_id', 0)->where('is_active', 1)
            ->get([
                'id',
                'en_name',
                'ar_name',
                'so_name',
                'parent_id',
                'icon'
            ])->reject(function ($value) {
                return in_array($value->id, [1, 2, 4]);
            });

        $query = Brand::query()->leftJoin('categories', 'categories.id', '=', 'brands.category_id');
        $category = $request->get('category') ?? "";
        if ($request->get('category')) {
            $category = $request->get('category');
            $query->where('category_id', '=', $category);
        }

        $brands = $query->select('brands.*', 'categories.en_name')->latest()->paginate(10);

        return view('admin.brand.index', compact('brands', 'categories', 'category'));
    }

    public function create()
    {
        $categories = Category::where('parent_id', 0)->where('is_active', 1)
            ->get([
                'id',
                'en_name',
                'ar_name',
                'so_name',
                'parent_id',
                'icon'
            ])->reject(function ($value) {
                return in_array($value->id, [1, 2, 4]);
            });

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
        $categories = Category::where('parent_id', 0)->where('is_active', 1)
            ->get([
                'id',
                'en_name',
                'ar_name',
                'so_name',
                'parent_id',
                'icon'
            ])->reject(function ($value) {
                return in_array($value->id, [1, 2, 4]);
            });

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
}
