<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutDescription;
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

    public function edit(Request $request, About $about)
    {
        $data['about'] = $about;
        $data['section'] = $this->getSectionList();
        $data['languages'] = \App\Models\Language::all();
        $data['lang'] = $request->lang;

        if ($about->description_type == 2) {
            $data['descriptions'] = AboutDescription::where('about_id', $about->id)->get();
        }

        return view('admin.about.edit', $data);
    }

    public function update(Request $request)
    {

        try {
            $about = About::find($request->get('id'));

            $about->title = [
                'en' => $request->get('title_en'),
                'ar' => $request->get('title_ar'),
                'so' => $request->get('title_so'),
            ];

            $about->description = [
                'en' => $request->get('description_en'),
                'ar' => $request->get('description_ar'),
                'so' => $request->get('description_so'),
            ];

            $about->image = $request->get('image') ?? "";
            $about->is_active = $request->get('status') ?? "";
            $about->save();

            if ($about->description_type == 2) {
                foreach (array_unique($request->get('ids')) as $key => $value)
                {
                    DB::table('about_descriptions')->where('id', $value)->update([
                        'title' => [
                            'en' => $request->get('multi_title_en')[$key],
                            'ar' => $request->get('multi_title_ar')[$key],
                            'so' => $request->get('multi_title_so')[$key],
                        ],
                        'about_id' => $about->id,
                        'description' => [
                            'en' => $request->get('multi_description_en')[$key],
                            'ar' => $request->get('multi_description_ar')[$key],
                            'so' => $request->get('multi_description_so')[$key],
                        ],
                        'is_active' => $request->get('multi_status_' . $request->get('lang'))[$key],
                    ]);
                }
            }

            flash('Updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
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

    public function getTranslateField($field_name, $lang)
    {
        if ($lang == 'en') {
            return $field_name .'_'. $lang;
        } elseif ($lang == 'ar') {
            return $field_name .'_'. $lang;
        } elseif ($lang == 'so') {
            return $field_name .'_'. $lang;
        }
    }
}
