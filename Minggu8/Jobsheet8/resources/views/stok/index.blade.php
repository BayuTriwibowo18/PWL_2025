<!-- resources/views/stok/index.blade.php -->
@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Stok Barang</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/stok/import') }}')" class="btn btn-info">Import Stok</button>
                <a href="{{ url('/stok/export_excel') }}" class="btn btn-primary"><i class="fa fa-file- excel"></i> Export Stok</a>
                <a href="{{ url('/stok/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file- pdf"></i> Export Stok (pdf)</a>
                <button onclick="modalAction('{{ url('/stok/create_ajax') }}')" class="btn btn-success">Tambah Data (Ajax)</button>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <select class="form-control" id="user_id" name="user_id">
                                <option value="">- Semua</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->user_id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Nama User</small>
                        </div>
                    </div>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            
            <table class="table table-bordered table-sm table-striped table-hover" id="table-stok">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Nama User</th>
                        <th>Tanggal Stok</th>
                        <th>Jumlah Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="75%"></div>
@endsection

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        var tableStok;
        $(document).ready(function() {
            tableStok = $('#table-stok').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('stok/list') }}",
                    type: "POST",
                    dataType: "json",
                    data: function(d) {
                        d.filter_barang = $('.filter_barang').val();
                    }
                },
                columns: [
                    { 
                        data: "DT_RowIndex", 
                        className: "text-center", 
                        width: "5%", 
                        orderable: false, 
                        searchable: false 
                    },
                    { 
                        data: "barang.barang_nama", 
                        className: "", 
                        width: "25", 
                        orderable: true, 
                        searchable: true 
                    },
                    {
                        data: "user.nama", 
                        className: "",
                        width: "25",
                        orderable: false,
                        searchable: false
                    },
                    { 
                        data: "stok_tanggal", 
                        className: "", 
                        width: "25%", 
                        orderable: true, 
                        searchable: true 
                    },
                    { 
                        data: "stok_jumlah", 
                        className: "", 
                        width: "20%", 
                        orderable: true, 
                        searchable: false 
                    },
                    { 
                        data: "aksi", 
                        className: "text-center", 
                        width: "20%", 
                        orderable: false, 
                        searchable: false 
                    }
                ]
            });

            $('#table-stok_filter input').unbind().bind().on('keyup', function(e) {
                if (e.keyCode == 13) { 
                    tableStok.search(this.value).draw();
                }
            });

            $('.filter_barang').change(function() {
                tableStok.draw();
            });
        });
    </script>
@endpush