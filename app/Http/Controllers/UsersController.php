<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * 회원가입 버튼을 눌렀을때 처리
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * 회원가입을 했을때 이메일을 확인하고 이미 소셜로그인으로 가입된 이메일이라면
     * 소셜 계정을 업데이트한다.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($socialUser = User::socialUser($request->get('email'))->first()) {
            return $this->updateSocialAccount($request, $socialUser);
        }

        return $this->createNativeAccount($request);
    }

    /**
     * 유저가 예전에 소셜로그인으로 로그인 한 경험이 있을경우.
     * 다시 로컬 계정으로 로그인하려고할떄 처리.
     * 비밀번호를 추가시킨다(소셜아이디는 비밀번호가 없음.)
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function updateSocialAccount(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        $user->update([
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
        ]);

        return $this->respondUpdated($user);
    }

    /**
     * 사용자가 mlb 로컬 계정으로 처음 가입했을때 실행.
     * 입력폼을 검사 ,validate()함수로 검사한다.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected function createNativeAccount(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $confirmCode = str_random(60);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'confirm_code' => $confirmCode,
        ]);
        $user->activated = 1;
        $user->confirm_code = null;
        $user->last_login= \Carbon\Carbon::now();
        $user->save();
        auth()->login($user);

        flash(
            trans('auth.users.info_confirmed', ['name' => $user->name])
        );
        return redirect(route('main'));
    }

    /**
     * @param \App\User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function responsConfirmed(User $user)
    {
        auth()->login($user);
        flash(
            trans('auth.users.info_confirmed', ['name' => $user->name])
        );

        return redirect(route('main'));
    }

    /* Response Methods */

    /**
     * @param \App\User $user
     * @param null $message
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function respondSuccess(User $user, $message = null)
    {
        auth()->login($user);
        flash($message);

        return ($return = request('return'))
            ? redirect(urldecode($return))
            : redirect()->intended();
    }

    /**
     * 에러 응답
     *
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function respondError($message)
    {
        flash()->error($message);

        return redirect(route('root'));
    }

    /**
     * @param \App\User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function respondUpdated(User $user)
    {
        return $this->respondSuccess(
            $user,
            trans('auth.users.info_welcome', ['name' => $user->name])
        );
    }

}
