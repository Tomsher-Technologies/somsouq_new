<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fashion\FashionType;
use App\Models\Fashion\Variant;
use App\Services\Front\CategoryNameService;
use Illuminate\Http\Request;

class FashionTypeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $subCategories = $this->getSubCategory();
            $query = FashionType::query();
            $query->leftJoin('categories', 'categories.id', '=', 'fashion_types.sub_category_id')
                ->leftJoin('variants', 'variants.id', '=', 'fashion_types.variant_type_id');

            $searchText = "";
            if ($request->get('search')) {
                $searchText = $request->get('search');
                $query->where('fashion_types.name', 'like', '%' . $searchText . '%');
            }

            $subCategory = "";
            if ($request->get('category')) {
                $subCategory = $request->get('category');
                $query->where('fashion_types.sub_category_id', '=', $subCategory);
            }

            $types = $query->select('fashion_types.*', 'categories.en_name', 'variants.name as variant_name')
                ->orderBy('fashion_types.created_at', 'DESC')
                ->paginate(10);

            return view('admin.fashion.type.index', compact('types', 'searchText', 'subCategories', 'subCategory'));
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('admin.fashion.type.create', [
            'languages' => \App\Models\Language::all(),
            'subCategories' => $this->getSubCategory(),
            'variants' => Variant::where('is_active', 1)->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_category' => 'required',
            'name_en' => 'required',
        ]);

        try {
            $type = new FashionType();
            $type->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);

            $type->sub_category_id = $request->get('sub_category');
            $type->variant_type_id = $request->get('size_variant');
            $type->save();

            flash('Type store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(FashionType $fashionType)
    {
        return view('admin.fashion.type.edit',[
            'languages' => \App\Models\Language::all(),
            'subCategories' => $this->getSubCategory(),
            'variants' => Variant::where('is_active', 1)->get(),
            'type' => $fashionType
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'sub_category' => 'required',
            'name_en' => 'required',
        ]);

        try {
            $type = FashionType::find($request->get('type_id') ?? "");
            $type->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);

            $type->sub_category_id = $request->get('sub_category');
            $type->variant_type_id = $request->get('size_variant');
            $type->save();

            flash('Type updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(FashionType $fashionType)
    {
        try {
            $fashionType->delete();
            flash('Type deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $type = FashionType::find($request->get('id'));
            $type->is_active = $request->get('status');
            $type->save();

            return response()->json([
                'success' => true,
                'message' => 'Type status change successfully.'
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
