<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\StateTranslation;
use App\Models\CityTranslation;
use App\Models\State;

class CityController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:locations', ['only' => ['index','store','edit','update','destroy','updateStatus']]);
    }

    public function index(Request $request)
    {
        $request->session()->put('cities_last_url', url()->full());
        $sort_city = $request->sort_city;
        $sort_state = $request->sort_state;
        $status_city = $request->status_city;

        $cities_queries = City::query();
        if($request->sort_city) {
            $cities_queries->where('name', 'like', "%$sort_city%");
        }
        if($request->sort_state) {
            $cities_queries->where('state_id', $request->sort_state);
        }

        if ($request->status_city) {
            $cities_queries->where('status', ($status_city == 2) ? 0:$status_city);
        }

        $cities = $cities_queries->orderBy('id', 'desc')->paginate(10);
        $states = State::where('status', 1)->get();

        return view('admin.locations.cities.index', compact('cities', 'states', 'status_city', 'sort_city', 'sort_state'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        $city           = new City;
        $city->name = setTranslation(
            [
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar') ?? "",
                'so' => $request->get('name_so') ?? "",
            ]
        );

        $city->state_id = $request->state_id;
        $city->save();


        flash(translate('City has been inserted successfully'))->success();

        return back();
    }

     public function edit(Request $request, $id)
     {
         $lang  = $request->lang;
         $city  = City::findOrFail($id);
         $states = State::where('status', 1)->get();
         $languages = \App\Models\Language::all();
         return view('admin.locations.cities.edit', compact('city', 'lang', 'states', 'languages'));
     }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        $city = City::findOrFail($id);
        $city->name = setTranslation(
            [
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so'),
            ]
        );
        $city->state_id     = $request->state_id;
        $city->save();

        flash(translate('City has been updated successfully'))->success();
        return back();
    }


    public function destroy($id)
    {
        $city = City::findOrFail($id);

        foreach ($city->city_translations as $key => $city_translation) {
            $city_translation->delete();
        }

        City::destroy($id);

        flash(translate('City has been deleted successfully'))->success();
        return redirect()->route('cities.index');
    }

    public function updateStatus(Request $request){
        $city = City::findOrFail($request->id);
        $city->status = $request->status;
        $city->save();

        return 1;
    }
}
