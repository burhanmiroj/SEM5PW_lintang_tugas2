<?php

namespace App\Http\Controllers;

use App\Models\Skincare;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SkincareCategory;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class SkincareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Skincare::with('skincare_category')->orderBy('id', 'DESC');

            return DataTables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    // SEARCH
                    if (!empty($request->get('search'))) {
                        $instance->where(function($w) use($request){
                            $search = $request->get('search');
                            
                            return $w->where('skincare_name', 'LIKE', "%$search%");
                        });
                    }
                })
                ->addColumn('skincare_name', function ($row) {
                    $dataToShow = '<div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-full overflow-hidden">
                                            <img src="/storage/foto-skincare/' . $row->photo . '" class="w-full h-full object-cover" />
                                        </div>
                                        <div>
                                            <p>' . $row->skincare_name . '</p>
                                            <p class="text-xs text-slate-500">Kategori : ' . $row->skincare_category->category_name . '</p>
                                        </div>
                                    </div>';
                    
                    return $dataToShow;
                })
                ->addColumn('price', function ($row) {
                    return 'Rp. ' . number_format($row->price, 2, ",", ".");
                })
                ->addColumn('aksi', function($row) {
                    $aksi = '<div class="flex items-center space-x-3 mt-3 lg:mt-0">
                                <a href="/skincare/' . Crypt::encryptString($row->id) . '/edit" class="w-7 h-7 rounded-full flex justify-center items-center text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-300">
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
                                                <form action="/skincare/' . Crypt::encryptString($row->id) . '" method="POST">
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
                ->rawColumns(['skincare_name', 'price', 'aksi'])
                ->make(true);
        }

        return view('pages.skincare.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skincareCategories = SkincareCategory::get();

        return view('pages.skincare.create', compact('skincareCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_skincare' => 'required'
        ]);

        $photoFileName = Str::random(20) . '.' . $request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->storeAs('foto-skincare/', $photoFileName, 'public');

        Skincare::create([
            'skincare_category_id' => $request->kategori_skincare,
            'photo' => $photoFileName,
            'skincare_name' => $request->nama_skincare,
            'qty' => $request->qty,
            'price' => $request->harga,
            'description' => $request->deskripsi,
        ]);

        Alert::success('Berhasil', 'Berhasil menambah skincare!')
            ->autoClose(3000);

        return redirect()->route('skincare.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skincare $skincareCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($skincareID)
    {
        $skincare = Skincare::where('id', Crypt::decryptString($skincareID))->first();
        $skincareCategories = SkincareCategory::get();

        return view('pages.skincare.edit', compact('skincare', 'skincareCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $skincareID)
    {
        $request->validate([
            'kategori_skincare' => 'required'
        ]);

        $skincare = Skincare::where('id', Crypt::decryptString($skincareID))->first();

        if ($request->file('photo'))
        {
            $photoFileName = Str::random(20) . '.' . $request->file('photo')->getClientOriginalExtension();

            Storage::delete('public/foto-skincare/'. $photoFileName);

            $request->file('photo')->storeAs('foto-skincare/', $photoFileName, 'public');
        } else {
            $photoFileName = $skincare->photo;
        }

        Skincare::where('id', Crypt::decryptString($skincareID))->update([
            'skincare_category_id' => $request->kategori_skincare,
            'photo' => $photoFileName,
            'skincare_name' => $request->nama_skincare,
            'qty' => $request->qty,
            'price' => $request->harga,
            'description' => $request->deskripsi,
        ]);

        Alert::success('Berhasil', 'Berhasil mengubah data skincare!')
            ->autoClose(3000);

        return redirect()->route('skincare.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($skincareID)
    {
        Skincare::where('id', Crypt::decryptString($skincareID))->delete();

        Alert::success('Berhasil', 'Berhasil menghapus skincare!')
            ->autoClose(3000);

        return redirect()->route('skincare.index');
    }
}
