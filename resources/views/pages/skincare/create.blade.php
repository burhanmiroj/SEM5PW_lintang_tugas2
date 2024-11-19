@extends('layouts.dashboard')

@push('style')
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="grid grid-cols-12 gap-6">
            {{-- SINGLE CARD --}}
            <div class="flex flex-col col-span-full bg-white shadow-sm rounded-xl">
                <header class="flex justify-between items-center border-b border-gray-100 px-5 py-4">
                    <h2 class="font-semibold text-gray-800">Tambah Data Skincare</h2>
                </header>
                <div class="p-5">
                    <form action="{{ route('skincare.store') }}" method="POST" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-5">
                        @csrf
                        {{-- SINGLE GROUP INPUT --}}
                        <div class="md:col-span-2 mb-10">
                            {{-- FILE UPLOAD BTN --}}
                            <div class="w-full h-36 relative group input-group hover:cursor-pointer">
                                <label for="photo" id="file-upload-photo-button" class="w-full h-full flex items-center space-x-3 rounded-md font-medium transition-all duration-300 text-slate-400 border-2 border-blue-500 border-dashed border-spacing-y-96 bg-blue-100 group-hover:bg-blue-200 group-focus-within:ring-1 group-focus-within:ring-offset-2 p-4">
                                    <div class="px-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24">
                                            <path class="fill-blue-500" fill-rule="evenodd" d="M12 2a6.001 6.001 0 0 0-5.476 3.545a23.012 23.012 0 0 1-.207.452l-.02.001C6.233 6 6.146 6 6 6a4 4 0 1 0 0 8h.172l2-2H6a2 2 0 1 1 0-4h.064c.208 0 .45.001.65-.04a1.94 1.94 0 0 0 .7-.27c.241-.156.407-.35.533-.527a2.39 2.39 0 0 0 .201-.36c.053-.11.118-.255.196-.428l.004-.01a4.001 4.001 0 0 1 7.304 0l.005.01c.077.173.142.317.195.428c.046.097.114.238.201.36c.126.176.291.371.533.528c.242.156.487.227.7.27c.2.04.442.04.65.04L18 8a2 2 0 1 1 0 4h-2.172l2 2H18a4 4 0 0 0 0-8c-.146 0-.233 0-.297-.002h-.02A6.001 6.001 0 0 0 12 2m5.702 4.034" clip-rule="evenodd" />
                                            <path class="fill-blue-500" d="m12 12l-.707-.707l.707-.707l.707.707zm1 9a1 1 0 1 1-2 0zm-5.707-5.707l4-4l1.414 1.414l-4 4zm5.414-4l4 4l-1.414 1.414l-4-4zM13 12v9h-2v-9z" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col space-y-1">
                                        <span class="font-semibold text-blue-600">Tarik photo ke area ini atau</span>
                                        <button class="w-28 h-8 flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-xs font-normal text-white">Pilih dokumen</button>
                                        <span class="font-light text-xs text-blue-900">* Foto harus berupa .png/.jpg/.jpeg</span>
                                    </div>
                                </label>
                                <input type="file" name="photo" autocomplete="new-photo" id="photo" accept=".png,.jpg,.jpeg" class="w-full h-full absolute inset-0 z-20 border rounded-md border-slate-300 text-slate-500 focus:ring-0 opacity-0" />
                            </div>
                            {{-- FILE PREVIEW --}}
                            <div class="w-full">
                                <div id="filename-preview" class="w-full lg:h-80 flex flex-col justify-center items-center space-x-3 bg-white border rounded-md shadow-lg p-5">
                                    <div class="w-56 p-5 md:p-0">
                                        <img src="{{ asset('images/nothing-upload.svg') }}" alt="" class="h-full" />
                                    </div>
                                    <div class="w-full text-center py-5">
                                        <h1 class="text-lg font-semibold">Belum ada file yang dipilih</h1>
                                        <p class="text-sm">Anda harus menambahkan file</p>
                                    </div>
                                </div>
                            </div>
                            @error('photo')
                                <div id="input-error">
                                    <span class="text-xs italic text-red-500">{{ $message }}</span>
                                </div>
                            @enderror  
                        </div>
                        {{-- SINGLE GROUP INPUT --}}
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">Kategori Skincare</label>
                            <div class="relative flex items-center">
                                <select name="kategori_skincare" type="text" class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600">
                                    <option selected disabled>-- Pilih kategori skincare</option>
                                    @foreach ($skincareCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('kategori_skincare')
                                <span class="text-xs mt-1 italic text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- SINGLE GROUP INPUT --}}
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">Nama Skincare</label>
                            <div class="relative flex items-center">
                                <input value="{{ old('nama_skincare') }}" name="nama_skincare" type="text" class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Nama skincare" />
                            </div>
                            @error('nama_skincare')
                                <span class="text-xs mt-1 italic text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- SINGLE GROUP INPUT --}}
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">QTY</label>
                            <div class="relative flex items-center">
                                <input value="{{ old('qty') }}" name="qty" type="text" class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="QTY barang" />
                            </div>
                            @error('qty')
                                <span class="text-xs mt-1 italic text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- SINGLE GROUP INPUT --}}
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">Harga</label>
                            <div class="relative flex items-center">
                                <input value="{{ old('harga') }}" name="harga" type="text" class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Harga skincare" />
                            </div>
                            @error('harga')
                                <span class="text-xs mt-1 italic text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- SINGLE GROUP INPUT --}}
                        <div class="md:col-span-2">
                            <label class="text-gray-800 text-sm mb-2 block">Deskripsi</label>
                            <div class="relative flex items-center">
                                <textarea rows="4" name="deskripsi" type="text" class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Deskripsi singkat skincare">{{ old('deskripsi') }}</textarea>
                            </div>
                            @error('deskripsi')
                                <span class="text-xs mt-1 italic text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- BUTTON --}}
                        <div class="w-full md:col-span-2 flex justify-end space-x-5">
                            <a href="{{ route('skincare.index') }}" class="flex justify-center w-32 py-3 text-sm tracking-wide rounded-lg text-white bg-slate-600 hover:bg-slate-700 focus:outline-none">Batal Tambah</a>
                            <button type="submit" class="flex justify-center w-32 py-3 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        /**
         *  
         * FOTO KEPSEK 
         * 
         * */
         const uploadFileLogo = document.querySelector('input[name="photo"]')
        const uploadFileLogoButton = document.querySelector('#file-upload-photo-button')
        const uploadFileLogoPreview = document.querySelector('#filename-preview')

        if(uploadFileLogo) {
            uploadFileLogo.addEventListener('change', function() {
                let uploadedFile = this.files[0]
                
                // SHOW FILENAME PREVIEW
                uploadFileLogoPreview.classList.add('flex')
    
                const fileSize = this.files[0].size;

                if(uploadFileLogo.value == null) {
                    // console.log(uploadFileLogo.value);
                } else {
                    uploadFileLogoPreview.innerHTML = `
                        <div class="upload-loader"></div>
                    `
                    
                    setTimeout(() => {
                        uploadFileLogoPreview.innerHTML = `
                            <div class="w-full h-full grid grid-cols-1 md:grid-cols-5 gap-5">
                                <div class="md:col-span-2 h-full border rounded-md overflow-hidden">
                                    <img id="image-preview" class="w-full h-full object-cover" />
                                </div>
                                <div class="w-full md:col-span-3">
                                    <table class="w-full table-auto border text-left">
                                        <tbody>
                                            <tr class="border align-top">
                                                <th class="text-xs p-2 whitespace-nowrap">Nama File</th>
                                                <td class="text-xs p-2">:</td>
                                                <td class="text-xs p-2">${uploadedFile.name}</td>
                                            </tr>
                                            <tr class="border align-top">
                                                <th class="text-xs p-2 whitespace-nowrap">Ukuran</th>
                                                <td class="text-xs p-2">:</td>
                                                <td class="text-xs p-2">
                                                    <span id="filesize-kb"></span>
                                                    <span>/</span>
                                                    <span id="filesize-mb"></span>
                                                </td>
                                            </tr>
                                            <tr class="border align-top">
                                                <th class="text-xs p-2 whitespace-nowrap">Catatan</th>
                                                <td class="text-xs p-2">:</td>
                                                <td class="text-xs p-2">
                                                    <span id="file-size-warning" class="text-yellow-600"></span>
                                                </td>
                                            </tr>
                                            <tr class="border align-top">
                                                <th class="text-xs p-2">Aksi</th>
                                                <td class="text-xs p-2">:</td>
                                                <td class="p-2">
                                                    <div id="delete-preview" class="flex items-center space-x-2 transition-all duration-100 whitespace-nowrap text-red-500 hover:text-red-600 hover:underline cursor-pointer rounded-md">
                                                        <iconify-icon icon="akar-icons:trash-can"></iconify-icon>
                                                        <span class="text-xs">Hapus file</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        `

                        let reader = new FileReader();
        
                        reader.onload = function (e) {
                            document.getElementById('image-preview').src = e.target.result;
                            
                            const fileSizeInKB = Math.round(fileSize / 1024);
                            const valueFileSizeInMB = fileSize / (1024 * 1024);
                            const fileSizeInMB = valueFileSizeInMB.toFixed(2)
        
                            document.getElementById('filesize-kb').innerText = fileSizeInKB + ' KB';
                            document.getElementById('filesize-mb').innerText = fileSizeInMB + ' MB';
        
                            if(fileSizeInMB > 5) {
                                document.getElementById('file-size-warning').innerText = 'Disarankan menggunakan file dengan ukuran lebih kecil!';
                            } else {
                                document.getElementById('file-size-warning').innerText = '-';
                            }
                        };
        
                        reader.readAsDataURL(this.files[0]);

                        const deletePreview = document.querySelector('#delete-preview')
            
                        if(deletePreview) {
                            deletePreview.addEventListener('click', function() {
                                uploadFileLogo.value = ''
            
                                uploadFileLogoPreview.innerHTML = `
                                    <div class="w-56 p-5 md:p-0">
                                        <img src="/images/nothing-upload.svg" alt="" class="h-full" />
                                    </div>
                                    <div class="w-full text-center py-5">
                                        <h1 class="text-lg font-semibold">Belum ada file yang dipilih</h1>
                                        <p class="text-sm">Anda harus menambahkan photo untuk sekolah</p>
                                    </div>`
            
                                uploadFileLogoButton.innerHTML = `<div class="px-5">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24">
                                                                            <path class="fill-blue-500" fill-rule="evenodd" d="M12 2a6.001 6.001 0 0 0-5.476 3.545a23.012 23.012 0 0 1-.207.452l-.02.001C6.233 6 6.146 6 6 6a4 4 0 1 0 0 8h.172l2-2H6a2 2 0 1 1 0-4h.064c.208 0 .45.001.65-.04a1.94 1.94 0 0 0 .7-.27c.241-.156.407-.35.533-.527a2.39 2.39 0 0 0 .201-.36c.053-.11.118-.255.196-.428l.004-.01a4.001 4.001 0 0 1 7.304 0l.005.01c.077.173.142.317.195.428c.046.097.114.238.201.36c.126.176.291.371.533.528c.242.156.487.227.7.27c.2.04.442.04.65.04L18 8a2 2 0 1 1 0 4h-2.172l2 2H18a4 4 0 0 0 0-8c-.146 0-.233 0-.297-.002h-.02A6.001 6.001 0 0 0 12 2m5.702 4.034" clip-rule="evenodd" />
                                                                            <path class="fill-blue-500" d="m12 12l-.707-.707l.707-.707l.707.707zm1 9a1 1 0 1 1-2 0zm-5.707-5.707l4-4l1.414 1.414l-4 4zm5.414-4l4 4l-1.414 1.414l-4-4zM13 12v9h-2v-9z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div class="flex flex-col space-y-1">
                                                                        <span class="font-semibold text-blue-600">Tarik photo ke area ini atau</span>
                                                                        <button class="w-28 h-8 flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-xs font-normal text-white">Pilih dokumen</button>
                                                                        <span class="font-light text-xs text-blue-900">* Foto harus berupa .png/.jpg/.jpeg</span>
                                                                    </div>`
                            })
                        }
                    }, 1800)
                }
            })
        }
    </script>
@endpush