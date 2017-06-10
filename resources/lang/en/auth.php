<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',


    'form' => [
        'name' => 'Name',
        'email' => 'Email',
        'password' => 'Password',
        'password_confirmation' => 'Confirm Password',
        'password_new' => 'New Password',
    ],

    'sessions' => [
        'title' => 'Login',
        'destroy' => 'Logout',
        'description' => 'You can login with '.config('app.name'). ' account!',
        'login_with_github' => 'Login with Github account',
        'login_with_google' => 'Login with Google account',
        'login_with_facebook' => 'Login with Facebook account',
        'remember' => 'Remember login',
        'remember_help' => "(don't check in public computer)",
        'send_login' => 'Log Me In',
        'ask_registration' => 'Don\'t have account? Click <a href=":url">this </a> to get one.',
        'ask_forgot' => '<a href=":url"> Forgot password? </a>',
        'caveat_for_social' => 'Social user does not have password.',
        'error_social_user' => 'You are Social user. Login with Social Login Button.',
        'error_incorrect_credentials' => 'Email and Password combination dees not match.',
        'error_not_confirmed' => 'Confirm your registration.',
        'info_welcome' => 'Welcome :name',
        'info_bye' => 'Bye~ Please come by again.',
        'sign_btn' => 'SIGN UP/SIGN IN',
        'find_pw'=>'Forgot password?',
        'login_by_mlb'=>'Log in by MLB Id',
        'not_auth_user'=>'If you don\'t have account,Join us!',
    ],

    'users' => [
        'title' => 'Register',
        'description' => 'We recommend login with these. It does\'nt require a password.',
        'send_registration' => 'Let Me In',
        'error_wrong_url' => 'URL not correct.',
        'info_welcome' => 'Welcome :name.',
        'info_confirmed' => 'Welcome :name. Your registration confirmed.',
        'info_confirmation_sent' => 'We sent an email to ask you confirmation. Required to see you are not a ROBOT.',
    ],

    'passwords' => [
        'title_reminder' => 'Remind Password',
        'desc_reminder' => 'Provide your email address.',
        'send_reminder' => 'Send Me A Reminder',
        'title_reset' => 'Reset Password',
        'desc_reset' => 'Provide your email address.',
        'send_reset' => 'Reset',
        'sent_reminder' => 'We sent an email with a URL that is required for resetting your password.',
        'error_wrong_url' => 'URL not correct.',
        'success_reset' => 'Done. Login with your new password.'
    ],
];
