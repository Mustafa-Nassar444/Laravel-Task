<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function index(){
        $items=Item::paginate(5);
        return view('dashboard.items.index',compact('items'));
    }
}
