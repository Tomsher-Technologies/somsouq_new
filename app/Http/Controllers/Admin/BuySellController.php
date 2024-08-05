<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Front\ContentType;
use App\Http\Controllers\Controller;
use App\Models\BuySell;
use App\Models\Policy;
use Illuminate\Http\Request;

class BuySellController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $query = BuySell::query();

        $sells = $query->latest()->paginate(10);



        return view('admin.buySell.index', compact('sells'));
    }

    public function create()
    {
        return view('admin.buySell.create', [
            'languages' => \App\Models\Language::all(),
            'contentType' => $contentType = ContentType::getContentType(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content_type_id' => 'required',
            'priority' => 'required',
            'title_en' => 'required',
            'description_en' => 'required',
        ]);

        try {
            $buy_sell = new BuySell();
            $buy_sell->content_type_id = $request->get('content_type_id') ?? "";
            $buy_sell->priority = $request->get('priority') ?? "";
            $buy_sell->title = setTranslation([
                'en' => $request->get('title_en'),
                'ar' => $request->get('title_ar'),
                'so' => $request->get('title_so')
            ]);
            $buy_sell->description = setTranslation([
                'en' => $request->get('description_en'),
                'ar' => $request->get('description_ar'),
                'so' => $request->get('description_so')
            ]);
            $buy_sell->save();

            flash('Data store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(BuySell $buySell)
    {
        $languages =  \App\Models\Language::all();
        $contentType = ContentType::getContentType();
        return view('admin.buySell.edit', compact('contentType', 'languages', 'buySell'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'content_type_id' => 'required',
            'priority' => 'required',
            'title_en' => 'required',
            'description_en' => 'required',
        ]);

        try {
            $buy_sell = BuySell::find($request->get('buy_id') ?? "");
            $buy_sell->content_type_id = $request->get('content_type_id') ?? "";
            $buy_sell->priority = $request->get('priority') ?? "";
            $buy_sell->title = setTranslation([
                'en' => $request->get('title_en'),
                'ar' => $request->get('title_ar'),
                'so' => $request->get('title_so')
            ]);
            $buy_sell->description = setTranslation([
                'en' => $request->get('description_en'),
                'ar' => $request->get('description_ar'),
                'so' => $request->get('description_so')
            ]);
            $buy_sell->save();

            flash('Data update successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(BuySell $buySell)
    {
        try {
            $buySell->delete();
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
            $help = BuySell::find($request->get('id'));
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
