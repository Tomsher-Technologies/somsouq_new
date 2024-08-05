<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SafetyTip;
use Illuminate\Http\Request;

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
        $languages =  \App\Models\Language::all();
        return view('admin.safetyTip.create', compact('languages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'tip_en' => 'required',
        ]);

        try {
            $tip = new SafetyTip();
            $tip->category_id = $request->get('category_id');
            $tip->tip = setTranslation([
                'en' => $request->get('tip_en'),
                'ar' => $request->get('tip_ar'),
                'so' => $request->get('tip_so'),
            ]);
            $tip->save();

            flash('Store safety tip successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            dd($e->getMessage());
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(SafetyTip $safetyTip)
    {
        $languages =  \App\Models\Language::all();
        return view('admin.safetyTip.edit', compact('safetyTip', 'languages'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'tip_en' => 'required',
        ]);

        try {
            $tip = SafetyTip::find($request->get('tip_id') ?? "");
            $tip->category_id = $request->get('category_id');
            $tip->tip = setTranslation([
                'en' => $request->get('tip_en'),
                'ar' => $request->get('tip_ar'),
                'so' => $request->get('tip_so'),
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
