<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Project;
use App\Repositories\ProjectsRepository;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    protected $repo;
    public function __construct(ProjectsRepository $repo)
    {
        $this->repo = $repo;
        $this->middleware('auth');//用户登录以后才能使用的功能
    }

    //增(create)
    public function create(){
        //show create form view
    }
    public function store(CreateProjectRequest $request) //经过CreateProjectRequest验证器验证过在执行下面的代码
    {
        $this->repo->create($request);
        return back(); //重定向上一个页面
    }

    //删 (delete)
    public function destroy($id)
    {
        $this->repo->delete($id); //调用ProjectsRepository实例执行delete方法 定义了受保护的repo变量
        // Project::findorFail($id)->delete();   调用Project实例获取传入的参数执行删除方法,findorFail如果查找失败,抛出一个异常
        return back();
    }

    //改 (update)
    public function edit()
    {
        //show edit form view
    }

    public function update(UpdateProjectRequest $request, $id)
    { //接收一个Id,路由的一个参数用于后期查找当前的projects,还需要接收这个请求的数据
        $this->repo->update($request, $id);
        return back();
    }


    // 查 (show\read)
    public function index()
    {
        $projects = $this->repo->list();
        //列出当前用户的信息
        return view('welcome', compact('projects')); //向页面传递变量
    }
  
    public function show(Project $project){
        // $project = $this->repo->find($id);
        $todos = $this->repo->todos($project); //传递未完成事项
        $dones = $this->repo->dones($project); //已完成
        $projects=request()->user()->projects()->pluck('name','id');//获取用户中两栏的数据使用pluck('value','key')
        return view('projects.show',compact('projects','todos','dones','project'));
    }    
}
