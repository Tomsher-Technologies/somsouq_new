<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use Illuminate\Http\Request;

class TermAndConditionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index','update']]);
    }

    public function index()
    {
        $languages =  \App\Models\Language::all();
        $condition = Condition::find(1);
        return view('admin.condition.edit', compact('condition', 'languages'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'description_en' => 'required',
        ]);

        try {

            $condition = Condition::find(1);

            $condition->title = setTranslation([
                'en' => $request->get('title_en'),
                'ar' => $request->get('title_ar'),
                'so' => $request->get('title_so'),
            ]);

            $condition->description_en = $request->get('description_en') ?? "";
            $condition->description_ar = $request->get('description_ar') ?? "";
            $condition->description_so = $request->get('description_so') ?? "";
            $condition->save();

            flash('Updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }
}
