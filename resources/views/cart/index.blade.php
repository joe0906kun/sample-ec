@extends('layouts.head')

@section('title')
カート
@endsection

@section('button')
<x-element.button>
    ユーザー
</x-element.button>
@endsection

@section('content')
<div class="container mx-auto px-4">
    <div class="text-2xl font-bold mb-4">
        Shopping Cart
    </div>
    @if(count($line_items) > 0)
    <div class="space-y-4">
        @foreach ($line_items as $item)
        <div class="grid grid-cols-12 items-center p-3 mb-3 border border-gray-300 rounded transition duration-200 ease-in transform hover:scale-101">
            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="h-20 bg-cover col-span-12 md:col-span-3" />
            <div class="grid grid-cols-12 col-span-12 md:col-span-9">
                <div class="col-span-6 p-3">
                    {{ $item->name }}
                </div>
                <div class="col-span-2 p-3">
                    {{ $item->pivot->quantity }}個
                </div>
                <div class="col-span-3 p-3 text-center">
                    ${{ number_format($item->price * $item->pivot->quantity) }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-xl font-semibold mb-4">
        小計 : ${{ number_format($total_price) }}
    </div>
    @guest
    <button onclick="location.href='{{ route('login_register') }}'" class="px-4 py-1 bg-blue-500 text-white hover:bg-blue-700 transition duration-200 ease-in-out rounded">
        ログインまたは会員登録
    </button>
    @else
    <button onclick="location.href='{{ route('cart.checkout') }}'" class="px-4 py-1 bg-blue-500 text-white hover:bg-blue-700 transition duration-200 ease-in-out rounded">
        購入
    </button>
    @endguest
    @else
    <div class="text-lg font-semibold text-gray-600">
        カートに商品が入っていません
    </div>
    @endif
</div>
@endsection
