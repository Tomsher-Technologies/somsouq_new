<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Electronic\ElectronicType;
use App\Services\Front\CategoryNameService;
use Illuminate\Http\Request;

class ElectronicTypeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $subCategories = $this->getSubCategory();
            $query = ElectronicType::query();
            $query->leftJoin('categories', 'categories.id', '=', 'electronic_types.sub_category_id');

            $searchText = "";
            if ($request->get('search')) {
                $searchText = $request->get('search');
                $query->where('electronic_types.name', 'like', '%' . $searchText . '%');
            }

            $subCategory = "";
            if ($request->get('category')) {
                $subCategory = $request->get('category');
                $query->where('electronic_types.sub_category_id', '=', $subCategory);
            }

            $types = $query->select('electronic_types.*', 'categories.en_name')
                ->orderBy('electronic_types.created_at', 'DESC')
                ->paginate(10);

            return view('admin.electronic.type.index', compact('types', 'searchText', 'subCategories', 'subCategory'));
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('admin.electronic.type.create', [
            'languages' => \App\Models\Language::all(),
            'subCategories' => $this->getSubCategory()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_category' => 'required',
            'name_en' => 'required',
        ]);

        try {
            $electronicType = new ElectronicType();
            $electronicType->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);

            $electronicType->sub_category_id = $request->get('sub_category');
            $electronicType->save();

            flash('Type store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(ElectronicType $electronicType)
    {
        return view('admin.electronic.type.edit',[
            'languages' => \App\Models\Language::all(),
            'subCategories' => $this->getSubCategory(),
            'type' => $electronicType
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'sub_category' => 'required',
            'name_en' => 'required',
        ]);

        try {
            $type = ElectronicType::find($request->get('type_id') ?? "");
            $type->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);

            $type->sub_category_id = $request->get('sub_category');
            $type->save();

            flash('Type updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(ElectronicType $electronicType)
    {
        try {
            $electronicType->delete();
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
            $type = ElectronicType::find($request->get('id'));
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
        return Category::where('parent_id', CategoryNameService::ELECTRONIC)->where('is_active', 1)->get([
            'id',
            'en_name',
            'ar_name',
            'so_name'
        ]);
    }
}
