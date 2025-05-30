<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class Productcontroller extends Controller
{
    public function getProducts() {
        $products = Product::with('category', 'brand', 'supplier')->get();
    
        return response()->json(['products' => $products]);
    }
    public function addProduct(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],     
            'last_name' => ['required', 'string', 'max:255'],
            'id_number' => ['nullable', 'string', 'max:255', 'unique:products'],
            'product_id' => ['required', 'exists:products,id'],
            
        ]);

        $product = Product::create([
            'first_name' => $request->first_name,     
            'last_name' => $request->last_name,
            'id_number' => $request->id_number,
            'product_id' => $request->product_id,
            
        ]);

        return response()->json(['message' => 'Product added successfully', 'product' => $product]);
    }

    public function editProduct(Request $request, $id){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],     
            'last_name' => ['required', 'string', 'max:255'],
            'id_number' => ['nullable', 'string', 'max:255', 'unique:products,id_number,' . $id],
            'product_id' => ['required', 'exists:products,id'],
            
        ]);

        $product = Product::find($id);

        if(!$product){
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update([
            'first_name' => $request->first_name,   
            'last_name' => $request->last_name,
            'id_number' => $request->id_number,
            'product_id' => $request->product_id,
            
        ]);

        return response()->json(['message' => 'Product updated successfully', 'product' => $product ]);
    }   
}
