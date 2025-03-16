@extends('main')

@section('content')
    
<h3>Show</h3>
    <x-breadcrumb halaman="show" />

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header"><strong>Form</strong> Edit Todo</div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf

                        <div class="mb-2">
                            <div class="form-outline">
                                <label for="nama_todo" class="form-label">Nama Todo</label>
                                <input type="text" value="{{ old('nama_todo', $getData->nama_todo) }}" name="nama_todo" id="" class="form-control @error('nama_todo') is-invalid @enderror" placeholder="Todo Anda!!">
                                @error('nama_todo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror 
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-outline">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" value="{{ old('tanggal', $getData->tanggal) }}" name="tanggal" id="" class="form-control @error('tanggal') is-invalid @enderror">
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-outline">
                                <label for="todo_desc" class="form-label">Kegiatan Anda</label>
                                {{-- <input type="text" name="todo_desc" id="" class="form-control @error('todo_desc') is-invalid @enderror" placeholder="Todo Anda Hari Ini!!"> --}}
                                <textarea name="todo_desc" id="" cols="30" rows="5" class="form-control @error('todo_desc') is-invalid @enderror">{{ old('todo_desc', $getData->todo_desc) }}</textarea>
                                @error('todo_desc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="/home" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection