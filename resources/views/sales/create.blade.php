<x-app-layout>
    <div class="max-w-2xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-4">購入画面</h1>

        <p>商品名：{{ $product->product_name }}</p>
        <p>説明：{{ $product->description }}</p>

        <div class="my-4">
            <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->product_name }}" class="max-w-xs">
        </div>

        @if ($product->stock > 0)
            <form method="POST" action="{{ route('sales.store', $product->id) }}">
                @csrf
                <div class="mb-4">
                    <x-input-label for="quantity" :value="__('数量')" />
                    <x-text-input id="quantity" class="block mt-1 w-32" type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" required />
                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                </div>

                <p>金額：￥{{ number_format($product->price) }}</p>
                <p>残り：{{ $product->stock }}</p>
                <p>会社：{{ $product->company->company_name }}</p>

                <div class="flex gap-4 mt-6">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">購入する</button>
                    <a href="{{ route('products.show', $product->id) }}" class="bg-gray-300 px-4 py-2 rounded">戻る</a>
                </div>
            </form>
        @else
            <p class="text-red-600 font-bold">売り切れです</p>
            <a href="{{ route('products.show', $product->id) }}" class="bg-gray-300 px-4 py-2 rounded inline-block mt-4">戻る</a>
        @endif
    </div>
</x-app-layout>