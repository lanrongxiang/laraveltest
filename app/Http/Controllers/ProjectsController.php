<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Repositories\ProjectsRepository;
use Illuminate\Http\Request;


class ProjectsController extends Controller
{
    protected $repo;
    public function __construct(ProjectsRepository $repo)
    {
        $this->repo = $repo;
    }
    public function store(CreateProjectRequest $request)//经过CreateProjectRequest验证器验证过在执行下面的代码
    {
        $this->repo->create($request);
        return back();//重定向上一个页面
    }
   
}
