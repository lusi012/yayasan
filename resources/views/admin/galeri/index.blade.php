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
                                                        <button class="btn btn-primary btn-sm" title="Edit">
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
                            <input type="file" name="foto" class="form-control-file" required>
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
                        width: '350px', // Mengurangi lebar modal menjadi lebih kecil
                        heightAuto: false, // Agar tinggi modal tidak otomatis menyesuaikan
                        didOpen: () => {
                            // Memperkecil ukuran teks judul
                            const swalTitle = document.querySelector('.swal2-title');
                            if (swalTitle) {
                                swalTitle.style.fontSize =
                                    '26px'; // Ukuran font judul yang lebih kecil
                            }

                            // Memperkecil ukuran teks pesan
                            const swalText = document.querySelector('.swal2-text');
                            if (swalText) {
                                swalText.style.fontSize =
                                    '12px'; // Ukuran font pesan yang lebih kecil
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
