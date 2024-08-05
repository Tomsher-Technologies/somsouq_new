<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Copyright;
use App\Models\Policy;
use Illuminate\Http\Request;

class CopyRightController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'update']]);
    }

    public function index()
    {
        $languages =  \App\Models\Language::all();
        $copyright = Copyright::find(1);
        return view('admin.copy_right.edit', compact('copyright', 'languages'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'description_en' => 'required'
        ]);

        try {
            $policy = Copyright::find(1);
            $policy->title = setTranslation([
               'en' => $request->get('title_en'),
               'ar' => $request->get('title_ar'),
               'so' => $request->get('title_so'),
            ]);

            $policy->content_en = $request->get('description_en') ?? "";
            $policy->content_ar = $request->get('description_ar') ?? "";
            $policy->content_so = $request->get('description_so') ?? "";
            $policy->save();

            flash('Updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }
}
