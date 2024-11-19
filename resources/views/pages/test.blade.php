@extends('layouts.dashboard')

@section('content')
    <div class="flex items-center space-x-3 mt-3 lg:mt-0">
        <a href="/kelas/' . Crypt::encryptString($row->id) . '/edit" class="w-7 h-7 rounded-full flex justify-center items-center text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-300">
            <iconify-icon icon="material-symbols:edit-outline-rounded"></iconify-icon>
        </a>
        <div x-cloak x-data="{ show'. $row->id .': false }" class="flex items-center">
            <button x-on:click.prevent="show'. $row->id .' = true" class="w-7 h-7 rounded-full flex justify-center items-center text-white bg-red-500 disabled:bg-red-300 hover:bg-red-600 focus:ring-2 focus:ring-red-300 disabled:cursor-not-allowed">
                <iconify-icon icon="material-symbols:delete-outline"></iconify-icon>
            </button>
            <div x-show="show'. $row->id .'" class="w-full fixed inset-0 z-50 overflow-y-auto py-8 px-4">
                <div x-show="show'. $row->id .'" class="w-full fixed inset-0 transform bg-gray-900 opacity-70" x-on:click="show'. $row->id .' = false""></div>
                <div x-show="show'. $row->id .'" class="mb-6 bg-white rounded-sm overflow-hidden shadow-xl p-6 md:p-8 transform transition-all w-full sm:max-w-sm md:max-w-lg lg:max-w-xl xl:max-w-2xl mx-auto" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <div class="text-gray-700">
                        <h1 class="text-lg font-medium">Hapus data?</h1>
                        <p class="text-sm">Data akan dihapus secara permanen</p>
                    </div>
                    <div class="flex justify-end mt-7 space-x-3">       
                        <button x-on:click="show'. $row->id .' = false" class="w-32 h-9 flex justify-center items-center rounded-sm focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-red-700 transition-all duration-200 border border-red-300 bg-white hover:bg-red-100 text-red-500">
                            <iconify-icon icon="material-symbols:close-rounded"></iconify-icon>
                            <span class="font-semibold text-xs uppercase ml-1">Batalkan</span>
                        </button>
                        <form action="/kelas/' . $row->id . '" method="POST">
                            ' . method_field('DELETE') . '
                            '. csrf_field() .'
                            <button type="submit" class="w-32 h-9 flex justify-center items-center rounded-sm focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-red-700 transition-all duration-200 bg-red-500 hover:bg-red-600 text-white">
                                <iconify-icon icon="material-symbols:delete-outline"></iconify-icon>
                                <span class="font-semibold text-xs uppercase ml-1">Hapus</span>
                            </button>
                        </form>             
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="text-xs text-slate-500">Kategori : ' . $row->skincare_category->category_name . '</p>

    <div>
        <div class="w-20 h-20 rounded-full overflow-hidden">
            <img src="storage/skincare/' . $row->photo . '" class="w-full h-full object-cover" />
        </div>
        <div>
            <p>' . $row->skincare_name . '</p>
            <p class="text-xs text-slate-500">Kategori : ' . $row->skincare_category->category_name . '</p>
        </div>
    </div>
@endsection