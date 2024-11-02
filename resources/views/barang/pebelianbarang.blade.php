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
                                    <th>Nama Instansi</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Faktur</th>
                                    <th>Satuan</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Harga / Satuan</th>
                                    <th>Jumlah Barang</th>
                                    <th>Total Harga</th>
                                    <th>--</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($pembelian as $pembelian)
                                        <tr>
                                            <td class="text-center">{{ $pembelian->supplier->nama }}</td> <!-- Menampilkan nama instansi -->
                                            <td class="text-center">{{ $pembelian->item_name }}</td>
                                            <td class="text-center">{{ $pembelian->invoice_code }}</td>
                                            <td class="text-center">{{ $pembelian->unit->nama }}</td> <!-- Menampilkan nama satuan -->
                                            <td class="text-center">{{ \Carbon\Carbon::parse($pembelian->purchase_date)->format('d-m-Y') }}</td>
                                            <td class="text-center">Rp {{ number_format($pembelian->unit_price, 0, ',', '.') }}</td> <!-- Format harga satuan -->
                                            <td class="text-center">{{ $pembelian->quantity }}</td>
                                            <td class="text-center">Rp {{ number_format($pembelian->total_price, 0, ',', '.') }}</td> <!-- Format total harga -->            
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembelian Produk</h5>
                </div>
                <form action="{{ route('pblbarang.barang.add') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Instansi</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="instansi" name="instansi">
                                    @foreach ($suplayer as $suplayer)
                                        <option value="{{$suplayer->id}}">{{$suplayer->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="namabrg" id="namabrg" class="form-control" placeholder="Masukan Nama Kategori" required>
                                @if ($errors->has('namabrg'))
                                    <span class="text-danger">{{ $errors->first('namabrg') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <label>Kode Faktur</label>
                                <input type="text" name="faktur" id="faktur" class="form-control" placeholder="Masukan Faktur Kategori" required>
                                @if ($errors->has('faktur'))
                                    <span class="text-danger">{{ $errors->first('faktur') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="strbrg" name="strbrg">
                                    @foreach ($satuan as $satuan)
                                        <option value="{{$satuan->id}}">{{$satuan->nama}}</option>
                                    @endforeach
                                </select>                                
                            </div>                            
                        </div>
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <label>Tanggal Pembelian</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Masukan Tanggal Kategori" required>
                                @if ($errors->has('tanggal'))
                                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Harga / Satuan</label>
                                <input type="text" name="hrgst" id="hrgst" class="form-control" placeholder="Masukan Harga Instansi" required>
                                @if ($errors->has('hrgst'))
                                    <span class="text-danger">{{ $errors->first('hrgst') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jumlah Barang</label>
                                <input type="number" name="jmlbrg" id="jmlbrg" class="form-control" placeholder="Masukan Nama Kategori" required min="1">
                                @if ($errors->has('jmlbrg'))
                                    <span class="text-danger">{{ $errors->first('jmlbrg') }}</span>
                                @endif
                            </div>
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
        document.addEventListener("DOMContentLoaded", function() {
            // Ambil elemen input tanggal
            const tanggalInput = document.getElementById("tanggal");
    
            // Format tanggal hari ini ke format YYYY-MM-DD
            const today = new Date().toISOString().split("T")[0];
    
            // Set nilai default input tanggal ke hari ini
            tanggalInput.value = today;
        });
    </script>

    <script>    
       $(document).ready(function(){
            $('#hrgst').inputmask({
                alias: 'numeric',
                groupSeparator: '.',
                autoGroup: true,
                digits: 0,
                digitsOptional: false,
                prefix: 'Rp ',
                rightAlign: false,
                removeMaskOnSubmit: true,
                placeholder: "0"
            });
            $('#total').inputmask({
                alias: 'numeric',
                groupSeparator: '.',
                autoGroup: true,
                digits: 0,
                digitsOptional: false,
                prefix: 'Rp ',
                rightAlign: false,
                removeMaskOnSubmit: true,
                placeholder: "0"
            });
        });
    </script>
    <script>    
       $(document).ready(function(){
            function calculateTotal() {
                // Ambil nilai harga satuan dan jumlah barang
                let hargaSatuan = parseFloat($('#hrgst').inputmask('unmaskedvalue')) || 0; // Mengambil nilai asli tanpa format
                let jumlahBarang = parseInt($('#jmlbrg').val()) || 0;
                
                // Hitung total harga
                let totalHarga = hargaSatuan * jumlahBarang;

                // Set nilai total harga dengan format rupiah
                $('#total').val(totalHarga).trigger('input');
            }

            // Event listener untuk menjalankan fungsi calculateTotal saat nilai berubah
            $('#hrgst').on('input', calculateTotal);
            $('#jmlbrg').on('input', calculateTotal);
        });
    </script>

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
