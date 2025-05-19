
<x-app-layout>
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
    <h1 class="text-2xl font-bold mb-6">Daftar Kategori</h1>

    <!-- Tombol untuk menambahkan produk baru -->
    <a href="{{ route('categories.create') }}" 
       class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
        Tambah Kategori Baru
    </a>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-800 p-4 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    <!-- Menampilkan tabel daftar produk -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-left text-gray-600 font-semibold">
                <tr>
                    <th class="px-6 py-3">Nama Kategori</th>
                    <th class="px-6 py-3">Deskripsi</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($categories as $category)
                <tr>
                    <td class="px-6 py-4">{{ $category->name }}</td>
                    <td class="px-6 py-4">{{ $category->description }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('categories.edit', $category->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Menampilkan pagination -->
    <div class="mt-6">
        {{ $categories->links() }}
    </div>
</div>
</x-app-layout>
