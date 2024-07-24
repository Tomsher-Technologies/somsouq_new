<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Condition;
use Illuminate\Http\Request;

class TermAndConditionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $query = Condition::query();

        $conditions = $query->orderBy('priority', 'DESC')->paginate(10);

        return view('admin.condition.index', compact('conditions'));
    }

    public function create()
    {
        return view('admin.condition.create', [
            'languages' => \App\Models\Language::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'priority' => 'required|unique:conditions,priority',
            'title_en' => 'required',
            'description_en' => 'required',
        ]);

        try {
            $condition = new Condition();
            $condition->priority = $request->get('priority') ?? "";
            $condition->title = setTranslation([
                'en' => $request->get('title_en'),
                'ar' => $request->get('title_ar'),
                'so' => $request->get('title_so')
            ]);
            $condition->description = setTranslation([
                'en' => $request->get('description_en'),
                'ar' => $request->get('description_ar'),
                'so' => $request->get('description_so')
            ]);
            $condition->save();

            flash('Data store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(Condition $condition)
    {
        $languages =  \App\Models\Language::all();
        return view('admin.condition.edit', compact('condition', 'languages'));
    }

    public function update(Request $request)
    {
        $conditionId = $request->get('condition_id') ?? "";
        $request->validate([
            'priority' => 'required|unique:conditions,priority,' . $conditionId,
            'title_en' => 'required',
            'description_en' => 'required',
        ]);

        try {
            $condition = Condition::find($conditionId);
            $condition->priority = $request->get('priority') ?? "";
            $condition->title = setTranslation([
                'en' => $request->get('title_en'),
                'ar' => $request->get('title_ar'),
                'so' => $request->get('title_so')
            ]);
            $condition->description = setTranslation([
                'en' => $request->get('description_en'),
                'ar' => $request->get('description_ar'),
                'so' => $request->get('description_so')
            ]);
            $condition->save();

            flash('Updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(Condition $condition)
    {
        try {
            $condition->delete();
            flash('Data deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $help = Condition::find($request->get('id'));
            $help->is_active = $request->get('status');
            $help->save();

            return response()->json([
                'success' => true,
                'message' => 'Data status change successfully.'
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }
}
