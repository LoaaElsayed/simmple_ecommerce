<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\producrResorce;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiproductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return producrResorce::collection($product);
    }
    public function show($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return response()->json(['msg' => 'this is not found 404'], 404);
        }
        return new producrResorce($product);
    }
    public function store(Request $request)
    {
        $validate = validator::make($request->all(), [
            'name' => 'string|min:3',
            'desc' => 'string|min:5',
            'code' => 'string|min:3',
            'price' => 'integer|gt:0',
            'image' => 'image|mimes:jpg,png',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors(),
            ]);
        }
        $imagepath = Storage::putFile('product', $request->image);
        $prod = new Product();
        $prod->name = $request->name;
        $prod->desc = $request->desc;
        $prod->code = $request->code;
        $prod->price = $request->price;
        $prod->image = $imagepath;
        $prod->save();
        return response()->json([
            'msg' => 'create sucessful',
            'pro' => $prod
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validate2 = validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'desc' => 'required|string',
            'code' => 'required|string|min:3',
            'price' => 'required|integer|gt:0',
            'image' => 'nullable|image|mimes:jpg,png',
        ]);
        if ($validate2->fails()) {
            return  response()->json([
                'message' => $validate2->errors()
            ]);
        }
        $prodt = Product::find($id);
        if ($prodt == null) {
            return response()->json([
                'mesage' => 'This not found'
            ], 404);
        }
        $prodt->name = $request->name;
        $prodt->desc = $request->desc;
        $prodt->code = $request->code;
        $prodt->price = $request->price;
        $imagepath = $request->image;
        if ($request->hasfile('image')) {
            Storage::delete($imagepath);
            $imagepath = Storage::putFile('product', $request->image);
        }
        $prodt->image = $imagepath;
        $prodt->save();
    }
    public function delete($id)
    {
        $prodel = Product::find($id);
        if ($prodel == null) {
            return response()->json([
                'mesage' => 'This not found'
            ], 404);
        }
        Storage::delete($prodel->image);
        $prodel->delete();

        return response()->json([
            'message' => 'delete sucessful'
        ]);
    }
}
