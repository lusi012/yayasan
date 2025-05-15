@extends('admin.layout.main')
@section('title', 'Informasi')
@section('content')
    <div class="main-content">
        <section class="section">
            <h1 class="section-header">
                <div>Informasi</div>
            </h1>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#tambahModal">
                                    <i class="fas fa-plus"></i> Tambah
                                </a>
                                {{-- Pencarian --}}
                                <form class="d-flex" method="GET" action="{{ route('admin.informasi.index') }}">
                                    <input type="text" name="search" class="form-control" placeholder="Search"
                                        value="{{ request('search') }}">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="ion ion-search"></i>
                                    </button>
                                </form>


                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Judul</th>
                                                <th>Deskripsi</th>
                                                <th>Tanggal</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($informasis as $index => $informasi)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $informasi->foto) }}" alt="Gambar"
                                                            width="80px">
                                                    </td>
                                                    <td>{{ $informasi->judul }}</td>
                                                    <td>{{ $informasi->deskripsi }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($informasi->tanggal)->format('d-m-Y') }}
                                                    </td>
                                                    <td>
                                                        {{-- Edit --}}
                                                        <button class="btn btn-primary btn-sm edit-button"
                                                            data-id="{{ $informasi->id_informasi }}"
                                                            data-judul="{{ $informasi->judul }}"
                                                            data-deskripsi="{{ $informasi->deskripsi }}"
                                                            data-tanggal="{{ \Carbon\Carbon::parse($informasi->tanggal)->format('Y-m-d') }}"
                                                            data-foto="{{ $informasi->foto }}" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </button>



                                                        {{-- Tombol hapus --}}

                                                        <!-- Tombol trigger SweetAlert -->
                                                        <button type="button" class="btn btn-danger btn-sm swal-confirm"
                                                            data-id="{{ $informasi->id_informasi }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        <!-- Form tersembunyi -->
                                                        <form id="delete-form-{{ $informasi->id_informasi }}"
                                                            action="{{ route('admin.informasi.destroy', $informasi->id_informasi) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>


                                    </table>
                                    <!-- Tambahkan ini di bawah tabel -->
                                    <div class="d-flex justify-content-center">
                                        {{ $informasis->appends(request()->input())->links() }}
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <!-- Modal tambah-->
    <div class="modal" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Informasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="foto" class="form-control-file" required>
                        </div>

                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Edit informasi --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Galeri</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editId" name="id">

                        <div class="form-group">
                            <label for="editJudul">Judul</label>
                            <input type="text" id="editJudul" name="judul" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="editDeskripsi">Deskripsi</label>
                            <input type="text" id="editDeskripsi" name="deskripsi" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="editTanggal">Tanggal</label>
                            <input type="date" id="editTanggal" name="tanggal" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Gambar (Kosongkan jika tidak diubah)</label><br>
                            <img id="currentFoto" src="" alt="Foto Galeri" class="img-thumbnail"
                                style="max-height: 200px;">
                        </div>

                        <div class="form-group">
                            <label for="fotoInput">Ganti Gambar</label>
                            <input type="file" name="foto" class="form-control-file" id="fotoInput">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.edit-button').on('click', function() {
                const id = $(this).data('id');
                const judul = $(this).data('judul');
                const deskripsi = $(this).data('deskripsi');
                const tanggal = $(this).data('tanggal');
                const foto = $(this).data('foto');

                $('#editId').val(id);
                $('#editJudul').val(judul);
                $('#editDeskripsi').val(deskripsi);
                $('#editTanggal').val(tanggal);

                const fotoPath = foto ? "{{ asset('storage') }}/" + foto : '';
                $('#currentFoto').attr('src', fotoPath);

                $('#editForm').attr('action', "{{ url('admin/informasi') }}/" + id);
                $('#editModal').modal('show');
            });

            $('#fotoInput').on('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#currentFoto').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#currentFoto').attr('src', '');
                }
            });
        });
    </script>

@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.swal-confirm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');

                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data yang dihapus tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#e3342f',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal',
                        width: '350px',
                        heightAuto: false,
                        didOpen: () => {

                            const swalTitle = document.querySelector('.swal2-title');
                            if (swalTitle) {
                                swalTitle.style.fontSize =
                                    '26px';
                            }


                            const swalText = document.querySelector('.swal2-text');
                            if (swalText) {
                                swalText.style.fontSize =
                                    '12px';
                            }
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + id).submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush
