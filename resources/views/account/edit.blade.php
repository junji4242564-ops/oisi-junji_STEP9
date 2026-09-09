<x-app-layout>
    <div class="max-w-2xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-4">アカウント情報編集</h1>

        <form method="POST" action="{{ route('account.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-input-label for="name" :value="__('ユーザ名')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="email" :value="__('Eメール')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="name_kanji" :value="__('名前(漢字)')" />
                <x-text-input id="name_kanji" class="block mt-1 w-full" type="text" name="name_kanji" :value="old('name_kanji', $user->name_kanji)" required />
                <x-input-error :messages="$errors->get('name_kanji')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="name_kana" :value="__('カナ')" />
                <x-text-input id="name_kana" class="block mt-1 w-full" type="text" name="name_kana" :value="old('name_kana', $user->name_kana)" />
                <x-input-error :messages="$errors->get('name_kana')" class="mt-2" />
            </div>

            <div class="flex gap-4">
                <a href="{{ route('mypage') }}" class="bg-gray-300 px-4 py-2 rounded">戻る</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">更新</button>
            </div>
        </form>
    </div>
</x-app-layout>