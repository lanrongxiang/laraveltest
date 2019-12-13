<?php

namespace App\Repositories;

use App\Project;
use Image;

class ProjectsRepository
{

    public function list()
    {
        return request()->user()->projects()->get();
    }

    public function create($request)
    {
        $request->user()->projects()->create([ //调用user和peojects的关系创建字段
            'name' => $request->name,
            'thumbnail' => $this->thumb($request),
        ]);
    }

    public function find($id)
    { //定义一个方法查找Project的字段,如果找不到抛出异常
        return Project::findorFail($id);
    }

    public function todos($project)
    { //返回一个以completion字段为0的数据
        return $project->tasks()->where('completion', 0)->get();
    }

    public function dones($project)
    { //返回一个以completion字段为1的数据
        return $project->tasks()->where('completion', 1)->get();
    }
    public function delete($id)
    { //删除一个为id的字段
        $project = $this->find($id);
        $project->delete();
    }

    public function update($request, $id)
    {
        $project = $this->find($id);
        $project->name = $request->name; //表单提交上来的name
        if ($request->hasFile('thumbnail')) {
            $project->thumbnail = $this->thumb($request);
        }
        $project->save();
    }
    public function thumb($request)
    {

        if ($request->hasFile('thumbnail')) { //判断这个文件是否是空的
            $thumb = $request->thumbnail;
            $name = $thumb->hashName();
            $thumb->storeAs('public/thumbs/original', $name);

            $path = storage_path('app/public/thumbs/cropped/' . $name);
            Image::make($thumb)->resize(200, 90)->save($path);  //批量处理图片时
            return $name;
        }
    }
}
