<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HobbiesController extends Controller
{
    public function index(Request $request)
    {
        $hobbies = Hobby::query();
        if ($request->has('searchTerm')) {
            $term = $request->get('searchTerm');

            $hobbies->where('name', 'like', "%{$term}%");
        }
        $hobbies = $hobbies->get();
        return view('hobbies.index', ['hobbies' => $hobbies]);

    }
    public function create(){
        return view('hobbies.create');
    }
    public function save(Request $request){
        $newHobby=$request->except('_token');
        Hobby::query()->create($newHobby);
        return Redirect::route('hobbies.index');
    }
    public function edit($id){
        $hobby=Hobby::query()->findOrFail($id);
        return view('hobbies.edit',['hobbies'=>$hobby]);
    }

    public function update($id,Request $request){
        $hobby=Hobby::query()->findOrFail($id);
        $newDetails = $request->only(['name']);
        $hobby->update($newDetails);

        return Redirect::route('hobbies.index');
    }
    public function delete($id){
        $hobby=Hobby::query()->findOrFail($id);
        $hobby->delete();

        return Redirect::route('hobbies.index');
    }

}
