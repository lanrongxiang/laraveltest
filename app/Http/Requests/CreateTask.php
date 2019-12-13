<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateTask extends FormRequest
{
    protected $errorBag='create';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:255',
            // 'project'=> 'required|integer|exists:projects,id'//integer规则:用户上传的数据是否是整数;exists规则:第一参数定义是哪一个表,第二个是表里面的哪个字段是否存在
            'project'=>[
                'required',
                'integer',
                Rule::exists('projects','id')->where(function($query){
                    return $query->whereIn('id', $this->user()->projects()->pluck('id'));//提交的project_id必须存在于projects这张表中id这一栏,并且这一栏存在于当前user属于projects这个序列
                })
            ]
        ];
    }
    public function messages(){
        return [
            'name.required' => '任务名称是必须的',
            'name.max' => '任务名称的长度超出了最大字符限制:255',
            'project.required' => '没有提交当前任务所属项目的id',
            'project.integer' => '所提交的项目id无效(非整数)',
            'project.exists' => '所提交的项目Id无效(当前用户无此项目)',
        ];
    }
}
