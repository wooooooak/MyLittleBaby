<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 댓글 달기위한 요구사항
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => ['required', 'min:5'],  // 댓글 태러를 방지하기위해 5글자 이하 댓글 제한.
            'parent_id' => ['numeric', 'exists:comments,id'],
        ];
    }
}
