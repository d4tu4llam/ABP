<x-app-layout>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
    <h1 class="text-2xl font-bold mb-6">Daftar customer</h1>

    <!-- Tombol untuk menambahkan customer baru -->
    <a href="{{ route('customers.create') }}" 
       class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
        Tambah customer Baru
    </a>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-800 p-4 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    <!-- Menampilkan tabel daftar customer -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-left text-gray-600 font-semibold">
                <tr>
                    <th class="px-6 py-3">Nama customer</th>
                    <th class="px-6 py-3">Nomor Handphone</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Alamat</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($customers as $customer)
                <tr>
                    <td class="px-6 py-4">{{ $customer->name }}</td>
                    <td class="px-6 py-4">{{ $customer->phone }}</td>
                    <td class="px-6 py-4">{{$customer->email }}</td>
                    <td class="px-6 py-4">{{ $customer->address }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('customers.edit', $customer->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus customer ini?')">
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
        {{ $customers->links() }}
    </div>
</div>

</x-app-layout>

