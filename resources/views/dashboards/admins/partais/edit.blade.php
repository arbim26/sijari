@extends('layouts.admin')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
{{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4> --}}

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tambah Partai</h5> <small class="text-muted float-end">Default Partai</small>
      </div>
      <div class="card-body">
        <form action="{{ route('partai.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nama Partai</label>
            <input type="text" class="form-control @error('nama_partai') is-invalid @enderror" name="nama_partai" value="{{ old('nama_partai', $data->nama_partai) }}" placeholder="Masukkan Nama Partai" />

            <!-- error message untuk title -->
            @error('nama_partai')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Ketua Partai</label>
            <input type="text" class="form-control @error('ketua_partai') is-invalid @enderror" name="ketua_partai" value="{{ old('ketua_partai', $data->ketua_partai) }}" placeholder="Masukkan Ketua Partai" />

            <!-- error message untuk title -->
            @error('ketua_partai')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label class="form-label" for="basic-default-email">Logo Partai</label>
            <div class="input-group input-group-merge">
              <input type="file" id="basic-default-email" class="form-control" name="image" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2" />

              {{-- <span class="input-group-text" id="basic-default-email2">@example.com</span> --}}
            </div>
            {{-- <div class="form-text"> You can use letters, numbers & periods </div> --}}
          </div>
          {{-- <div class="mb-3">
            <label class="form-label" for="basic-default-phone">Phone No</label>
            <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="658 799 8941" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-message">Message</label>
            <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
          </div> --}}
          <button type="submit" class="btn btn-md btn-primary">Send</button>
          <button type="reset" class="btn btn-md btn-warning">Reset</button>
        </form>
      </div>
    </div>
  </div>
</div>

          </div>
          <!-- / Content -->


@endsection
