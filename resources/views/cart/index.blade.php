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
                    ￥{{ number_format($item->price * $item->pivot->quantity) }}
                </div>
                <form method="post" action="{{ route('line_item.delete') }}">
                    @csrf
                    <div class="">
                        <input type="hidden" name="id" value="{{ $item->pivot->id }}" />
                        <button type="submit" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>

                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-xl font-semibold mb-4">
        小計 : ￥{{ number_format($total_price) }}
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
