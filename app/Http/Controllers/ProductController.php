<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $producte= Product::all();
        return view("index",compact("producte"));
    }

    public function create()
    {
        return view("create");
    }

    public function store(Request $request)
    {
        $request -> validate ([
            'name' => 'required|string|min:3',
            'desc' => 'required|string|min:5',
            'code' => 'required|string|min:3',
            'price' => 'required|number|gt:0',
        ]);
        $produc = new Product();
        $produc->name = $request->name;
        $produc->desc = $request->desc;
        $produc->code = $request->code;
        $produc->price = $request->price;
        $produc->save();
        return redirect()->back()->with("done","insert sucess");
    }

    public function show($id)
    {
        $shopro = Product::find($id);
        return view('show',compact('shopro'));
    }

    public function edit($id)
    {
        $prod = Product::find($id);
        return view('edit', compact('prod'));
    }

    public function update(Request $request , $id)
    {
        $request -> validate ([
            'name' => 'required|string|min:3',
            'desc' => 'required|string|min:5',
            'code' => 'required|string|min:3',
            'price' => 'required|numeric|gt:0',
        ]);
        $produc = Product::find($id);
        $produc->name = $request->name;
        $produc->desc = $request->desc;
        $produc->code = $request->code;
        $produc->price = $request->price;
        $produc->save();
        return redirect('/index')->with("done","update sucess");
    }

    public function destroy($id)
    {
        $prod = Product::find($id);
        $prod->delete();
        return redirect('/index')->with("done","delete sucess");
    }
}
