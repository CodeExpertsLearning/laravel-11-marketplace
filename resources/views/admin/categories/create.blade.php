<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.categories.store') }}" method="POST">

                        @csrf

                        <div class="w-full mb-6">
                            <label for="name">Nome Categoria</label>
                            <input name="name" id="name" type="text" value="{{ old('name') }}"
                                class="w-full border border-gray-700 rounded bg-gray-900">

                            @error('name')
                                <div
                                    class="w-full my-4 p-4 border border-red-900 bg-red-300 text-red-900 rounded font-bold">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="w-full mb-6">
                            <label for="description">Descrição</label>
                            <input name="description" id="description" type="text" value="{{ old('description') }}"
                                class="w-full border border-gray-700 rounded bg-gray-900">

                            @error('description')
                                <div
                                    class="w-full my-4 p-4 border border-red-900 bg-red-300 text-red-900 rounded font-bold">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button
                            class="px-4 py-2 border border-green-900 rounded bg-green-700
                            hover:bg-green-900 transition duration-300 ease-in-out">Salvar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
