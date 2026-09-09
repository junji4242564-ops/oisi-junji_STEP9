<x-app-layout>
    <div class="max-w-2xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-4">商品詳細</h1>

        <p>商品名：{{ $product->product_name }}</p>
        <p>説明：{{ $product->description }}</p>

        <div class="my-4">
            <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->product_name }}" class="max-w-xs">
        </div>

        <p>金額：￥{{ number_format($product->price) }}</p>
        <p>会社：{{ $product->company->company_name }}</p>

        <form method="POST" action="{{ route('likes.toggle', $product->id) }}" class="my-2">
            @csrf
            <button type="submit" class="text-3xl">
                @if ($isLiked)
                    ❤️
                @else
                    🤍
                @endif
            </button>
        </form>

        <div class="flex gap-4 mt-6">
            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded">カートに追加する</a>
            <a href="{{ route('products.index') }}" class="bg-gray-300 px-4 py-2 rounded">戻る</a>
        </div>
    </div>
</x-app-layout>