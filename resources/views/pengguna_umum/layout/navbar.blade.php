    <nav>
        <div>
            <img alt="image" src="{{ asset('tmp_admin/logo/logo1.jpg') }}">
            <section>
                <H1>LPKS</H1>
                <h2>Yayasan Cahaya Ayu</h2>
            </section>
        </div>
        <ul>
            <li>
                <a href="{{ route('home') }}">
                    Beranda
                </a>
            </li>
            <li>
                <a href="{{ route('informasi') }}">
                    Informasi
                </a>
            </li>
            <li>
                <a href="{{ route('gambar') }}">
                    Galeri
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}">
                    Kontak
                </a>
            </li>
        </ul>
    </nav>
