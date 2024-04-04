<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class dangKyValid extends FormRequest
{
    public function authorize(): bool
    {
        return true; //true là rules hoạt động là ngược lại
    }
    public function rules(): array
    {
        return [
            //viết bằng chuỗi hay mảng gì cũng dc. mảng cách nhau bằng giấu , string |
            'ho' => ['required', 'min:2'],
            'ten' => ['required', 'min:2', 'max:20'],
            'email' => 'required|email|ends_with:@gmail.com',
            'mk1' => 'required|min:6|same:mk2',
            'mk2' => 'required|min:6'
        ];
    }
    public function messages() {
        return [
         'ho.required' => 'Phải nhập họ nha bạn ơi',
         'ho.min' => 'Nhập họ ít nhất 2 ký tự',
         'ten.required' => 'Bạn chưa nhập tên',
         'ten.min' => 'Tên cần dài hơn',
         'ten.max' => 'Tên quá dài',
         'email.required' => 'Chưa nhập email',
         'email.email' => 'Nhập email chưa đúng',
         'email.ends_with' => 'Email phải có đuôi là fpt.edu.vn',
         'mk1.required' => 'Bạn chưa nhập mật khẩu',
         'mk1.min' => 'Mật khẩu từ 6 ký tự trở lên',
         'mk1.same' => 'Hai mật khẩu không giống nhau',
         'mk2.required' => 'Bạn chưa nhập lại mật khẩu',
         'mk2.min' => 'Mật khẩu nhập lại cùng từ 6 ký tự trở lên'
       ];
     }

}
