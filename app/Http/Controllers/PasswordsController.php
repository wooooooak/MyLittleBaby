<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * 비밀번호 찾기 누르면 뜨는 화면으로 이동
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRemind()
    {
        return view('passwords.remind');
    }

}
