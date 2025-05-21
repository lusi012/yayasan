@extends('admin.layout.main')
@section('title', 'Pengaturan')
@section('content')
    <div class="main-content">
        <section class="section">
            <h1 class="section-header card shadow">
                <div>Profile User</div>
            </h1>

            <div class="section-body">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="card shadow">
                            <div class="card-header">

                            </div>
                            <div class="card-body">

                                <!-- Foto Profil -->
                                <div class="text-center mb-12">
                                    {{-- <label for="profile-picture" class="form-label d-block">Foto Profil</label> --}}
                                    @if ($user)
                                        @if ($user->foto)
                                            <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto"
                                                class="img-thumbnail" width="300">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name= {{ urlencode($user->nama ?? 'User') }}"
                                                class="img-thumbnail rounded-circle" width="300">
                                        @endif
                                    @else
                                        <p class="text-danger">User tidak ditemukan / belum login.</p>
                                    @endif
                                </div>

                                <!-- Data Profil -->
                                <table class="table table-borderless">
                                    <tr>
                                        <th style="width: 20%;">Nama</th>
                                        <td>{{ $user->nama ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td>{{ $user->username ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td>********</td>
                                    </tr>
                                    <tr>
                                        <th>Role</th>
                                        <td>{{ $user->role ?? '-' }}</td>
                                    </tr>
                                </table>

                                <div class="mt-4 text-center">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">
                                        Ubah Profile
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Edit Profile -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data"
                class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Ubah Data Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Nama -->
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $user->nama }}">
                    </div>

                    <!-- Username -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password <small>(Kosongkan jika tidak ingin mengganti)</small></label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <!-- Role -->
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" name="role" value="{{ $user->role }}" readonly>
                    </div>

                    <!-- Foto -->
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" name="foto">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
