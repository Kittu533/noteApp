@extends('layout')
@section('content')
<div class="d-flex justify-content-end align-items-center p-3 bg-light border-bottom">
    <h1 class="me-3 fs-5 fw-semibold mb-0">Welcome, {{ Auth::user()->name }}</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
    </form>
</div>


<div class="row mt-5">
    <div class="col-5">
        {{-- Condition Check using session --}}
        @if (session('created'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Created</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @elseif (session('updated'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Update</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @elseif (session('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Deleted</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif


        {{-- Create posts section --}}
        <div class=" card">
            <div class="card-header">
                <h5>Note App Mahasiswa</h5>
            </div>
            {{-- Create posts form --}}
            <div class="card-body">
                <form action="{{ route('post#create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Catatan</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title">
                        @error('title')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_matkul" class="form-label">Nama Matkul</label>
                        <input type="text" name="nama_matkul" value="{{ old('nama_matkul') }}" class="form-control" id="nama_matkul">
                        @error('nama_matkul')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="batas_waktu" class="form-label">Batas Waktu Pengerjaan</label>
                        <input type="datetime-local" name="batas_waktu" value="{{ old('batas_waktu') }}" class="form-control" id="batas_waktu">
                        @error('batas_waktu')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Catatan</label>
                        <textarea name="description" id="description" class=" form-control" rows="8">{{ old('description') }}</textarea>
                        @error('description')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" name='image' type="file" id="formFile">
                        @error('image')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Create</button>
                </form>
            </div>
        </div>
    </div>
    {{-- posts section --}}
    <div class="col-7">
        <div class="data-container">
            {{-- search input --}}
            <form action="{{ route('post#home') }}" method="get">
                <div class="input-group input-group-sm mb-3">
                    <input type="text" value="{{ request('search') }}" name='search' class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm">
                    <button type="submit" class="btn btn-danger">search</button>
                </div>
            </form>
            {{-- data show condition --}}
            @if (count($data) === 0)
            <h3 class=" mt-3 text-center text-danger">There is no data with {{ request('search') }}</h3>
            @endif
            {{-- foreach start --}}
            @foreach ($data as $row)
            <div class="post mb-3 p-2 shadow-sm">
                <div class="mb-2 d-flex justify-content-between">
                    <h5 class="">{{ $row->title }}</h5>
                    <div>{{ $row->created_at->format('d/m/Y | h:iA') }}</div>
                </div>
                <p><strong>Nama Mata Kuliah:</strong> {{ $row->nama_matkul }}</p>
                <p><strong>Batas Waktu:</strong>
                    {{ $row->batas_waktu ? \Carbon\Carbon::parse($row->batas_waktu)->format('d/m/Y | h:iA') : 'Tidak ditentukan' }}
                </p>
                <p>{{ Str::words($row->description, 13, '...') }}</p>
                <div class="btns text-end">
                    <a href="{{ route('post#show', $row->id) }}" class="text-decoration-none">
                        <button class="btn btn-sm btn-primary">
                            Lihat
                        </button>
                    </a>
                    <a href="{{ route('post#edit', $row->id) }}" class="text-decoration-none">
                        <button class="btn btn-sm btn-warning">
                            Edit
                        </button>
                    </a>
                    <a href="{{ route('post#delete', $row->id) }}" class="text-decoration-none">
                        <button class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </a>
                </div>
            </div>

            @endforeach
            {{-- Pagination from AppServiceProvider --}}
            {{ $data->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
