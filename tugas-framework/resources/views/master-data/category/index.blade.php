<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">Data Kategori</h2>
            <a href="{{ route('categories.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm">
                + Tambah Kategori
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card>

                <form method="GET" action="{{ route('categories.index') }}" class="flex gap-3 mb-4">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama kategori..."
                        class="flex-1 rounded-md border-gray-300 shadow-sm">

                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">Cari</button>
                    <a href="{{ route('categories.index') }}" class="px-4 py-2 text-gray-500">Reset</a>
                </form>

                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 w-16">No</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Nama Kategori</th>
                            <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 w-56">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($categories as $category)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-500">
                                    {{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}
                                </td>
                                <td class="px-4 py-2 text-sm font-medium text-gray-900">
                                    {{ $category->name }}
                                    @if ($category->description)
                                        <p class="text-xs font-normal text-gray-500">{{ $category->description }}</p>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-sm text-center space-x-2">
                                    <a href="{{ route('categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-900">Ubah</a>
                                    <a href="{{ route('categories.show', $category) }}" class="text-gray-600 hover:text-gray-900">Detail</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori {{ $category->name }}?')"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                                    Belum ada data kategori.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $categories->links() }}
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>