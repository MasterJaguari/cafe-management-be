<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stolovi;

class StoloviController extends Controller
{
    public function allTables(){
        return Stolovi::all();
    }

    public function addTable(Request $request){
        $sto = new Stolovi;
        $sto->create($request->all());
    }
    public function removeTable($id){
        $sto = Stolovi::find($id);
        $sto->delete();
    }
    public function updateTable($id, Request $request){
        $sto = Stolovi::find($id);
        $sto->update($request->all());
        $sto->save();
        return response(200);
    }
    public function oneTable($id){
        $sto = Stolovi::find($id);
        return $sto;
    }
}
