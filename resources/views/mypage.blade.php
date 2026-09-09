<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-4">マイページ</h1>

        <a href="{{ route('profile.edit') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded mb-4">
            アカウント編集
        </a>

        <div class="grid grid-cols-2 gap-4 mb-8">
            <div>
                <p>ユーザ名：{{ $user->name }}</p>
                <p>Eメール：{{ $user->email }}</p>
            </div>
            <div>
                <p>名前：{{ $user->name_kanji }}</p>
                <p>カナ：{{ $user->name_kana }}</p>
            </div>
        </div>

        <div class="mb-8">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-xl font-semibold">＜出品商品＞</h2>
                <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
                    新規登録
                </a>
            </div>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-2">商品番号</th>
                        <th class="text-left py-2">商品名</th>
                        <th class="text-left py-2">商品説明</th>
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
                            <td class="py-2">{{ number_format($product->price) }}</td>
                            <td class="py-2">
                                <a href="{{ route('products.mine.show', $product->id) }}" class="bg-green-600 text-white px-3 py-1 rounded text-sm">
                                    詳細
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <h2 class="text-xl font-semibold mb-2">＜購入した商品＞</h2>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-2">商品名</th>
                        <th class="text-left py-2">商品説明</th>
                        <th class="text-left py-2">料金(￥)</th>
                        <th class="text-left py-2">個数</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr class="border-b">
                            <td class="py-2">{{ $sale->product->product_name }}</td>
                            <td class="py-2">{{ $sale->product->description }}</td>
                            <td class="py-2">{{ number_format($sale->product->price) }}</td>
                            <td class="py-2">{{ $sale->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>