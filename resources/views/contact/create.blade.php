<x-app-layout>
    <div class="max-w-2xl mx-auto py-8 px-4" x-data="{ showModal: false, name: '', email: '', body: '' }">
        <h1 class="text-2xl font-bold mb-4">お問い合わせフォーム</h1>

        <form id="contact-form" method="POST" action="{{ route('contact.store') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="name" :value="__('名前')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" x-model="name" :value="old('name')" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="email" :value="__('メールアドレス')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" x-model="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="body" :value="__('お問い合わせ内容')" />
                <textarea id="body" name="body" x-model="body" rows="6" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('body') }}</textarea>
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
            </div>

            <div class="flex gap-4">
                <button type="button" @click="showModal = true" class="bg-blue-600 text-white px-4 py-2 rounded">送信</button>
                <a href="{{ route('products.index') }}" class="bg-gray-300 px-4 py-2 rounded">戻る</a>
            </div>
        </form>

        <!-- 確認モーダル -->
        <div x-show="showModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 max-w-md w-full">
                <h2 class="text-lg font-bold mb-4">この内容で送信しますか？</h2>

                <p class="mb-2"><strong>名前：</strong><span x-text="name"></span></p>
                <p class="mb-2"><strong>メールアドレス：</strong><span x-text="email"></span></p>
                <p class="mb-4"><strong>お問い合わせ内容：</strong><br><span x-text="body"></span></p>

                <div class="flex gap-4 justify-end">
                    <button type="button" @click="showModal = false" class="bg-gray-300 px-4 py-2 rounded">
                        キャンセル
                    </button>
                    <button type="button" @click="document.getElementById('contact-form').submit()" class="bg-blue-600 text-white px-4 py-2 rounded">
                        送信する
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>