<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index','store','edit','update','destroy','updateStatus']]);
    }

    public function index(Request $request)
    {
        $request->session()->put('states_last_url', url()->full());
        $sort_state = $request->sort_state;
        $status_state = $request->status_state;

        $state_queries = State::query();
        if ($request->sort_state) {
            $state_queries->where('name', 'like', "%$sort_state%");
        }
        if ($request->status_state) {
            $state_queries->where('status', ($status_state == 2) ? 0:$status_state);
        }

        $states = $state_queries->orderBy('id', 'desc')->paginate(10);
        return view('admin.locations.states.index', compact('states', 'status_state', 'sort_state'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|unique:states,name',
        ]);

        $state = new State;
        $state->name = setTranslation([
            'en' => $request->get('name_en'),
            'ar' => $request->get('name_ar') ?? "",
            'so' => $request->get('name_so') ?? "",
        ]);
        $state->save();


        flash(translate('State has been inserted successfully'))->success();
        return back();
    }

    public function edit(Request $request, $id)
    {
        $lang  = $request->lang;
        $state  = State::findOrFail($id);
        $languages = \App\Models\Language::all();
        return view('admin.locations.states.edit', compact('state', 'lang', 'languages'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        $state = State::findOrFail($id);
        $state->name = setTranslation([
            'en' => $request->get('name_en'),
            'ar' => $request->get('name_ar'),
            'so' => $request->get('name_so'),
        ]);
        $state->save();

        flash(translate('State has been updated successfully'))->success();
        return back();
    }

    public function destroy($id)
    {
        State::destroy($id);

        flash(translate('State has been deleted successfully'))->success();
        return redirect()->route('states.index');
    }

    public function updateStatus(Request $request)
    {
        $state = State::findOrFail($request->id);
        $state->status = $request->status;
        $state->save();

        // if ($state->status) {
        //     foreach ($state->cities as $city) {
        //         $city->status = 1;
        //         $city->save();
        //     }
        // }

        return 1;
    }
}
