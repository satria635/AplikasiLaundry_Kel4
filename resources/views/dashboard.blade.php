<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 text-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 mx-4 sm:mx-0 mb-6">
                <div class="p-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="text-gray-900 text-xl font-medium">
                        {{ __("Laporan & Analisis") }}
                    </div>

                    <div class="flex items-center space-x-3">
                        <div class="flex items-center space-x-2 bg-white border border-gray-300 rounded-lg px-5 py-2 text-sm text-gray-700 shadow-sm">
                            <i class="fa-regular fa-calendar text-blue-600 flex items-center px-2"></i>
                            <select class="focus:outline-none bg-transparent cursor-pointer text-gray-700 border-none p-0 pr-6 text-sm focus:ring-0 leading-none h-5 flex items-center">
                                <option value="bulan_ini">Bulan ini</option>
                                <option value="hari_ini">Hari ini</option>
                                <option value="tahun_ini">Tahun ini</option>
                            </select>
                        </div>
                        <button class="bg-[#007bff] hover:bg-blue-700 text-white font-medium text-sm px-5 py-2 rounded-lg transition-colors shadow-sm cursor-pointer">
                            Terapkan
                        </button>
                    </div>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px;" class="px-4 sm:px-0">
                
                <div style="height: 150px; display: flex; flex-direction: column; justify-content: space-between;" class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm relative">
                    <div>
                        <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600 mb-2">
                            <i class="fa-solid fa-money-bill-wave text-base"></i>
                        </div>
                        <p class="text-sm text-gray-500 font-medium pt-4">Total Pendapatan</p>
                    </div>
                    <p class="text-2xl font-bold text-gray-900">Rp 1.070.600</p>
                </div>

                <div style="height: 150px; display: flex; flex-direction: column; justify-content: space-between;" class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm relative">
                    <div>
                        <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600 mb-2">
                            <i class="fa-solid fa-cart-shopping text-base"></i>
                        </div>
                        <p class="text-sm text-gray-500 font-medium pt-4">Total Pesanan</p>
                    </div>
                    <p class="text-2xl font-bold text-gray-900">23</p>
                </div>

                <div style="height: 150px; display: flex; flex-direction: column; justify-content: space-between;" class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm relative">
                    <div>
                        <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600 mb-2">
                            <i class="fa-solid fa-user-plus text-base"></i>
                        </div>
                        <p class="text-sm text-gray-500 font-medium pt-4">Pelanggan Baru</p>
                    </div>
                    <p class="text-2xl font-bold text-gray-900">4</p>
                </div>

                <div style="height: 150px; display: flex; flex-direction: column; justify-content: space-between;" class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm relative">
                    <div>
                        <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600 mb-2">
                            <i class="fa-solid fa-file-invoice text-lg"></i>
                        </div>
                        <p class="text-sm text-gray-500 font-medium pt-4">Rata-rata Order</p>
                    </div>
                    <p class="text-2xl font-bold text-gray-900">Rp 46.548</p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>