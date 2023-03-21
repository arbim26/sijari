@extends('layouts.admin')

@section('content')
<!-- Table within card -->
{{-- <h3 class="mb-4">Partai</h3> --}}
<br>
<a href="{{ route('partai.create') }}" class="btn btn-md btn-success mb-3">Tambah Partai</a>
<div class="card">
<div class="table-responsive text-nowrap">
  <table class="table card-table">
    <thead>
      <tr>
        <th>Nama Partai</th>
        <th>Ketua Partai</th>
        <th>Logo</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    @foreach ($data as $row)
    <tbody class="table-border-bottom-0">
      <tr>
        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$row->nama_partai}}</strong></td>
        <td>{{$row->ketua_partai}}</td>
        <td>
          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="{{$row->image}}">
              <img src="{{ Storage::url('public/partais/').$row->image }}" alt="Avatar" class="rounded-circle">
            </li>
          </ul>
        </td>
        <td><span class="badge bg-label-primary me-1">Active</span></td>
        <td>
          <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
            <div class="dropdown-menu">
              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('partai.destroy', $row->id) }}" method="POST">
              <a class="dropdown-item" href="{{ route('partai.edit', $row->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn"><i class="bx bx-trash me-1"></i> Delete</button>
              {{-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> --}}
              </form>
            </div>
          </div>
        </td>
      </tr>
      @endforeach
      {{-- <tr>
        <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>React Project</strong></td>
        <td>Barry Hunter</td>
        <td>
          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
              <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
              <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
              <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
            </li>
          </ul>
        </td>
        <td><span class="badge bg-label-success me-1">Completed</span></td>
        <td>
          <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>VueJs Project</strong></td>
        <td>Trevor Baker</td>
        <td>
          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
              <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
              <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
              <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
            </li>
          </ul>
        </td>
        <td><span class="badge bg-label-info me-1">Scheduled</span></td>
        <td>
          <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap Project</strong></td>
        <td>Jerry Milton</td>
        <td>
          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
              <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
              <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
              <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
            </li>
          </ul>
        </td>
        <td><span class="badge bg-label-warning me-1">Pending</span></td>
        <td>
          <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
            </div>
          </div>
        </td>
      </tr> --}}
      {{-- @empty
          <div class="alert alert-danger">
              Data Partai belum Tersedia.
          </div>
      @endforelse --}}
    </tbody>
  </table>
  {{ $data->links() }}
</div>
<!--/ Table within card -->
@endsection
