<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Electronic\Genre;
use App\Models\Electronic\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $query = Platform::query();

            $searchText = "";
            if ($request->get('search')) {
                $searchText = $request->get('search');
                $query->where('name', 'like', '%' . $searchText . '%');
            }

            $platforms = $query->latest()->paginate(10);

            return view('admin.electronic.platform.index', compact('platforms', 'searchText'));
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('admin.electronic.platform.create', [
            'languages' => \App\Models\Language::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        try {
            $platform = new Platform();
            $platform->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);

            $platform->save();

            flash('Platform store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(Platform $platform)
    {
        return view('admin.electronic.platform.edit',[
            'languages' => \App\Models\Language::all(),
            'platform' => $platform
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        try {
            $platform = Platform::find($request->get('platform_id') ?? "");
            $platform->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);

            $platform->save();

            flash('Platform updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(Platform $platform)
    {
        try {
            $platform->delete();
            flash('Platform deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $platform = Platform::find($request->get('id'));
            $platform->is_active = $request->get('status');
            $platform->save();

            return response()->json([
                'success' => true,
                'message' => 'Platform status change successfully.'
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }
}
