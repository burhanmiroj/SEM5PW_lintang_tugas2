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
                    <h2 class="font-semibold text-gray-800">Data Kategori Skincare</h2>
                    <button class="w-32 py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">Tambah data</button>
                </header>
                <div class="py-10">
                    <table id="jumbotroon-datatable">
                        <thead>
                            <tr class="capitalize">
                                <th>NO</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{-- JQUERY --}}
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    {{-- DATATABLES --}}
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        // DATATABLE
        $(function () {
            let LP_DATATABLE = $('#jumbotroon-datatable').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                autoWidth: false,
                aaSorting: [],
                pageLength: 10,
                lengthMenu: [10, 20, 50],
                ajax: {
                    url: "{{ route('skincare-category.index') }}",
                    data: function(d) {
                        d.search = $('input[type="search"]').val()
                    }
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false, 
                        searchable: false
                    },
                    {
                        data: 'category_name',
                        name: 'category_name',
                        orderable: false, 
                        searchable: false
                    },
                    {
                        data: 'aksi',
                        name: 'aksi', 
                        orderable: false, 
                        searchable: false
                    },
                ]
            })
            .columns.adjust()
            .responsive.recalc();
        });
    </script>
@endpush