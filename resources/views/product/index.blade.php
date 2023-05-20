@extends('layouts.head')

@section('title')
商品一覧
@endsection

@section('button')
<x-element.button>
    ユーザー
</x-element.button>
@endsection

@section('content')

<div class="bg-cover h-[400px] flex items-center justify-center" style="background-image: url('/images/top.jpg');">
    <p class="text-center text-white">{{ config('app.name', 'Laravel') }}</p>
</div>

<div class="container mx-auto px-4">
    <div class="top__title text-center">
        All products
    </div>
    <div class="grid grid-rows-3 grid-cols-1 md:grid-rows-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($products as $product)
        <a href="{{ route('product.show', $product->id) }}">
            <div class="bg-white shadow-md rounded p-4">
                <img src="{{ asset($product->image) }}" class="w-full h-auto object-cover rounded-t mx-auto" />
                <div class="p-4">
                    <p class="font-bold text-xl mb-2">{{ $product->name }}</p>
                    <p class="text-gray-700">${{ number_format($product->price) }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
