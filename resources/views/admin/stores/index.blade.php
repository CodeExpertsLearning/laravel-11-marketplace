<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lojas') }}
        </h2>
    </x-slot>

    <div class="py-12 pt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex justify-end mb-8 pr-4">
                <a href="{{ route('admin.stores.create') }}"
                    class="px-4 py-2 border border-green-900 bg-green-600 text-white
                    hover:bg-green-900 transition duration-300 ease-in-out rounded">Criar
                    Loja</a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="font-bold text-left px-4 py-2">#</th>
                                <th class="font-bold text-left px-4 py-2">Loja</th>
                                <th class="font-bold text-left px-4 py-2">Criado Em</th>
                                <th class="font-bold text-left px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stores as $store)
                                <tr>
                                    <td class="font-normal px-4 py-2">{{ $store->id }}</td>
                                    <td class="font-normal px-4 py-2 w-[60%]">{{ $store->name }}</td>
                                    <td class="font-normal px-4 py-2">{{ $store->created_at->diffForHumans() }}</td>
                                    <td class="font-normal px-4 py-2 w-[15%]">
                                        <div class="flex flex-around gap-2">
                                            <a href="{{ route('admin.stores.edit', ['store' => $store->id]) }}"
                                                class="px-2 py-1 border border-blue-900 bg-blue-600 text-white
                                                hover:bg-blue-900 transition duration-300 ease-in-out rounded">Editar</a>
                                            <form action="{{ route('admin.stores.destroy', ['store' => $store->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="px-2 py-1 border border-red-900 bg-red-600 text-white
                                                        hover:bg-red-900 transition duration-300 ease-in-out rounded">Apagar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <h3>Nenhum Item Cadastrado...</h3>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-10">
                        {{ $stores->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
