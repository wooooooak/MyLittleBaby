<?php

namespace App\Http\Controllers;
use App\Article;

class WelcomeController extends Controller
{
    /**
     * welcome 뷰 띄우기
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index() {

        $articles = \App\Article::with('comments')->orderBy('view_count','desc')->take(3)->get(); //가장 조회수가 많은 게시글 3개
        //var_dump($articles);
        return view('welcome',compact('articles'));
    }

    /**
     *  지역언어설정
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function locale()
    {
        $cookie = cookie()->forever('locale__myapp', request('locale'));

        cookie()->queue($cookie);

        return ($return = request('return'))
            ? redirect(urldecode($return))->withCookie($cookie)
            : redirect('/')->withCookie($cookie);
    }
}
