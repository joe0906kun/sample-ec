@extends('layouts.head')

@section('title')
{{ $product->name }}
@endsection

@section('button')
<x-element.button>
    ユーザー
</x-element.button>
@endsection

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center flex-col items-center">
        <img src="{{ asset($product->image) }}" class="h-48 mt-4" />
        <div class="text-3xl font-semibold mt-4">
            {{ $product->name }}
        </div>
        <div class="text-xl font-medium mt-2">
            ${{ number_format($product->price) }}
        </div>
        <div class="text-gray-700 mt-4 text-center">
            {{ $product->description }}
        </div>
        <form action="{{ route('line_item.create') }}" method="post" class="mt-6">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}" />
            <div class="mb-4">
                <input type="number" name="quantity" min="1" value="1" required class="border border-gray-300 rounded w-20 text-center" />
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-700 transition duration-200">カートに追加する</button>
            </div>
        </form>
    </div>
    <div class="mt-6">
        <a href="{{ route('product.index') }}" class="text-blue-500 hover:text-blue-700 transition duration-200">TOPへ戻る</a>
    </div>
</div>
@endsection
