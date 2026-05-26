<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Pesanan</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                @php
                    $stats = [
                        ['label' => 'Pesanan Baru', 'value' => '22', 'color' => 'blue'],
                        ['label' => 'Sedang Diproses', 'value' => '2', 'color' => 'orange'],
                        ['label' => 'Siap Diambil', 'value' => '0', 'color' => 'green'],
                        ['label' => 'Pendapatan Hari Ini', 'value' => 'Rp 570.070', 'color' => 'purple'],
                    ];
                @endphp
                @foreach($stats as $stat)
                <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex justify-between items-center">
                    <div>
                        <p class="text-sm text-gray-500">{{ $stat['label'] }}</p>
                        <h3 class="text-2xl font-bold mt-1">{{ $stat['value'] }}</h3>
                    </div>
                    <div class="text-{{$stat['color']}}-500 opacity-70">
                        <i class="fa-solid fa-tag"></i>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm mb-6 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <div class="relative">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-gray-400"></i>
                        <input type="text" placeholder="Cari ID, nama, atau HP..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm w-64">
                    </div>
                    <button class="flex items-center gap-2 px-4 py-2 border border-gray-200 rounded-lg text-sm hover:bg-gray-50">
                        <i class="fa-solid fa-filter"></i> Filter
                    </button>
                </div>
                <div class="flex items-center gap-2">
                    <button class="px-4 py-2 border border-gray-200 rounded-lg text-sm hover:bg-gray-50">
                        <i class="fa-solid fa-file-export mr-2"></i> Export CSV
                    </button>
                <div x-data="{
                    open: false,
                    layanan: 'Cuci Kiloan',
                    harga: 25000,
                    status: 'Baru',
                    pembayaran: 'Tunai',
                    layananOptions: [
                        { label: 'Cuci Kiloan', value: 'Cuci Kiloan', price: 25000 },
                        { label: 'Cuci Express', value: 'Cuci Express', price: 40000 },
                        { label: 'Setrika', value: 'Setrika', price: 15000 },
                        { label: 'Cuci + Setrika', value: 'Cuci + Setrika', price: 50000 }
                    ],
                    statusOptions: ['Baru', 'Sedang Diproses', 'Siap Diambil', 'Selesai'],
                    pembayaranOptions: ['Tunai', 'Debit', 'Transfer', 'QRIS'],
                    updateTotal() {
                        const selected = this.layananOptions.find(item => item.value === this.layanan);
                        this.harga = selected ? selected.price : 0;
                    }
                }">
                <button @click="open = true" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">
                    + Pesanan Baru
                </button>

                <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" style="display: none;">
                    <div @click.away="open = false" class="bg-white p-6 rounded-xl shadow-lg w-full max-w-lg">
                        <h2 class="text-xl font-bold mb-4">Tambah Pesanan Baru</h2>

                        <form action="{{ route('pesanan.store') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Pelanggan</label>
                                <input type="text" name="pelanggan" class="w-full border-gray-300 rounded-lg mt-1" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nomor HP</label>
                                <input type="text" name="nomor_hp" class="w-full border-gray-300 rounded-lg mt-1" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Layanan</label>
                                <select name="layanan" x-model="layanan" @change="updateTotal()" class="w-full border-gray-300 rounded-lg mt-1" required>
                                    <template x-for="item in layananOptions" :key="item.value">
                                        <option :value="item.value" x-text="item.label"></option>
                                    </template>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" x-model="status" class="w-full border-gray-300 rounded-lg mt-1" required>
                                    <template x-for="option in statusOptions" :key="option">
                                        <option :value="option" x-text="option"></option>
                                    </template>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Pembayaran</label>
                                <select name="pembayaran" x-model="pembayaran" class="w-full border-gray-300 rounded-lg mt-1" required>
                                    <template x-for="option in pembayaranOptions" :key="option">
                                        <option :value="option" x-text="option"></option>
                                    </template>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Total Harga</label>
                                <input type="number" name="total" x-model="harga" class="w-full border-gray-300 rounded-lg mt-1 bg-gray-50" readonly>
                            </div>
                        </div>
                        <div class="flex justify-end gap-2 mt-6">
                            <button type="button" @click="open = false" class="px-4 py-2 border rounded-lg hover:bg-gray-100">Batal</button>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                <table class="w-full text-sm text-left">
                    <thead class="text-gray-500 uppercase border-b">
                        <tr>
                            <th class="px-6 py-4">ID PESANAN</th>
                            <th class="px-6 py-4">PELANGGAN</th>
                            <th class="px-6 py-4">LAYANAN</th>
                            <th class="px-6 py-4">STATUS</th>
                            <th class="px-6 py-4">PEMBAYARAN</th>
                            <th class="px-6 py-4">TOTAL</th>
                            <th class="px-6 py-4">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($pesanans as $pesanan)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-bold text-blue-600">#{{ $pesanan->id }}</td>
                            <td class="px-6 py-4">{{ $pesanan->pelanggan }} <br> <span class="text-xs text-gray-400">{{ $pesanan->nomor_hp }}</span></td>
                            <td class="px-6 py-4">{{ $pesanan->layanan }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $s = strtolower(trim($pesanan->status ?? ''));
                                    if ($s === 'baru') {
                                        $statusClass = 'text-blue-500';
                                    } elseif (str_contains($s, 'sedang') || $s === 'sedang proses' || $s === 'sedang diproses') {
                                        $statusClass = 'text-yellow-500';
                                    } elseif ($s === 'siap ambil' || $s === 'siap diambil' || $s === 'selesai') {
                                        $statusClass = 'text-green-500';
                                    } else {
                                        $statusClass = 'text-gray-500';
                                    }
                                @endphp
                                <span class="{{ $statusClass }}">● {{ $pesanan->status }}</span>
                            </td>
                            <td class="px-6 py-4 text-green-500"><i class="fa-solid fa-check-circle"></i> {{ $pesanan->pembayaran }}</td>
                            <td class="px-6 py-4 font-semibold">Rp {{ number_format($pesanan->total, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <button title="Konfirmasi" class="bg-blue-600 text-white p-2 rounded-md text-xs hover:bg-blue-700">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                    <button title="Whatsapp" class="bg-green-600 text-white p-2 rounded-md text-xs hover:bg-green-700">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </button>
                                    <button title="Hapus" class="bg-red-600 text-white p-2 rounded-md text-xs hover:bg-red-700">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">Tidak ada pesanan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
