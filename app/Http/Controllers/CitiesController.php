<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CitiesController extends Controller
{
    public function index(Request $request)
    {
        $cities = City::query();
        if ($request->has('searchTerm')) {
            $term = $request->get('searchTerm');

            $cities->where('name', 'like', "%{$term}%");
        }
        $cities = $cities->get();
        return view('cities.index', ['cities' => $cities]);

    }
    public function create(){
        $countries = Country::all(); //dodato za drzave
        return view('cities.create',compact('countries'));
    }
    public function save(Request $request){
        $newCity=$request->except('_token');
        City::query()->create($newCity);
        return Redirect::route('cities.index');
    }
    public function edit($id){
        $city=City::query()->findOrFail($id);
        return view('cities.edit',['cities'=>$city]);
    }

    public function update($id,Request $request){
        $city=City::query()->findOrFail($id);
        $newDetails = $request->only(['name']);
        $city->update($newDetails);

        return Redirect::route('cities.index');
    }
    public function delete($id){
        $city=City::query()->findOrFail($id);
        $city->delete();

        return Redirect::route('cities.index');
    }
}
