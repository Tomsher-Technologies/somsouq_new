<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fashion\Variant;
use App\Models\Fashion\VariantValue;
use Illuminate\Http\Request;

class SizeVariantController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        return view('admin.fashion.variant.index', [
            'variants' => Variant::latest()->paginate(10)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $variant = new Variant();
            $variant->name = $request->get('name');
            $variant->save();

            flash('Variant store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(Variant $variant)
    {
        return response()->json([
            'status' => true,
            'data' => $variant
        ]);
    }

    public function view(Variant $variant)
    {
        $values = VariantValue::where('variant_id', $variant->id)->latest()->paginate(10);
        return view('admin.fashion.variant.view', compact('variant', 'values'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $variant = Variant::find($request->get('variant_id') ?? "");
            $variant->name = $request->get('name');
            $variant->save();

            flash('Variant updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function valueStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $value = new VariantValue();
            $value->variant_id = $request->get('variant_id');
            $value->name = $request->get('name');
            $value->priority = $request->get('priority');
            $value->save();

            flash('Variant value store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function valueEdit(VariantValue $variantValue)
    {
        return response()->json([
            'status' => true,
            'data' => $variantValue
        ]);
    }

    public function valueUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $value = VariantValue::find($request->get('value_id') ?? "");
            $value->name = $request->get('name');
            $value->priority = $request->get('priority');
            $value->save();

            flash('Variant value update successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $variant = Variant::find($request->get('id'));
            $variant->is_active = $request->get('status');
            $variant->save();

            return response()->json([
                'success' => true,
                'message' => 'Status change successfully.'
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }
}
