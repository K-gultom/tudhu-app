@extends('main')

@section('content')

    {{-- Ini Membuat Alert --}}
    {{-- <div class="container bg-warning">
        @if (Session::has('message'))
            <div class="alert alert-success" id="flash-message">
                {{ Session::get('message') }}
            </div>
            <script>
                setTimeout(() => {
                    document.getElementById('flash-message').style.display='none';
                }, {{ session('timeout', 5000) }});
            </script>
        @endif

        <h1>Alert</h1>
    </div> --}}

    <style>
         .floating-btn {
            position: fixed;
            bottom: 65px;
            right: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }
        .floating-btn:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="row">
       <div class="col g-1 p-1">
            <h4>Hello {{ Auth::user()->name }}</h4>
       </div>
    </div>
    

    <div class="row">
        @foreach ($getData as $nasigoreng)
            <div class="col-6 col-md-3 g-1 p-1">
                <div href="" class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($nasigoreng->nama_todo, 10) }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ \Carbon\Carbon::parse($nasigoreng->tanggal)->format('D, d|m|Y') }}</h6>
                        {{-- <p class="card-text">{{ $nasigoreng->todo_desc }}</p> --}}
                        <p class="card-text">{{ Str::limit($nasigoreng->todo_desc, 15) }}</p>

                        <div class="d-flex justify-content-end">

                            <a href="{{ url('/home') }}/{{ $nasigoreng->id }}" class="card-link">
                                <i class="bi bi-eye-fill"></i>
                            </a>

                            <a href="{{ url('/edit') }}/{{ $nasigoreng->id }}" class="card-link">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            
                            <a href="{{ url('/delete') }}/{{ $nasigoreng->id }}" class="card-link" onclick="return confirm('Yakin hapus data???');">
                                <i class="bi bi-trash-fill"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <button class="floating-btn">
        <a href="/add" class="text-decoration-none text-light">
            <i class="bi bi-plus"></i>
        </a>
    </button>

@endsection