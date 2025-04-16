@section('content')
    <nav>
        <ul class="flex space-x-4">
            <li>
                <a class="hover:text-gray-400" href="{{ route('home') }}">
                    Home
                </a>
            </li>
            <li>
                <a class="hover:text-gray-400" href="{{ route('informasi') }}">
                    Information
                </a>
            </li>
            <li>
                <a class="hover:text-gray-400" href="{{ route('gambar') }}">
                    Gallery
                </a>
            </li>
            <li>
                <a class="hover:text-gray-400" href="{{ route('contact') }}">
                    Contact
                </a>
            </li>
        </ul>
    </nav>
@endsection
