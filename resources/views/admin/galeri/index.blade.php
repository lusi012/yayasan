@extends('admin.layout.main')
@section('title', 'Galeri')
@section('content')
    <div class="main-content">
        <section class="section">
            <h1 class="section-header">
                <div>Galeri</div>
            </h1>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#tambahModal">
                                    <i class="fas fa-plus"></i> Tambah
                                </a>
                                <form class="d-flex">
                                    <input type="text" class="form-control" placeholder="Search">
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
                                                <th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($galeris as $index => $galeri)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $galeri->foto) }}" alt="Gambar"
                                                            width="80px">
                                                    </td>
                                                    <td>{{ $galeri->judul }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($galeri->tanggal)->format('d-m-Y') }}</td>
                                                    <td>
                                                        {{-- Tombol edit --}}
                                                        <button class="btn btn-primary btn-sm edit-button"
                                                            data-id="{{ $galeri->id_galeri }}"
                                                            data-judul="{{ $galeri->judul }}"
                                                            data-tanggal="{{ $galeri->tanggal }}"
                                                            data-foto="{{ $galeri->foto }}" data-toggle="modal"
                                                            data-target="#editModal" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        {{-- Tombol hapus --}}

                                                        <!-- Tombol trigger SweetAlert -->
                                                        <button type="button" class="btn btn-danger btn-sm swal-confirm"
                                                            data-id="{{ $galeri->id_galeri }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        <!-- Form tersembunyi -->
                                                        <form id="delete-form-{{ $galeri->id_galeri }}"
                                                            action="{{ route('admin.galeri.destroy', $galeri->id_galeri) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- Modal tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Galeri</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="foto" class="form-control-file" id="fotoInput" required>
                            <!-- Tempat pratinjau foto -->
                            <div class="mt-2">
                                <img id="previewFoto" src="" alt="Pratinjau Foto"
                                    style="max-height: 300px; display: none;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" required>
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
    <script>
        document.getElementById('fotoInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewFoto');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        });
    </script>
    <!-- Modal Edit -->
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
                            <label>Judul</label>
                            <input type="text" id="editJudul" name="judul" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" id="editTanggal" name="tanggal" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Gambar (Kosongkan jika tidak diubah)</label><br>
                            <img id="currentFoto" src="" alt="Foto Galeri" class="img-thumbnail"
                                style="max-height: 200px;">
                        </div>

                        <div class="form-group">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js "></script>

    <script>
        $(document).ready(function() {
            $('.edit-button').on('click', function() {
                var id = $(this).data('id');
                var judul = $(this).data('judul');
                var tanggal = $(this).data('tanggal');
                var foto = $(this).data('foto');
                $('#editId').val(id);
                $('#editJudul').val(judul);
                $('#editTanggal').val(tanggal);
                if (foto) {
                    var fotoPath = "{{ asset('storage/') }}/" + foto;
                    $('#currentFoto').attr('src', fotoPath);
                } else {
                    $('#currentFoto').attr('src', '');
                }
                $('#editForm').attr('action', "{{ url('admin/galeri') }}/" + id);
            });
            $('#fotoInput').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#currentFoto').attr('src', e.target
                            .result);
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
            // ========= SweetAlert Hapus =========
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
                            if (swalTitle) swalTitle.style.fontSize = '26px';

                            const swalText = document.querySelector('.swal2-text');
                            if (swalText) swalText.style.fontSize = '12px';
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + id).submit();
                        }
                    });
                });
            });

            // ========= Modal Edit =========
            const editButtons = document.querySelectorAll('.edit-button');
            const editForm = document.getElementById('editForm');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const judul = this.dataset.judul;
                    const tanggal = this.dataset.tanggal;

                    editForm.action = `/admin/galeri/${id}`;
                    document.getElementById('editJudul').value = judul;
                    document.getElementById('editTanggal').value = tanggal;
                    $('#editModal').modal('show');
                });
            });
        });
    </script>
@endpush
