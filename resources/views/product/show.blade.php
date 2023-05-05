@extends('layouts.app')

@section('title')
{{ $product->name }}
@endsection

@section('content')
<div class="">
    <div class="flex justify-center flex-col items-center">
        <img src="{{ asset($product->image) }}" class="h-72 mt-4" />
        <div class="">
            <div class="">
                {{ $product->name }}
            </div>
            <div class="">
                ${{ number_format($product->price) }}
            </div>
        </div>
        {{ $product->description }}
        <form action="{{ route('line_item.create') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}" />
            <div class="">
                <input type="number" name="quantity" min="1" value="1" required />
            </div>
            <div class="">
                <button type="submit" class="">カートに追加する</button>
            </div>
        </form>
    </div>
    <a href="{{ route('product.index') }}">TOPへ戻る</a>
</div>
@endsection
