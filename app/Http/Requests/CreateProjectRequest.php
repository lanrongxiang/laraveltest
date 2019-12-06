<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; //调用Rule额外的class

class CreateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //判断当前的用户是否有权限来执行当前表单提交;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', //必填的,
                // 'unique:projects' 不允许同时存在两个,这个projects表里面name这一栏.
                Rule::unique('projects')->where(function ($query) {
                    //porjects这张表,条件是一个匿名函数需要$query参数,返回这个参数看这张表的user_id是否和登录用户的id一样
                    return $query->where('user_id', request()->user()->id);
                })
            ],
            'thumbnail' => 'image|dimensions:min_width=260,min_height=100' //是一个图片格式的(不是必填的),定义尺寸:最小的宽度为260px,最小的高度为100px
        ];
    }
    public function messages()
    { //laravel提供的一个提示错误信息方法
        return [
            'name.required' => '项目名称是必填的~',
            'name.unique' => '项目名称必须是唯一的,不能有重名',
            'thumbnail.dimensions' => '图片的最小尺寸是260*100px'
        ];
    }
}
