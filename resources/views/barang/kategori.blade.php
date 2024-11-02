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
                                    @foreach($kategori as $category)
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
                                    @endforeach
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kategori Produk</h5>
                </div>
                <form action="{{ route('kategori.barang.add') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nameApp">Nama Kategori</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Kategori" required>
                        @if ($errors->has('nama'))
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        @endif
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
