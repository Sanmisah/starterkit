<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateStateRequest;      //validation
use App\Http\Requests\StoreStateRequest;      //validation
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;

class StateController extends Controller
{
    public function index()
    {        
        $states = State::with(['Country'])->get();
        // $states = State::all()->load('country');
        return view('state.index',compact('states'));
    }

   

    public function create()
    {
        $countries = Country::all();
        return view('state.create')->with(['countries'=>$countries]);
    }

    public function store(StoreStateRequest $request)
    {       
        $input = $request->all();        
        $state = State::create($input);    
        return redirect()->route('state.index')->with('success', 'States has been saved successfully');
    }

    public function edit(State $state)
    {
        return view('state.edit', ['state' => $state,'countries' => Country::all()]);
    }   
   
    public function update(UpdateStateRequest $request, State $state)
    {       
        $input = $request->all();
        $state->fill($input);    
        $state->update();  
        return redirect()->route('state.index')->with('success', 'States has been saved successfully');

    }
    /**
     * Delete the user's account.
     */
    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('state.index')->with('success', 'State has been Deleted');
    }
}
