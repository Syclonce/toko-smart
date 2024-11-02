@extends('template.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="kategoribarang" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                  <th>Nama Kategori</th>
                                  <th>--</th>
                                </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach($kategori as $category)
                                        <tr>
                                            <td class="text-center">{{ $category->nama }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $category->id }}" data-nama="{{ $category->nama }}">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Modal -->
    <div class="modal fade" id="addpermesionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembelian Produk</h5>
                </div>
                <form action="{{ route('kategori.barang.add') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Instansi</label>
                                <input type="text" name="instansi" id="instansi" class="form-control" placeholder="Masukan Nama Instansi Kategori" required>
                                @if ($errors->has('instansi'))
                                    <span class="text-danger">{{ $errors->first('instansi') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Kode Faktur</label>
                                <input type="text" name="faktur" id="faktur" class="form-control" placeholder="Masukan Nama Kategori" required>
                                @if ($errors->has('faktur'))
                                    <span class="text-danger">{{ $errors->first('faktur') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="namabrg" id="namabrg" class="form-control" placeholder="Masukan Nama Kategori" required>
                                @if ($errors->has('namabrg'))
                                    <span class="text-danger">{{ $errors->first('namabrg') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Harga / Satuan</label>
                                <input type="text" name="hrgst" id="hrgst" class="form-control" placeholder="Masukan Nama Kategori" required>
                                @if ($errors->has('hrgst'))
                                    <span class="text-danger">{{ $errors->first('hrgst') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jumlah Barang</label>
                                <input type="text" name="jmlbrg" id="jmlbrg" class="form-control" placeholder="Masukan Nama Kategori" required>
                                @if ($errors->has('jmlbrg'))
                                    <span class="text-danger">{{ $errors->first('jmlbrg') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Harga</label>
                                <input type="text" name="total" id="total" class="form-control" placeholder="Masukan Nama Kategori" required>
                                @if ($errors->has('total'))
                                    <span class="text-danger">{{ $errors->first('total') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="sumbit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script>
    $(function () {
        $('#kategoribarang').DataTable({
            "responsive": true,
            "autoWidth": false,
            "buttons": false,
            "lengthChange": true, // Corrected: Removed conflicting lengthChange option
            "language": {
                "lengthMenu": "Tampil  _MENU_",
                "info": "",
                "search": "Cari :",
                "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Berikutnya"
                }
            }
        });
    });

    $(document).ready(function() {
    var table = $('#kategoribarang').DataTable();
        $('#kategoribarang_filter').append(`
            <button type="button" class="btn btn-primary ml-2" data-toggle="modal"   data-target="#addpermesionModal">
                <i class="fas fa-plus"></i>
            </button>
        `);
    });
    </script>
@endsection
