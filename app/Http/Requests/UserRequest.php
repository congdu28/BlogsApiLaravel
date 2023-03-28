<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
         // nơi viết validate
         $rules =[];
         // lấy ra tên phương thức đang hoạt động
         $currentAction = $this->route()->getActionMethod();
         switch($this->method()):
           case 'POST':
             switch ($currentAction){
                case 'add':
                    $rules = [
                        "email"=>'required|unique:users|regex:/(.+)@(.+)\.(.+)/i', // kiểm tra email đã tồn tại chưa
                        // 'email' => 'required|regex:/(.+)@(.+)\.(.+)/i', kiê
                        "name"=>'required',
                        "password"=>'required',
                       
                    ];
                     break;

                default:
                       break;
             }
             break;
         endswitch;

        return $rules;
    }
    public function messages()
    {
        return [
            'email.required'=>'Hãy nhập Email!',
            'email.unique'=>'Email này đã được sử dụng!',
            'name.required'=>'Hãy nhập Tên!',
            'email.regex'=>'Hãy nhập đúng định dạng @example.com',
            'password.required'=>'Hãy nhập Mật khẩu!',
            ];
    }
}
