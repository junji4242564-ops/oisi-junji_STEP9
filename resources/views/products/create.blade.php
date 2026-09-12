cat > resources/views/products/create.blade.php << 'EOF'
<x-app-layout>
    <div class="max-w-2xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-4">商品登録</h1>

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <x-input-label for="product_name" :value="__('商品名')" />
                <x-text-input id="product_name" class="block mt-1 w-full" type="text" name="product_name" :value="old('product_name')" required />
                <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="price" :value="__('価格')" />
                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="description" :value="__('商品説明')" />
                <textarea id="description" name="description" rows="4" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="stock" :value="__('在庫数')" />
                <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" :value="old('stock')" required />
                <x-input-error :messages="$errors->get('stock')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="img_path" :value="__('商品画像')" />
                <input id="img_path" type="file" name="img_path" class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('img_path')" class="mt-2" />
            </div>

            <div class="flex gap-4">
                <a href="{{ route('mypage') }}" class="bg-gray-300 px-4 py-2 rounded">戻る</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">登録</button>
            </div>
        </form>
    </div>
</x-app-layout>
EOF