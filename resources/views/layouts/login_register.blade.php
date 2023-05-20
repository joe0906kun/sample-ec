<!DOCTYPE html>
@extends('layouts.head')

@section('title')
ユーザー
@endsection

@section('content')
<div class="flex flex-wrap justify-center">
    <div class="w-1/2 p-4 flex flex-wrap justify-evenly">
        <x-element.button-a :href="route('login')">ログイン</x-element.button-a>
        <x-element.button-a :href="route('register')" theme="secondary">会員登録</x-element.button-a>
    </div>
</div>
@endsection
