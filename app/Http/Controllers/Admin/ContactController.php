<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
class ContactController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:locations', ['only' => ['index']]);
    }

    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->get('name')) {
            $query->where('name', 'like', '%' . $request->get('name') . '%');
            $data['name'] = $request->get('name');
        }

        if ($request->get('email')) {
            $query->where('email', 'like', '%' . $request->get('email') . '%');
            $data['email'] = $request->get('email');
        }

        if ($request->get('phone_number')){
            $query->where('phone_number', 'like', '%' . $request->get('phone_number') . '%');
            $data['phone_number'] = $request->get('phone_number');
        }

        $data['contacts'] = $query->latest()->paginate(10);
        return view('admin.contact.index', $data);
    }

    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            flash('Contact deleted successfully')->success();
            return redirect()->back();
        }catch (\Exception $e) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }
}
