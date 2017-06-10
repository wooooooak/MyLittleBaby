<?php

namespace App\Http\Requests;

use App\Attachment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
{
    /**
     * The input keys that should not be flashed on redirect.
     *
     * @var array
     */
    protected $dontFlash = [
        'files',
    ];

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 게시물 작성에 대한 요구사항.
     *
     * @return array
     */
    public function rules()
    {
        $mimes = implode(',', config('project.mimes'));

        return [
            'title' => ['required'],
            'tags' => ['required', 'array'],
            'content' => ['required', 'min:10'],
            'files' => ['array'],
            'files.*' => ["mimes:{$mimes}", 'max:30000'],
            'attachments' => ['array'],
            'attachments.*' => ['integer', 'exists:attachments,id'],
        ];
    }

    /**
     * 'notification' 입력 값을 머지한 사용자 입력값을 조회
     *
     * @return array
     */
    public function getPayload()
    {
        return array_merge($this->all(), [
            'notification' => $this->has('notification'),
        ]);
    }

}
