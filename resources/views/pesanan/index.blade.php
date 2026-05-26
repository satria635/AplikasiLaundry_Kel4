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
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">
                        + Pesanan Baru
                    </button>
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
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-bold text-blue-600">#ORD-000024</td>
                            <td class="px-6 py-4">Bagas <br> <span class="text-xs text-gray-400">082266776212</span></td>
                            <td class="px-6 py-4">Cuci Kilat <br> <span class="text-xs text-gray-400">pcs</span></td>
                            <td class="px-6 py-4"><span class="text-blue-500">● Baru</span></td>
                            <td class="px-6 py-4 text-green-500"><i class="fa-solid fa-check-circle"></i> Lunas</td>
                            <td class="px-6 py-4 font-semibold">Rp 22.470</td>
                            <td class="px-6 py-4">
                                <button class="bg-blue-600 text-white px-3 py-1 rounded-md text-xs">Konfirmasi</button>
                                <button class="bg-green-600 text-white px-3 py-1 rounded-md text-xs ml-2">Whatsapp</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>