<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamPostRequest extends FormRequest
{
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
            //
            
            'sp_ten' => 'required|min:3|max:50|unique:cusc_sanpham',//tên table cusc_loai
            'sp_giaGoc' => 'required',
            'sp_giaBan' => 'required',
            // 'sp_thongTin' => 'required',
            'sp_hinh' => 'required',

        ];
    }

    public function messages(){
        return[
            'sp_ten.required' => 'Tên loại bắt buộc nhập ',
            'sp_ten.min' => 'Tên loại ít nhất phải 3 ký tự trở lên',
            'sp_ten.max' => 'Tên loại tối đa chỉ 50 ký tự',
            'sp_ten.unique' => 'Tên loại này đã tồn tại. Vui lòng nhập tên khác',

            'sp_giaGoc.required' => 'Giá gốc bắt buộc nhập ',
            'sp_giaBan.required' => 'Giá bán bắt buộc nhập ',
            // 'sp_thongTin.required' => 'Thông tin bắt buộc nhập ',
            'sp_hinh.required' => 'Hình bắt buộc chọn ',
        ];
    }
}
