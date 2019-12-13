<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateTask extends FormRequest
{
    // protected $errorBag='update';
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
            'project_id' => [
                'required',
                'integer',
                Rule::exists('projects', 'id')->whereIn('id',$this->user()->projects()->pluck('id')->toArray())
            ]
        ];
    }
    public function messages(){
        return [
            'name.required' => '任务名称是必须的',
            'name.max' => '任务名称的长度超出了最大字符限制:255',
            'project_id.required' => '没有提交当前任务所属项目的id',
            'project_id.integer' => '所提交的项目id无效(非整数)',
            'project_id.exists' => '所提交的项目Id无效(不存在)',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $this->errorBag = 'update-' . $this->route('task');
        parent::failedValidation($validator);
    }
}
