<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Ingredient;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::orderBy('id','desc')->paginate(5);

        return view('admin.ingredients.index', compact('ingredients'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredient = $request->all();

        $new_ingredient = new Ingredient;
        $new_ingredient->name = $ingredient['name'];

        $new_ingredient->slug = $new_ingredient->generateSlug($new_ingredient->name);
        
        $new_ingredient->save();

        return redirect()->route('admin.ingredients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredient = Ingredient::find($id);

        return view ('admin.ingredients.show',compact('ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredient = Ingredient::find($id);

        if($ingredient){

            return view ('admin.ingredients.edit',compact('ingredient'));
        } else {abort(404, 'Ingrediente non presente nel DB');}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $new_ingredient = $request->all();

        if($ingredient->name != $new_ingredient['name']){

            $new_ingredient['slug'] = Ingredient::generateSlug($new_ingredient['name']);

        }else{

            $new_ingredient['slug'] = $ingredient->slug;

        }

        $ingredient->update($new_ingredient);

        return redirect()->route('admin.ingredients.show', $ingredient);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()->route('admin.ingredients.index')->with('cancellato',"Cancellazione avvenuta con successo! Parola di Giancarlo");
    }
}
