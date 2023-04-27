<?php

namespace App\Http\Controllers;

use App\Models\Meni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeniController extends Controller
{
    public function allProducts(){
        return Meni::orderBy('naziv', 'ASC')->get();
    }
    public function addProduct(Request $request){
        $request->validate([
            'naziv' => 'string | required',
            'cena' => 'required'
        ]);
        $product = new Meni;
        $product->naziv = $request->input('naziv');
        $product->cena = $request->input('cena');
        $product->save();
        return response('Product added successfully', 200);
    }
    public function removeProduct($id){
        $product = Meni::find($id);
        $product->delete();
        return response('Product removed successfully', 200);
    }
    public function updateProduct(Request $request, $id){
        $product = Meni::find($id);
        $product->naziv = $request->input('naziv');
        $product->cena = $request->input('cena');
        $product->save();
        return response('Product updated successfully', 200);
    }
    public function getOneProduct($id){
        $product = Meni::find($id);
        return $product;
    }
}
