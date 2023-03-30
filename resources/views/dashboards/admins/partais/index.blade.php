@extends('layouts.admin')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible" role="alert">
  {{$message}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@error('name')
<div class="alert alert-danger alert-dismissible" role="alert">
  {{$message}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror
@error('email')
<div class="alert alert-danger alert-dismissible" role="alert">
  {{$message}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror
@error('password')
<div class="alert alert-danger alert-dismissible" role="alert">
  {{$message}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror

<div class="card">
  <div class="d-flex card-header justify-content-between align-items-center">
    <div>
      <h5>Partai</h5> 
    </div>
    <div>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
        Tambah  <i class="bx bx-plus"></i>
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Tambah Partai</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col mb-3">
                    <label for="nameBasic"  class="form-label">Nama Partai</label>
                    <input required type="text" id="nameBasic" name="p_nama" class="form-control" placeholder="Masukkan Nama Partai">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                  Batal
                </button>
                <button type="submit" class="btn btn-primary">Selesai</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      {{-- Modal --}}
    </div>
  </div>
  <div class="table-responsive text-nowrap">
    
    <table class="table">
      <thead>
        <tr>
          <th>Nama Partai</th>
          
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($data as $row)            
        <tr>
          <td>{{$row->p_nama}}</td>
          <td style="display: flex; gap: 20px" >
            <form class="d-flex gap-4 " onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('partai.destroy', $row->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$row->id}}">
                  <i class="bx bx-edit-alt me-1"></i>Edit
                </button>
              </div>
              <div>
                <button class="btn btn-danger">
                  <i class="bx bx-trash me-1"></i> Delete
                </button> 
              </div>
            </form>
          </td>
        </tr>

        <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Partai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ route('partai.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                  @method('PUT')
                  @csrf
                  <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">Nama Partai</label>
                    <input type="text" class="form-control" name="p_nama" id="defaultFormControlInput" value="{{$row->p_nama}}" aria-describedby="defaultFormControlHelp">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Selasai</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @empty
        <div class="alert alert-danger alert-dismissible" role="alert">
          Belum ada data
        </div>
        @endforelse
      </tbody>
    </table>
  </div>
</div>


@endsection
