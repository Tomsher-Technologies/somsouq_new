<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactRequest;
use App\Models\City;
use App\Models\Contact;
use Illuminate\Http\Request;

final class ContactController extends Controller
{
    public function index()
    {
        return view('frontEnd.pages.contact-us');
    }

    public function store(ContactRequest $request)
    {
        try {
            $contact = new Contact();
            $contact->name = $request->input('name');
            $contact->email = $request->input('email');
            $contact->phone_number = $request->input('phone_number');
            $contact->subject = $request->input('subject') ?? "";
            $contact->description = $request->input('description') ?? "";
            $contact->save();

            return redirect()->back()->with('success', trans('messages.contact_success'));
        }catch (\Exception $e){
            return redirect()->back()->with('error', trans('messages.wrong'));
        }
    }
}
