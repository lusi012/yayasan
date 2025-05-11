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
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Judul</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>

                                        <tr>
                                            <td>1</td>
                                            <td>Img</td>
                                            <td>abc</td>
                                            <td>Tanggal</td>

                                            <td>
                                                <button class="btn btn-primary btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>

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
            <form action="{{ route('admin.gambar.store') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="file" name="image" class="form-control-file" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" required>
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
