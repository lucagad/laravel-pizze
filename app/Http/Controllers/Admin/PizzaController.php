<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PizzaRequest;
use Illuminate\Http\Request;
use App\Pizza;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizze = Pizza::orderBy('id', 'desc')->paginate(5);
        return view('admin.pizze.index', compact('pizze'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pizze.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaRequest $request)
    {

        $pizza = $request->all();
        $new_pizza = new Pizza;
        $new_pizza->fill($pizza);
        $new_pizza->slug = $new_pizza->generateSlug($new_pizza->name);
        if($new_pizza->is_veggie == "Sì"){
            $new_pizza->is_veggie = true;
        }else{
            $new_pizza->is_veggie = false;
        }
        $new_pizza->save();
        return redirect()->route('admin.pizze.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pizza = Pizza::find($id);
        return view('admin.pizze.show', compact('pizza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::find($id);
        return view('admin.pizze.edit', compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PizzaRequest $request, Pizza $pizze)
    {
        $new_pizza = $request->all();

        if($pizze->name != $new_pizza['name']){

            $new_pizza['slug'] = Pizza::generateSlug($new_pizza['name']);

        }else{

            $new_pizza['slug'] = $pizze->slug;

        }

        if($new_pizza['is_veggie'] == "Sì"){
            $pizze->is_veggie = true;
        }else{
            $pizze->is_veggie = false;
        }


        $pizze->update($new_pizza);
        return redirect()->route('admin.pizze.show', $pizze);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizze)
    {
        $pizze->delete();
        return redirect()->route('admin.pizze.index')->with('cancellato',"Cancellazione avvenuta con successo! Parola di Giancarlo");
    }
}
