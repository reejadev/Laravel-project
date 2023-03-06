<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\user;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function show(String $id,$comp): View
    {
        $name="Reeja-".$id."comp-".$comp;
        $body="This is Laravel";
        return view('pages.user', compact('name','body'));

        // return view('pages.user', [
        //     'user' => User::findOrFail($id)
        // ]);
    }

    public function about()
    {
       // $title ="About us page";
        return view('pages.about');
        //return  $title;
    }

    // public function users($id)
    // {
    //     $name="Reeja-".$id;
    //     return view('pages.users',compact('name'));
    // }
}
