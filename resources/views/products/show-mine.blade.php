<x-app-layout>
    <div class="max-w-2xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-4">出品商品詳細</h1>

        <p>商品名：{{ $product->product_name }}</p>
        <p>説明：{{ $product->description }}</p>

        <div class="my-4">
            <img src="{{ Storage::url($product->img_path) }}" alt="{{ $product->product_name }}" class="max-w-xs">
        </div>

        <p>金額：￥{{ number_format($product->price) }}</p>

        <div class="flex gap-4 mt-6">
            <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded">編集</a>

            <form method="POST" action="{{ route('products.destroy', $product->id) }}" onsubmit="return confirm('本当に削除しますか?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">削除する</button>
            </form>

            <a href="{{ route('mypage') }}" class="bg-gray-300 px-4 py-2 rounded">戻る</a>
        </div>
    </div>
</x-app-layout>