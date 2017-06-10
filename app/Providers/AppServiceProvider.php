<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * MLB에 항상 관여
     *
     * @return void
     */
    public function boot()
    {

        if ($locale = request()->cookie('locale__myapp')) {
            // 애플리케이션 전체에 적용할 언어를 설정한다.
            app()->setLocale(\Crypt::decrypt($locale));
        }

        // 카본 인스턴스의 언어를 설정한다.
        \Carbon\Carbon::setLocale(app()->getLocale());

        view()->composer('*', function ($view) {
            $allTags = \Cache::rememberForever('tags.list', function () {
                return \App\Tag::all();
            });

            $currentUser = auth()->user();
            $currentRouteName = \Route::currentRouteName();
            $currentLocale = app()->getLocale();
            $currentUrl = current_url();

            $view->with(compact('allTags', 'currentUser', 'currentRouteName', 'currentLocale', 'currentUrl'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
