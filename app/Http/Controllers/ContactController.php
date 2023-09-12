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
use App\Models\User;
use Spatie\Permission\Models\Role;
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
        $roles = Role::all();
        $countries = Country::all();
        return view('contacts.create')->with([
            'countries'=>$countries,
            'roles' => $roles
        ]);
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
        $input['password'] = 'abcd123';
        $input['active'] = true;
      
        $user = User::create($input);
        $user->syncRoles($request->get('role'));
        $contact = new Contact;     

        $user->Contact()->create($request->all());

        $request->session()->flash('success', 'Contact are saved successfully!');
        return redirect()->route('contacts.index');
    }

    public function edit(Contact $contact)
    {
        $countries = Country::all();
        return view('contacts.edit',compact('contact', 'countries'));
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

        $user = User::find($contact->id);
        if ($user === null)
        {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = 'abcd123';
            $user->active = true;
            $contact->User()->save($user);
        }
        else
        {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            
        }
        if($request->hasFile('picture')){
            $contact->addMediaFromRequest('picture')->toMediaCollection('picture');
        }
        $request->session()->flash('success', 'Contact are saved successfully!');
        
        return redirect()->route('contacts.index');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}