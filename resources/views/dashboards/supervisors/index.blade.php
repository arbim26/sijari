@extends('layouts.admin')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible" role="alert">
  {{$message}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
  <div class="d-flex card-header justify-content-between align-items-center">
    <div>
      <h5>Daftar Supervisor</h5> 
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
              <h5 class="modal-title" id="exampleModalLabel1">Tambah Caleg</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('create.supervisor')}}" method="POST">
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col mb-3">
                    <label for="nameBasic"  class="form-label">Nama</label>
                    <input required type="text" id="nameBasic" name="name" class="form-control" placeholder="Maukkan Nama">
                  </div>
                </div>
                <div class="row">
                  <div class="col mb-3">
                    <label for="emailBasic"  class="form-label">Email</label>
                    <input required type="text" id="emailBasic" name="email" class="form-control" placeholder="xxxx@xxx.xx">
                  </div>
                </div>
                <div class="row">
                  <div class="col mb-0 form-password-toggle">
                    <label for="passwordBasic"  class="form-label">Password</label>
                    <div class="input-group input-group-merge">
                      <input id="password" type="password" name="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Password">
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                  Batal
                </button>
                <button type="submit" class="btn btn-primary">Selseai</button>
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
          <th>Nama</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($data as $row)            
        <tr>
          <td>{{$row->name}}</td>
          <td>{{$row->email}}</td>
          <td style="display: flex; gap: 20px" >
            <form class="d-flex gap-4 " onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengguna.destroy', $row->id) }}" method="POST">
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Supervisor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ route('pengguna.update', $row->id) }}" method="POST">
              <div class="modal-body">
                  @method('PUT')
                  @csrf
                  <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" id="defaultFormControlInput" value="{{$row->name}}" aria-describedby="defaultFormControlHelp">
                  </div>
                  <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="defaultFormControlInput" value="{{$row->email}}" aria-describedby="defaultFormControlHelp">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
