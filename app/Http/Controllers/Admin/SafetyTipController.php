<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutDescription;
use App\Models\SafetyTip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SafetyTipController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:locations', ['only' => ['index']]);
    }

    public function index(Request $request)
    {
        $query = SafetyTip::query()->leftJoin('categories', 'categories.id', '=', 'safety_tips.category_id');
        $category = "";
        if ($request->has('category_id')) {
            $category = $request->has('category_id');
            $query->where('safety_tips.category_id', $request->get('category_id'));
        }

        $safetyTips = $query->select('safety_tips.*', 'categories.en_name as category_name')->latest()->paginate(15);

        return view('admin.safetyTip.index', compact('safetyTips', 'category'));
    }

    public function create()
    {
        return view('admin.safetyTip.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name_en' => 'required',
        ]);

        try {
            $tip = new SafetyTip();
            $tip->category_id = $request->get('category_id');
            $tip->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so'),
            ]);
            $tip->save();

            flash('Store safety tip successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(SafetyTip $safetyTip)
    {
        return view('admin.safetyTip.edit', compact('safetyTip'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name_en' => 'required',
        ]);

        try {
            $tip = SafetyTip::find($request->get('id'));
            $tip->category_id = $request->get('category_id');
            $tip->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so'),
            ]);
            $tip->is_active = $request->get('status');
            $tip->save();

            flash('update safety tip successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(SafetyTip $safetyTip)
    {
        try {
            $safetyTip->delete();
            flash('Safety tip deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }


}
