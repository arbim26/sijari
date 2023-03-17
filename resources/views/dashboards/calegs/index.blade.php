@extends('layouts.admin')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible" role="alert">
  {{$message}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
  <h5 class="card-header">Daftar Caleg</h5>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Caleg</h5>
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
