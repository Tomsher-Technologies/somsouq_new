<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create']]);
    }

    public function index(Request $request)
    {
       $query =  Help::query();
        $search_text = "";
       if ($request->get('search')) {
           $search_text = $request->get('search');
           $query->where('question', 'like', '%' . $request->get('search') . '%');
       }

       $helps = $query->latest()->paginate(10);
        return view('admin.help.index', compact('helps', 'search_text'));
    }

    public function create()
    {
        return view('admin.help.create', [
            'languages' => \App\Models\Language::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_en' => 'required',
            'answer_en' => 'required',
        ]);

        try {
            $help = new Help();
            $help->question = setTranslation([
                'en' => $request->get('question_en'),
                'ar' => $request->get('question_ar'),
                'so' => $request->get('question_so'),
            ]);
            $help->answer = setTranslation([
                'en' => $request->get('answer_en'),
                'ar' => $request->get('answer_ar'),
                'so' => $request->get('answer_so'),
            ]);
            $help->save();

            flash('Help data store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(Help $help)
    {
        $languages =  \App\Models\Language::all();
        return view('admin.help.edit', compact('help', 'languages'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'question_en' => 'required',
            'answer_en' => 'required',
        ]);

        try {
            $help = Help::find($request->get('help_id'));

            $help->question = setTranslation([
                'en' => $request->get('question_en'),
                'ar' => $request->get('question_ar'),
                'so' => $request->get('question_so'),
            ]);
            $help->answer = setTranslation([
                'en' => $request->get('answer_en'),
                'ar' => $request->get('answer_ar'),
                'so' => $request->get('answer_so'),
            ]);
            $help->save();

            flash('Updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(Help $help)
    {
        try {
            $help->delete();
            flash('Question deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $help = Help::find($request->get('id'));
            $help->is_active = $request->get('status');
            $help->save();

            return response()->json([
                'success' => true,
                'message' => 'Question status change successfully.'
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }
}
