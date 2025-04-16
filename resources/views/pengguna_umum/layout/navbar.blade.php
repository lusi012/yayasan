@section('content')
    <nav>
        <div>
            <H1>LPKS</H1>
            <h2>Yayasan Cahaya Ayu</h2>
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
