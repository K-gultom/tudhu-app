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

    <div class="row">
       <div class="col g-1 p-1">
            <h4>Hello {{ Auth::user()->name }}</h4>
       </div>
       <div class="col g-1 p-1 text-end">
            <a href="/add" class="text-decoration-none text-light btn btn-primary rounded-5" title="Add">
                <i class="bi bi-plus"></i>
            </a>
       </div>
    </div>
    

    <div class="row">
        @foreach ($getData as $nasigoreng)
            <div class="col-6 col-md-3 g-1 p-1 mb-2">
                <div href="" class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($nasigoreng->nama_todo, 10) }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ \Carbon\Carbon::parse($nasigoreng->tanggal)->format('D, d|m|Y') }}</h6>
                        {{-- <p class="card-text">{{ $nasigoreng->todo_desc }}</p> --}}
                        <p class="card-text">{{ Str::limit($nasigoreng->todo_desc, 15) }}</p>

                        <div class="d-flex justify-content-end">

                            {{-- <a href="{{ url('/home') }}/{{ $nasigoreng->id }}" class="card-link">
                                <i class="bi bi-eye-fill"></i>
                            </a> --}}
                            {{-- <button type="button" class="" 
                                data-bs-toggle="modal" 
                                data-bs-target="#exampleModal"
                                data-nama="{{ $nasigoreng->nama_todo }}"
                                data-tanggal="{{ $nasigoreng->tanggal }}"
                                data-desc="{{ $nasigoreng->todo_desc }}">
                                <i class="bi bi-eye-fill"></i>
                            </button> --}}
                            <a href="#" class="card-link"
                                data-bs-toggle="modal" 
                                data-bs-target="#exampleModal"
                                data-nama="{{ $nasigoreng->nama_todo }}"
                                data-tanggal="{{ $nasigoreng->tanggal }}"
                                data-desc="{{ $nasigoreng->todo_desc }}">
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


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll("[data-bs-target='#exampleModal']").forEach(link => {
                link.addEventListener("click", function () {
                    let nama = this.getAttribute("data-nama");
                    let tanggal = this.getAttribute("data-tanggal");
                    let desc = this.getAttribute("data-desc");
    
                    document.getElementById("modal-nama").textContent = nama;
                    document.getElementById("modal-tanggal").textContent = tanggal;
                    document.getElementById("modal-desc").textContent = desc;
                });
            });
        });
    </script>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Todo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Todo:</strong> <span id="modal-nama"></span></p>
                    <p><strong>Tanggal:</strong> <span id="modal-tanggal"></span></p>
                    <p><strong>Deskripsi:</strong> <br> <span id="modal-desc"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    


    {{-- <button class="floating-btn">
        <a href="/add" class="text-decoration-none text-light">
            <i class="bi bi-plus"></i>
        </a>
    </button> --}}
    {{-- <style>
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
    </style> --}}


@endsection