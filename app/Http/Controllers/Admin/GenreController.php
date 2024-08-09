<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Electronic\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $query = Genre::query();

            $searchText = "";
            if ($request->get('search')) {
                $searchText = $request->get('search');
                $query->where('name', 'like', '%' . $searchText . '%');
            }

            $genres = $query->latest()->paginate(10);

            return view('admin.electronic.genre.index', compact('genres', 'searchText'));
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('admin.electronic.genre.create', [
            'languages' => \App\Models\Language::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        try {
            $genre = new Genre();
            $genre->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);

            $genre->save();

            flash('Genre store successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function edit(Genre $genre)
    {
        return view('admin.electronic.genre.edit',[
            'languages' => \App\Models\Language::all(),
            'genre' => $genre
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
        ]);

        try {
            $genre = Genre::find($request->get('genre_id') ?? "");
            $genre->name = setTranslation([
                'en' => $request->get('name_en'),
                'ar' => $request->get('name_ar'),
                'so' => $request->get('name_so')
            ]);

            $genre->save();

            flash('Genre updated successfully')->success();
            return redirect()->back();
        }catch (\Exception $e){
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function destroy(Genre $genre)
    {
        try {
            $genre->delete();
            flash('Genre deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $genry = Genre::find($request->get('id'));
            $genry->is_active = $request->get('status');
            $genry->save();

            return response()->json([
                'success' => true,
                'message' => 'Genre status change successfully.'
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }
}
