<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Condition;
use App\Models\Policy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $query = Policy::query();

        $policies = $query->orderBy('priority', 'DESC')->paginate(10);

        return view('admin.policy.index', compact('policies'));
    }

    public function create()
    {
        return view('admin.policy.create', [
            'languages' => \App\Models\Language::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'priority' => 'required|unique:policies,priority',
            'title_en' => 'required',
            'description_en' => 'required',
        ]);

        try {
            $policy = new Policy();
            $policy->priority = $request->get('priority') ?? "";
            $policy->title = setTranslation([
                'en' => $request->get('title_en'),
                'ar' => $request->get('title_ar'),
                'so' => $request->get('title_so')
            ]);
            $policy->description = setTranslation([
                'en' => $request->get('description_en'),
                'ar' => $request->get('description_ar'),
                'so' => $request->get('description_so')
            ]);
            $policy->save();

            flash('Data store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(Policy $policy)
    {
        $languages =  \App\Models\Language::all();
        return view('admin.policy.edit', compact('policy', 'languages'));
    }

    public function update(Request $request)
    {
        $policyId = $request->get('policy_id') ?? "";
        $request->validate([
            'priority' => 'required|unique:policies,priority,' . $policyId,
            'title_en' => 'required',
            'description_en' => 'required',
        ]);

        try {
            $policy = Policy::find($policyId);
            $policy->priority = $request->get('priority') ?? "";
            $policy->title = setTranslation([
                'en' => $request->get('title_en'),
                'ar' => $request->get('title_ar'),
                'so' => $request->get('title_so')
            ]);
            $policy->description = setTranslation([
                'en' => $request->get('description_en'),
                'ar' => $request->get('description_ar'),
                'so' => $request->get('description_so')
            ]);
            $policy->save();

            flash('Updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(Policy $policy)
    {
        try {
            $policy->delete();
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
            $help = Policy::find($request->get('id'));
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
