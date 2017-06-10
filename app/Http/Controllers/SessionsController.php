<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    /**
     * SessionsController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    /**
     *  사용자가 로그인 버튼을 눌렀을때 처리 함수
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     *   사용자가 로그인할때 확인하고 로그인 시키는 메서드
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',  //필수 입력사항 명시
            'password' => 'required|min:6', //패스워드는 최소 6자리수 이상
        ]);

        if(!auth()->attempt($request->only('email', 'password'), $request->has('remember'))){
          flash(
              "trans('auth.sessions.error_incorrect_credentials')"  //flash가 왜안되지
          );
          return back()->withInput();
        };

        if (! auth()->user()->activated) {  // 회원가입이 아직 활성화 되지 않았을경우... 이메일 인증하려고 했으나 실패
            auth()->logout();

            return back()->withInput();
        }

        return redirect()->intended(route('main'));
    }

    /**
     * 로그아웃 처리 메서드
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy()
    {
        auth()->logout();
        flash(
            trans('auth.sessions.info_bye')
        );

        return redirect(route('root'));
    }

    /* Response Methods */

    /**
     *  로그인 성공적일때
     *
     * @param string|boolean $token
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function respondCreated()
    {
        flash(
            trans('auth.sessions.info_welcome', ['name' => auth()->user()->name])
        );
        return redirect()->intended(route('main'));
    }

    /**
     * @return $this
     */
    protected function respondSocialUser()
    {
        flash()->error(
            trans('auth.sessions.error_social_user')
        );

        return back()->withInput();
    }


    /**
     * @return string
     */
    public function username()
    {
        return 'email';
    }

}
