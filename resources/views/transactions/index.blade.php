<x-app-layout>
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
    <h1 class="text-2xl font-bold mb-6">Daftar Transaction</h1>

    <!-- Tombol untuk menambahkan transaction baru -->
    <a href="{{ route('transactions.create') }}" 
       class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
        Tambah Transaction Baru
    </a>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-800 p-4 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    <!-- Menampilkan tabel daftar transaction -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-left text-gray-600 font-semibold">
                <tr>
                    <th class="px-6 py-3">Customer Name</th>
                    <th class="px-6 py-3">Quantity</th>
                    <th class="px-6 py-3">Total Price</th>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($transactions as $transaction)
                <tr>
                    <td class="px-6 py-4">{{ $transaction->customer->name}}</td>
                    <td class="px-6 py-4">{{ $transaction->quantity }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">{{ $transaction->transaction_date }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('transactions.edit', $transaction->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaction ini?')">
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
        {{ $transactions->links() }}
    </div>
</div>
</x-app-layout>
