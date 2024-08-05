<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fashion\Occasion;
use App\Services\Front\CategoryNameService;
use Illuminate\Http\Request;

class OccasionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $subCategories = $this->getSubCategory();

            $query = Occasion::query()
                ->leftJoin('categories', 'categories.id', '=', 'occasions.sub_category_id');

            $searchText = "";
            if ($request->get('search')) {
                $searchText = $request->get('search');
                $query->where('occasions.name', 'like', '%' . $searchText . '%');
            }

            $subCategory = "";
            if ($request->get('category')) {
                $subCategory = $request->get('category');
                $query->where('occasions.sub_category_id', '=', $subCategory);
            }

            $occasions = $query->select('occasions.*', 'categories.en_name')
                ->orderBy('occasions.created_at', 'DESC')
                ->paginate(10);

            return view('admin.fashion.occasion.index', compact('occasions', 'searchText', 'subCategory', 'subCategories'));
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('admin.fashion.occasion.create', [
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
            $material = new Occasion();
            $material->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);

            $material->sub_category_id = $request->get('sub_category');

            $material->save();

            flash('Occasion store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(Occasion $occasion)
    {
        return view('admin.fashion.occasion.edit',[
            'languages' => \App\Models\Language::all(),
            'subCategories' => $this->getSubCategory(),
            'occasion' => $occasion
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'sub_category' => 'required',
            'name_en' => 'required',
        ]);

        try {
            $material = Occasion::find($request->get('occasion_id') ?? "");
            $material->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);

            $material->sub_category_id = $request->get('sub_category');

            $material->save();

            flash('Occasion updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(Occasion $occasion)
    {
        try {
            $occasion->delete();
            flash('Occasion deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $occasion = Occasion::find($request->get('id'));
            $occasion->is_active = $request->get('status');
            $occasion->save();

            return response()->json([
                'success' => true,
                'message' => 'Occasion status change successfully.'
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
