<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
class ProjectsController extends Controller
{
    public function store(Request $request){
       
        $request->user()->projects()->create([
            'name'=>$request->name,
            'thumbnail'=>$this->thumb($request),
        ]);
        
    }
    public function thumb($request){

        if ($request->hasFile('thumbnail')){
            $thumb= $request->thumbnail;
            $name=$thumb->hashName();
            $thumb->storeAs('public/thumbs/original',$name);

            $path=storage_path('app/public/thumbs/cropped/'.$name);
            Image::make($thumb)->resize(200,90)->save($path);
            return $name;
        }
    }
}
    