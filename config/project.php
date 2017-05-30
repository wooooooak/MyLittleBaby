<?php

return [
    /*
    |--------------------------------------------------------------------------
    | 캐싱 설정
    |--------------------------------------------------------------------------
    |
    */
//    'cache' => true,
    'cache' => false,

//    // 다음처럼 해도 좋다.
//    ! env('APP_DEBUG', false),
//    app()->environment('production'),

    'etag' => true,

    /*
    |--------------------------------------------------------------------------
    | 프로젝트 기본 정보
    |--------------------------------------------------------------------------
    */
    'url' => env('APP_URL', 'http://localhost:8000'),

    'api_domain' => env('API_DOMAIN', 'api.myapp.dev'),

    'app_domain' => env('APP_DOMAIN', 'myapp.dev'),

    'description' => '',

    /*
    |--------------------------------------------------------------------------
    | Tag 목록
    |--------------------------------------------------------------------------
    */
    'tags' => [
        'ko' => [
            'general' => '아무말 대잔치',
            'boy'=>'남자아이',
            'girl'=>'여자아이',
            'education'=>'교육',
            'pragnancy'=>'임신',
            'kindergarten'=>'유치원',
          ],

        'en' => [
            'general' => 'General',
            'boy'=>'BOY',
            'girl'=>'Girl',
            'education'=>'Education',
            'pragnancy'=>'Pragnancy',
            'kindergarten'=>'Kindergarten',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | 업로드할 수 있는 파일 확장자
    |--------------------------------------------------------------------------
    */
    'mimes' => [
        'jpeg',
        'png',
        'jpg',
        'zip',
        'tar',
    ],

    /*
    |--------------------------------------------------------------------------
    | 정렬 필드
    |--------------------------------------------------------------------------
    */
    'sorting' => [
        'view_count' => '조회수',
        'created_at' => '작성일',
    ],

    /*
    |--------------------------------------------------------------------------
    | 지원하는 언어 목록
    |--------------------------------------------------------------------------
    */
    'locales' => [
        'ko' => '한국어',
        'en' => 'English',
    ],
];