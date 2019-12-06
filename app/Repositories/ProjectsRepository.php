<?php

namespace App\Repositories;
use Image;

class ProjectsRepository{
    public function create($request){
        $request->user()->projects()->create([
            'name' => $request->name,
            'thumbnail' => $this->thumb($request),
        ]);
    }
    public function thumb($request)
    {

        if ($request->hasFile('thumbnail')) {
            $thumb = $request->thumbnail;
            $name = $thumb->hashName();
            $thumb->storeAs('public/thumbs/original', $name);

            $path = storage_path('app/public/thumbs/cropped/' . $name);
            Image::make($thumb)->resize(200, 90)->save($path);  //批量处理图片时
            return $name;
        }
    }
}
