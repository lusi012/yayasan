@section('content')
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
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('informasi') }}">
                    Information
                </a>
            </li>
            <li>
                <a href="{{ route('gambar') }}">
                    Gallery
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}">
                    Contact
                </a>
            </li>
        </ul>
    </nav>
@endsection
