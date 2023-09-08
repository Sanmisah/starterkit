<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateCountryRequest;      //validation
use App\Http\Requests\StoreCountryRequest;      //validation
use Illuminate\Http\RedirectResponse;           //redirect the page
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class CountriesController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('countries.index', ['countries' => $countries]);
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(StoreCountryRequest $request)
    {
        $input = $request->all();      
        $country = Country::create($input);  
        return redirect()->route('countries.index')->with('success', 'Country has been saved successfully');
    }
   
    public function show(Country $country)
    {
        $states = State::where('country_id', $country->id)->get();
        return $states;
    }

  
    /**
     * Display the user's profile edit  form.
     */
    public function edit(Country $country)
    {
        return view('countries.edit')->with(['country'=>$country]);
    }

    /**
     * Update the user's information.
     */
    public function update(UpdateCountryRequest $request, Country $country): RedirectResponse
    {
        $country->update($request->all());
        return redirect()->route('countries.index')->withSuccess(__('Country updated successfully.'));
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Country $country): RedirectResponse
    {       
        $country->delete();
        return redirect()->route('countries.index');
    }
}
