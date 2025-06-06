@extends('admin.layout.main')
@section('title', 'Galeri')
@section('content')
    <div class="main-content">
        <section class="section">
            <h1 class="section-header card shadow">

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

                                <form class="d-flex" method="GET" action="{{ route('admin.galeri.index') }}">
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
                                                <th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($galeris as $index => $galeri)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $galeri->foto) }}" alt="Gambar"
                                                            style="width: 100px; height: auto;">
                                                    </td>
                                                    <td>{{ $galeri->judul }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($galeri->tanggal)->format('d-m-Y') }}</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm edit-button"
                                                            data-id="{{ $galeri->id_galeri }}"
                                                            data-judul="{{ $galeri->judul }}"
                                                            data-tanggal="{{ \Carbon\Carbon::parse($galeri->tanggal)->format('Y-m-d') }}"
                                                            data-foto="{{ $galeri->foto }}" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm swal-confirm"
                                                            data-id="{{ $galeri->id_galeri }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <form id="delete-form-{{ $galeri->id_galeri }}"
                                                            action="{{ route('admin.galeri.destroy', $galeri->id_galeri) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <td colspan="6"
                                                    class="text-center text-danger font-italic font-weight-bold">
                                                    @if (request('search'))
                                                        Hasil pencarian tidak ditemukan. Silakan coba dengan kata kunci yang
                                                        berbeda.
                                                    @else
                                                        Data Kosong
                                                    @endif
                                                </td>
                                            @endempty

                                    </tbody>


                                    {{-- <tbody>
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
                                    {{-- <button class="btn btn-primary btn-sm edit-button"
                                                            data-id="{{ $galeri->id_galeri }}"
                                                            data-judul="{{ $galeri->judul }}"
                                                            data-tanggal="{{ \Carbon\Carbon::parse($galeri->tanggal)->format('Y-m-d') }}"
                                                            data-foto="{{ $galeri->foto }}" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </button>

                                                        {{-- Tombol hapus --}}

                                    <!-- Tombol trigger SweetAlert -->
                                    {{-- <button type="button" class="btn btn-danger btn-sm swal-confirm"
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
                                        </tbody> --}}
                                </table>
                                <!-- Tambahkan ini di bawah tabel -->
                                <div class="d-flex justify-content-center">
                                    {{ $galeris->appends(request()->input())->links() }}
                                </div>
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
                        {{-- <input type="file" name="foto" class="form-control-file" id="fotoInput" required> --}}
                        <input type="file" name="foto[]" class="form-control-file" id="fotoInput" multiple required>

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
                    {{-- tambah galeri (Batal) --}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementById('fotoInput').addEventListener('change', function(event) {
        const files = event.target.files;
        const container = document.getElementById('previewContainer');
        container.innerHTML = ''; // Kosongkan pratinjau sebelumnya

        Array.from(files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxHeight = '150px';
                img.style.margin = '5px';
                container.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
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
                    {{-- edit galeri (batal) --}}
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
