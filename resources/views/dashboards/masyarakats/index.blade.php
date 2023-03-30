@extends('layouts.admin')

@section('content')
<style>
  .drop-zone {
  max-width: 100%;
  height: 200px;
  padding: 25px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  font-family: "Quicksand", sans-serif;
  font-weight: 500;
  font-size: 20px;
  cursor: pointer;
  color: #cccccc;
  border: 4px dashed #CDCDCD;
  border-radius: 10px;
}

.drop-zone--over {
  border-style: solid;
}

.drop-zone__input {
  display: none;
}

.drop-zone__thumb {
  width: 100%;
  height: 100%;
  border-radius: 10px;
  overflow: hidden;
  background-color: #cccccc;
  background-size: cover;
  position: relative;
}

.drop-zone__thumb::after {
  content: attr(data-label);
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  padding: 5px 0;
  color: #ffffff;
  background: rgba(0, 0, 0, 0.75);
  font-size: 14px;
  text-align: center;
}
</style>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible" role="alert">
  {{$message}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@error($errors->any()  )
<div class="alert alert-danger alert-dismissible" role="alert">
  {{$message}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror
@error('nik')
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
      <h5>Daftar Masyarakat</h5> 
    </div>
    <div>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
        Tambah  <i class="bx bx-plus"></i>
      </button>

      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#upload">
        Import Excel  <i class="bx bx-upload"></i>
      </button>

      <!-- Modal -->
      <div class="modal fade" id="upload" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Tambah Masyarakat</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('masyarakat.import')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="drop-zone">
                  <span class="drop-zone__prompt">Drop file here or click to upload</span>
                  <input type="file" name="file" class="drop-zone__input">
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
      <!-- Modal -->
      <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Tambah Masyarakat</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('create.caleg')}}" method="POST">
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
          <th>NIK</th>
          <th>Nama</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($data as $row)            
        <tr>
          <td>{{$row->nik}}</td>
          <td>{{$row->nama}}</td>
          <td><span class="badge bg-label-primary me-1">Active</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengguna.destroy', $row->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <div>
                    <button type="button"  class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$row->id}}">
                      <i class="bx bx-edit-alt me-1"></i>Edit
                    </button>
                  </div>
                  <div>
                    <button  class="dropdown-item" >
                      <i class="bx bx-trash me-1"></i> Delete
                    </button> 
                  </div>
                </form>
              </div>
            </div>
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
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Selasai</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
    <div class="ms-4 mt-3">
      {{ $data->links('vendor.pagination.simple-bootstrap-5') }}
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
  document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
  const dropZoneElement = inputElement.closest(".drop-zone");

  dropZoneElement.addEventListener("click", (e) => {
    inputElement.click();
  });

  inputElement.addEventListener("change", (e) => {
    if (inputElement.files.length) {
      updateThumbnail(dropZoneElement, inputElement.files[0]);
    }
  });

  dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZoneElement.classList.add("drop-zone--over");
  });

  ["dragleave", "dragend"].forEach((type) => {
    dropZoneElement.addEventListener(type, (e) => {
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  dropZoneElement.addEventListener("drop", (e) => {
    e.preventDefault();

    if (e.dataTransfer.files.length) {
      inputElement.files = e.dataTransfer.files;
      updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
    }

    dropZoneElement.classList.remove("drop-zone--over");
  });
});

/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {
  let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

  // First time - remove the prompt
  if (dropZoneElement.querySelector(".drop-zone__prompt")) {
    dropZoneElement.querySelector(".drop-zone__prompt").remove();
  }

  // First time - there is no thumbnail element, so lets create it
  if (!thumbnailElement) {
    thumbnailElement = document.createElement("div");
    thumbnailElement.classList.add("drop-zone__thumb");
    dropZoneElement.appendChild(thumbnailElement);
  }

  thumbnailElement.dataset.label = file.name;

  // Show thumbnail for image files
  if (file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.readAsDataURL(file);
    reader.onload = () => {
      thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
    };
  } else {
    thumbnailElement.style.backgroundImage = null;
  }
}
</script>
@endsection

