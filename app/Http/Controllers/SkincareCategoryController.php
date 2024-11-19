<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkincareCategory;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class SkincareCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SkincareCategory::orderBy('id', 'DESC');

            return DataTables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    // SEARCH
                    if (!empty($request->get('search'))) {
                        $instance->where(function($w) use($request){
                            $search = $request->get('search');
                            
                            return $w->where('category_name', 'LIKE', "%$search%");
                        });
                    }
                })
                ->addColumn('category_name', function ($row) {
                    $dataToShow = '
                        <span>' . $row->category_name . '</span>
                    ';
                    
                    return $dataToShow;
                })
                ->addColumn('aksi', function($row) {
                    $aksi = '<div class="flex items-center space-x-3 mt-3 lg:mt-0">
                                <a href="/skincare-category/' . Crypt::encryptString($row->id) . '/edit" class="w-7 h-7 rounded-full flex justify-center items-center text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-300">
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
                                                <form action="/skincare-category/' . Crypt::encryptString($row->id) . '" method="POST">
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
                            </div>';

                    return $aksi;
                })
                ->rawColumns(['category_name', 'aksi'])
                ->make(true);
        }

        return view('pages.skincare-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.skincare-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        SkincareCategory::create([
            'category_name' => $request->nama_kategori
        ]);

        Alert::success('Berhasil', 'Berhasil menambah kategori skincare!')
            ->autoClose(3000);

        return redirect()->route('skincare-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SkincareCategory $skincareCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($skincareCategoryID)
    {
        $skincareCategory = SkincareCategory::where('id', Crypt::decryptString($skincareCategoryID))->first();

        return view('pages.skincare-category.edit', compact('skincareCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $skincareCategoryID)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        SkincareCategory::where('id', Crypt::decryptString($skincareCategoryID))->update([
            'category_name' => $request->nama_kategori
        ]);

        Alert::success('Berhasil', 'Berhasil mengubah kategori skincare!')
            ->autoClose(3000);

        return redirect()->route('skincare-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($skincareCategoryID)
    {
        SkincareCategory::where('id', Crypt::decryptString($skincareCategoryID))->delete();

        Alert::success('Berhasil', 'Berhasil mengubah kategori skincare!')
            ->autoClose(3000);

        return redirect()->route('skincare-category.index');
    }
}
