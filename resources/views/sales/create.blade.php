cat > resources/views/sales/create.blade.php << 'EOF'
<x-app-layout>
    <div class="max-w-2xl mx-auto py-8 px-4" x-data="{ showModal: false, quantity: 1 }">
        <h1 class="text-2xl font-bold mb-4">購入画面</h1>

        <p>商品名：{{ $product->product_name }}</p>
        <p>説明：{{ $product->description }}</p>

        <div class="my-4">
            <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->product_name }}" class="max-w-xs">
        </div>

        @if ($product->stock > 0)
            <form id="purchase-form" method="POST" action="{{ route('sales.store', $product->id) }}">
                @csrf
                <div class="mb-4">
                    <x-input-label for="quantity" :value="__('数量')" />
                    <x-text-input id="quantity" class="block mt-1 w-32" type="number" name="quantity" x-model.number="quantity" min="1" max="{{ $product->stock }}" required />
                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                </div>

                <p>金額：￥{{ number_format($product->price) }}</p>
                <p>残り：{{ $product->stock }}</p>
                <p>会社：{{ $product->company->company_name }}</p>

                <div class="flex gap-4 mt-6">
                    <button type="button" @click="showModal = true" class="bg-blue-600 text-white px-4 py-2 rounded">購入する</button>
                    <a href="{{ route('products.show', $product->id) }}" class="bg-gray-300 px-4 py-2 rounded">戻る</a>
                </div>
            </form>

            <!-- 確認モーダル -->
            <div x-show="showModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg p-6 max-w-md w-full">
                    <h2 class="text-lg font-bold mb-4">この内容で購入しますか？</h2>

                    <p class="mb-2"><strong>商品名：</strong>{{ $product->product_name }}</p>
                    <p class="mb-2"><strong>数量：</strong><span x-text="quantity"></span></p>
                    <p class="mb-4"><strong>金額：</strong>￥{{ number_format($product->price) }} × <span x-text="quantity"></span></p>

                    <div class="flex gap-4 justify-end">
                        <button type="button" @click="showModal = false" class="bg-gray-300 px-4 py-2 rounded">
                            キャンセル
                        </button>
                        <button type="button" @click="document.getElementById('purchase-form').submit()" class="bg-blue-600 text-white px-4 py-2 rounded">
                            購入する
                        </button>
                    </div>
                </div>
            </div>
        @else
            <p class="text-red-600 font-bold">売り切れです</p>
            <a href="{{ route('products.show', $product->id) }}" class="bg-gray-300 px-4 py-2 rounded inline-block mt-4">戻る</a>
        @endif
    </div>
</x-app-layout>
EOF