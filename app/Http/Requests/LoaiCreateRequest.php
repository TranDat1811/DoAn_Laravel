<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //true : tạm thời không phân quyền
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'l_ten' => 'required|min:3|max:50|unique:cusc_loai',//tên table cusc_loai
        ];
    }

    public function messages(){
        return[
            'l_ten.required' => 'Tên loại bắt buộc nhập ',
            'l_ten.min' => 'Tên loại ít nhất phải 3 ký tự trở lên',
            'l_ten.max' => 'Tên loại tối đa chỉ 50 ký tự',
            'l_ten.unique' => 'Tên loại này đã tồn tại. Vui lòng nhập tên khác',

        ];
    }
}
