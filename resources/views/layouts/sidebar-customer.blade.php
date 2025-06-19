<div class="bg-white w-64 h-screen shadow-md px-4 py-6">
    <h2 class="text-xl font-bold text-green-800 mb-6">Plantopia 🌱</h2>

    <nav class="space-y-3">
        <a href="{{ route('customer.catalog') }}"
           class="block text-gray-700 hover:bg-green-100 px-4 py-2 rounded transition">
            🌿 Katalog Semua Tanaman
        </a>

        <a href="{{ route('customer.categories') }}"
           class="block text-gray-700 hover:bg-green-100 px-4 py-2 rounded transition">
            🗂️ Kategori Tanaman
        </a>

        <a href="{{ route('customer.transactions.history') }}"
           class="block text-gray-700 hover:bg-green-100 px-4 py-2 rounded transition">
            📜 Riwayat Transaksi
        </a>
    </nav>
</div>
