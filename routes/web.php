<?php

Route::get('/', [
    'as' => 'root',
    'uses' => 'WelcomeController@index',
]);
Route::get('/main', [
    'as' => 'main',
    'uses' => 'ArticlesController@index',
]);
// Route::get('mail', function () {
//     $article = App\Article::with('user')->find(1);
//     var_dump($article->title);
//     return Mail::send(  //             왜 안될까..........................
//         'emails.ko.articles.created',
//         compact('article'),
//         function ($message) use ($article){
//             $message->from('you@domain', 'Your Name');
//             $message->to(['you2@domain', 'yours@domain']);
//             $message->subject('새 글이 등록되었습니다 -' . $article->title);
//         }
//     );
// });
/* 언어 선택 */
Route::get('locale', [
    'as' => 'locale',
    'uses' => 'WelcomeController@locale',
]);

/* article */
Route::resource('articles', 'ArticlesController');
Route::get('tags/{slug}/articles', [
    'as' => 'tags.articles.index',
    'uses' => 'ArticlesController@index',
]);

/* 첨부 파일 */
Route::resource('attachments', 'AttachmentsController', ['only' => ['store', 'destroy']]);
Route::get('attachments/{file}', 'AttachmentsController@show');

/* 코멘트(댓글) */
Route::resource('comments', 'CommentsController', ['only' => ['update', 'destroy']]);
Route::resource('articles.comments', 'CommentsController', ['only' => 'store']);

/* 투표 */
Route::post('comments/{comment}/votes', [
    'as' => 'comments.vote',
    'uses' => 'CommentsController@vote',
]);


/* 사용자 등록 */
Route::get('auth/register', [  //회원가입 화면
    'as' => 'users.create',
    'uses' => 'UsersController@create',
]);
Route::post('auth/register', [
    'as' => 'users.store',
    'uses' => 'UsersController@store',
]);
Route::get('auth/confirm/{code}', [
    'as' => 'users.confirm',
    'uses' => 'UsersController@confirm',
])->where('code', '[\pL-\pN]{60}');

/* 사용자 인증 */
Route::get('auth/login', [   //로그인화면
    'as' => 'sessions.create',
    'uses' => 'SessionsController@create',
]);
Route::post('auth/login', [
    'as' => 'sessions.store',
    'uses' => 'SessionsController@store',
]);
Route::get('auth/logout', [
    'as' => 'sessions.destroy',
    'uses' => 'SessionsController@destroy',
]);

/* 소셜 로그인 */
Route::get('social/{provider}', [
    'as' => 'social.login',
    'uses' => 'SocialController@execute',
]);

/* 비밀번호 초기화 */
Route::get('auth/remind', [
    'as' => 'remind.create',
    'uses' => 'PasswordsController@getRemind',
]);
Route::post('auth/remind', [
    'as' => 'remind.store',
    'uses' => 'PasswordsController@postRemind',
]);
