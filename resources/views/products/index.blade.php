<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4"
         x-data='{
             products: {!! $products->toJson() !!},
             productName: "",
             minPrice: "",
             maxPrice: "",
             search() {
                 const params = new URLSearchParams();
                 if (this.productName) params.append("product_name", this.productName);
                 if (this.minPrice) params.append("min_price", this.minPrice);
                 if (this.maxPrice) params.append("max_price", this.maxPrice);

                 fetch("{{ route('products.search') }}?" + params.toString())
                     .then(res => res.json())
                     .then(data => { this.products = data; });
             }
         }'>
        
        <h1 class="text-2xl font-bold mb-4">商品一覧</h1>

        <div class="flex gap-2 mb-6">
            <input type="text" x-model="productName" @input="search()" placeholder="商品名を入力" class="border-gray-300 rounded-md shadow-sm">
            <input type="number" x-model="minPrice" @input="search()" placeholder="最低価格" class="border-gray-300 rounded-md shadow-sm w-28">
            <span class="self-center">〜</span>
            <input type="number" x-model="maxPrice" @input="search()" placeholder="最高価格" class="border-gray-300 rounded-md shadow-sm w-28">
            <button type="button" @click="search()" class="bg-blue-600 text-white px-4 py-2 rounded">検索</button>
        </div>

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
                <template x-for="product in products" :key="product.id">
                    <tr class="border-b">
                        <td class="py-2" x-text="product.id"></td>
                        <td class="py-2" x-text="product.product_name"></td>
                        <td class="py-2" x-text="product.description"></td>
                        <td class="py-2">
                            <img :src="'/storage/' + product.img_path" class="w-12 h-12 object-cover">
                        </td>
                        <td class="py-2" x-text="product.price.toLocaleString()"></td>
                        <td class="py-2">
                            <a :href="'/products/' + product.id" class="bg-green-600 text-white px-3 py-1 rounded text-sm">詳細</a>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</x-app-layout>