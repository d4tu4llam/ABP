<x-app-layout>
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-md mt-10">
    <h1 class="text-2xl font-bold mb-6">Tambah Transaction Baru</h1>

    <!-- Menampilkan error validasi jika ada -->
    @if ($errors->any())
        <div class="mb-6 bg-red-100 text-red-700 p-4 rounded-md">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk menambahkan transaction baru -->
    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf

        <div class="mb-6">
            <label for="customer_id" class="block text-sm font-medium text-gray-700"></label>
            <select id="customer_id" name="customer_id" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Pilih Customer --</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="product_id" class="block text-sm font-medium text-gray-700"></label>
            <select id="product_id" name="product_id" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Pilih Produk --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
            <input id="number" name="quantity" required
                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('quantity') }}</input>
        </div>

        <div class="mb-4">
            <label for="transaction_date" class="block text-sm font-medium text-gray-700">Date</label>
            <input type="date" id="transaction_date" name="transaction_date" value="{{ old('transaction_date') }}" step="0.01" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

  

        <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition">
            Simpan
        </button>
    </form>
</div>
</x-app-layout>
