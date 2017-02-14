@extends('blade_template')

@section('title','ログイン')
@section('css','social_login.css')
@section('main')
    <div class="sign-in-wrapper">
        <div class="google_sign_in">
            <a href="/auth/google">Sign in with Google</a>
        </div>
    </div>
@endsection

