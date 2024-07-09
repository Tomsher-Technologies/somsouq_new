<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:locations', ['only' => ['index']]);
    }

    public function index(Request $request)
    {
        return view('admin.about.index', [
            'abouts' => About::where('is_active', true)->get(),
            'section' => $this->getSectionList()
        ]);
    }

    public function edit(About $about)
    {
        $data['about'] = $about;
        $data['section'] = $this->getSectionList();

        if ($about->description_type == 2) {
            $data['descriptions'] = DB::table('about_descriptions')->where('about_id', $about->id)->get();
        }

        return view('admin.about.edit', $data);
    }

    public function update(Request $request)
    {
        try {
            $about = About::find($request->get('id'));
            $about->title = $request->get('title') ?? "";
            $about->description = $request->get('description') ?? "";
            $about->image = $request->get('image') ?? "";
            $about->is_active = $request->get('status') ?? "";
            $about->save();

            if ($about->description_type == 2) {
                foreach ($request->get('multi_title') as $key => $value)
                {
                    $ids = $request->get('ids')[$key];
                    DB::table('about_descriptions')->where('id', $ids)->update([
                        'title' => $value,
                        'about_id' => $about->id,
                        'description' => $request->get('multi_description')[$key],
                        'is_active' => $request->get('multi_status')[$key],
                    ]);
                }
            }

            flash('Updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            dd($e->getMessage());
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function getSectionList()
    {
        return [
            '1' => 'First Section',
            '2' => 'Second Section',
            '3' => 'Third Section',
            '4' => 'Fourth Section',
        ];
    }
}
