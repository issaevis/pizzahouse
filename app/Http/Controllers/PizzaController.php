<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    /*
    Checks if session is authenticated and takes care of route protection. Cool shit!
    Another way to do it, it's just to add the middleware in the routes. route()->middleware('auth')
   /public function __construct() {
        $this->middleware('auth');
    }
    _________________________________________________________________________________*/

    public function index() {
        //$pizzas = Pizza::all();
        //$pizzas = Pizza::orderBy('name', 'desc')->get();
        //$pizzas = Pizza::where('type', 'hawaiian')->get();
        $pizzas = Pizza::latest()->get();

        return view('pizzas.index', [
            'pizzas' => $pizzas,
            'name'=> request('name'),
            'age' => request('age')
        ]);
    }

    public function show($id) {
        $pizza = Pizza::findOrFail($id);
        return view('pizzas.show', ['pizza' => $pizza]);
    }

    public function create() {
        return view('pizzas.create');
    }

    public function store() {
        $pizza = new Pizza();

        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->toppings = (request('toppings'));

        $pizza->save();

        return redirect('/')->with('message', 'Thanks for your order!');
    }

    public function destroy($id) {
        $pizza = Pizza::findOrFail($id);

        $pizza->delete();

        return(redirect('/pizzas'));
    }
}