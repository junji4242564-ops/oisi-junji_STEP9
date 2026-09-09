<x-app-layout>
    <div class="max-w-2xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-4">お問い合わせフォーム</h1>

        <form method="POST" action="{{ route('contact.store') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="name" :value="__('名前')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="email" :value="__('メールアドレス')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="body" :value="__('お問い合わせ内容')" />
                <textarea id="body" name="body" rows="6" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('body') }}</textarea>
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">送信</button>
                <a href="{{ route('products.index') }}" class="bg-gray-300 px-4 py-2 rounded">戻る</a>
            </div>
        </form>
    </div>
</x-app-layout>