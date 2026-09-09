<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-4">商品一覧</h1>

        <form method="GET" action="{{ route('products.index') }}" class="flex gap-2 mb-6">
            <input type="text" name="product_name" value="{{ request('product_name') }}" placeholder="商品名を入力" class="border-gray-300 rounded-md shadow-sm">
            <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="最低価格" class="border-gray-300 rounded-md shadow-sm w-28">
            <span class="self-center">〜</span>
            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="最高価格" class="border-gray-300 rounded-md shadow-sm w-28">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">検索</button>
        </form>

        <table class="w-full border-collapse">
            <thead>
                <tr class="border-b">
                    <th class="text-left py-2">商品番号</th>
                    <th class="text-left py-2">商品名</th>
                    <th class="text-left py-2">商品説明</th>
                    <th class="text-left py-2">画像</th>
                    <th class="text-left py-2">料金(￥)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border-b">
                        <td class="py-2">{{ $product->id }}</td>
                        <td class="py-2">{{ $product->product_name }}</td>
                        <td class="py-2">{{ $product->description }}</td>
                        <td class="py-2">
                            <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->product_name }}" class="w-12 h-12 object-cover">
                        </td>
                        <td class="py-2">{{ number_format($product->price) }}</td>
                        <td class="py-2">
                            <a href="#" class="bg-green-600 text-white px-3 py-1 rounded text-sm">詳細</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>