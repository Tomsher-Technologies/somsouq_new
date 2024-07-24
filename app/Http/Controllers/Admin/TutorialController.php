<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:locations', ['only' => ['index']]);
    }

    public function index(Request $request)
    {
        return view('admin.tutorial.index', [
            'tutorials' => Tutorial::orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.tutorial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'youtube_link' => 'required',
        ]);

        try {

            $tutorial = new Tutorial();
            $tutorial->title = setTranslation([
                'en' => $request->get('title_en'),
                'ar' => $request->get('title_ar'),
                'so' => $request->get('title_so'),
            ]);

            $tutorial->youtube_link = $request->get('youtube_link');
            $tutorial->save();

            flash('Store data successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(Tutorial $tutorial)
    {
        return view('admin.tutorial.edit', ['tutorial' => $tutorial]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'youtube_link' => 'required',
        ]);

        try {

            $tutorial = Tutorial::find($request->get('id'));

            $tutorial->title = setTranslation([
                'en' => $request->get('title_en'),
                'ar' => $request->get('title_ar'),
                'so' => $request->get('title_so'),
            ]);

            $tutorial->youtube_link = $request->get('youtube_link');
            $tutorial->is_active = $request->get('status');
            $tutorial->save();

            flash('Updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(Tutorial $tutorial)
    {
        try {
            $tutorial->delete();
            flash('Tutorial deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }
}
