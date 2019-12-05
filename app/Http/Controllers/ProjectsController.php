<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function store(Request $request){
        dd($request->all());
        $request->user()->projects()->create([
            'name'=>$request->name,
            'thumnail'=>$request->thumnail,
        ]);
        
        return 'hitted';
    }
}
    