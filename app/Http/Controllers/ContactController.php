<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Contact;
use App\Models\Country;
use App\Rules\ValidatePancard;
use App\Rules\ValidateAadhar;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.contacts', ['contacts' => $contacts]);
    }

    public function create()
    {
        $countries = Country::all();
        return view('contacts.create')->with(['countries'=>$countries]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'pancard'=> ['required', new ValidatePancard],
            'email' => 'required',
        ]);
        $input = $request->all();
      
        Contact::create($input);
        $request->session()->flash('success', 'Contact are saved successfully!');
        return redirect()->route('contacts.index');
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit',compact('contact'));
    }

    public function show(Contact $contact)
    {
        $contacts = Contact::all();
        return $contact;
    }

    public function update(Request $request, Contact $contact)
    {
        
        $request->validate([
            'name' => 'required',
            'pancard'=> ['required', new ValidatePancard],
            'aadhar' => ['required', new ValidateAadhar],
            'email' => 'required',
        ]);    
       
        $input = $request->all();
        $contact->update($input);
        $request->session()->flash('success', 'Contact are saved successfully!');
        
        return redirect()->route('contacts.index');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}