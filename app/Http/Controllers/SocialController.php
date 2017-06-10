<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * SocialController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * 소셜로그인 기능 로그인을 대형 웹 포털사이트에 연동시킨다.
     *
     * @param \Illuminate\Http\Request $request
     * @param string                   $provider
     * @return \App\Http\Controllers\Response
     */
    public function execute(Request $request, $provider)
    {
        if (! $request->has('code')) {
            return $this->redirectToProvider($provider); //사용자가 소셜로그인의 code번호가 없다면
        }

        return $this->handleProviderCallback($provider); //사용자가 소셜로그인 사용자라면
    }

    /**
     * Redirect the user to the Social Login Provider's authentication page.
     *
     * @param string $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function redirectToProvider($provider)
    {
        return \Socialite::driver($provider)->redirect();
    }

    /**
     * 소셜 로그인 provider로 인해 사용자 인증을 받음.
     *
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function handleProviderCallback($provider)
    {
        $user = \Socialite::driver($provider)->user();

        $user = (\App\User::whereEmail($user->getEmail())->first())
            ?: \App\User::create([
                'name'  => $user->getName() ?: 'unknown',
                'email' => $user->getEmail(),
                'activated' => 1,
            ]);

        auth()->login($user);
        flash(
            trans('auth.sessions.info_welcome', ['name' => auth()->user()->name])
        );

        return redirect(route('main'));
    }
}
