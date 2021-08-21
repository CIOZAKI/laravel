<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\content;
class ContensController extends Controller
{
    function index(){
    $id= 1;
    $items = content::find($id);
    //}
    return view('contents',compact('items'));
    }
}
