@extends('admin.layouts.master')
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-comment-multiple-outline"></i>
          </span> {{ isset($title) ? ucwords($title) : 'Dashboard' }}
        </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ isset($title) ? ucwords($title) : 'Dashboard' }}
            </li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Elevator Pitch</h3>
              <p class="card-description"> Information about elevator pitch </p>
              <div class="p-4 border border-info rounded">
                <h5>{{ $elevator['title'] }}</h5>
                <p>
                  {{ $elevator['elevator'] }}
                </p>
                <a href="{{ $elevator['cv'] }}" class="btn btn-gradient-info me-2" target="_blank">View CV</a>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn btn-gradient-primary btn-lg btn-block" data-bs-toggle="modal"
                    data-bs-target="#elevator-pitch">Edit</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="elevator-pitch" data-bs-backdrop="static" data-bs-keyboard="false"
                  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Elevator Pich</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" method="POST" action="{{ route('about.update', [$elevator['id']]) }}">
                          @csrf
                          @method('PATCH')
                          <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control shadow-sm" name="title" placeholder="Header Title"
                              value="{{ $elevator['title'] }}">
                          </div>
                          <div class="form-group">
                            <label for="elevator">Elevator Text</label>
                            <textarea class="form-control shadow-sm" name="elevator" cols="30" rows="10">{{ $elevator['elevator'] }}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="cv">GD Link CV Document</label>
                            <input type="text" class="form-control shadow-sm" name="cv"
                              placeholder="GD Link CV Document" value="{{ $elevator['cv'] }}">
                          </div>
                          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                          <button type="reset" class="btn btn-light" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
              </div>
              @if (!$elevator)
                <form class="forms-sample mt-5" method="POST" action="{{ route('about.store') }}">
                  @csrf
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control shadow-sm" id="title" name="title"
                      placeholder="Header Title">
                  </div>
                  <div class="form-group">
                    <label for="elevator">Elevator Text</label>
                    <textarea class="form-control shadow-sm" id="elevator" name="elevator" cols="30" rows="10"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="cv">GD Link CV Document</label>
                    <input type="text" class="form-control shadow-sm" id="cv" name="cv"
                      placeholder="GD Link CV Document">
                  </div>
                  <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              @endif
            </div>
          </div>
        </div>

        {{-- personal info --}}
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Personal Info</h3>
              <p class="card-description"> Information about me </p>
              <div class="p-4 border border-info rounded">
                <ul class="list-ticked">
                  <li>
                    <span class="font-weight-bold">Birtdate: </span>{{ $personalInfo['birthdate'] }}
                  </li>
                  <li>
                    <span class="font-weight-bold">Email: </span>{{ $personalInfo['email'] }}
                  </li>
                  <li>
                    <span class="font-weight-bold">Phone: </span>{{ $personalInfo['phone'] }}
                  </li>
                  <li>
                    <span class="font-weight-bold">Address: </span>{{ $personalInfo['address'] }}
                  </li>
                </ul>
                <div class="text-center">
                  <a href="#" class="btn btn-gradient-primary btn-lg btn-block" data-bs-toggle="modal"
                    data-bs-target="#personal-info">Edit</a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="personal-info" data-bs-backdrop="static" data-bs-keyboard="false"
                  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Personal Info</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" method="POST" action="{{ route('about.editPersonalInfo', 1) }}">
                          @csrf
                          @method('PATCH')
                          <div class="form-group">
                            <label for="birthdate">Birthdate</label>
                            <input type="text" class="form-control shadow-sm" name="birthdate" placeholder="Birthdate" value="{{ $personalInfo['birthdate'] }}">
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control shadow-sm" name="email" placeholder="Email" value="{{ $personalInfo['email'] }}">
                          </div>
                          <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control shadow-sm" name="phone" placeholder="Phone" value="{{ $personalInfo['phone'] }}">
                          </div>
                          <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control shadow-sm" name="address" placeholder="Address" value="{{ $personalInfo['address'] }}">
                          </div>
                          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                          <button class="btn btn-light" type="button" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
              </div>
              @if (!$personalInfo)
                <form class="forms-sample mt-5" method="POST" action="{{ route('about.addPersonalInfo') }}">
                  @csrf
                  <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="text" class="form-control shadow-sm" name="birthdate" placeholder="Birthdate">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control shadow-sm" name="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control shadow-sm" name="phone" placeholder="Phone">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control shadow-sm" name="address" placeholder="Address">
                  </div>
                  <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              @endif
            </div>
          </div>
        </div>

        {{-- My Expertise --}}
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">My Expertise</h3>
              <p class="card-description"> Information my expertise </p>
              <div class="mb-5 p-4 border border-info rounded">
                @foreach ($expertises as $expertise)
                  <div class="d-flex p-4 shadow align-items-top">
                    <button type="button" class="btn btn-gradient-info btn-rounded btn-icon me-3">
                      <i class="{{ $expertise['icon'] }}"></i>
                    </button>
                    <div class="mb-0 flex-grow">
                      <h5 class="me-2 mb-2">{{ $expertise['expertise'] }}</h5>
                      <p class="mb-0 font-weight-light">
                        {{ ucfirst($expertise['description']) }}
                      </p>
                    </div>
                    <div class="ms-auto">
                      <button type="button" class="btn btn-inverse-dark btn-icon" data-bs-toggle="modal"
                        data-bs-target="#expertise{{ $expertise['id'] }}">
                        <i class="mdi mdi-tooltip-edit"></i>
                      </button>
                    </div>
                  </div>                    
                  <!-- Modal -->
                  <div class="modal fade" id="expertise{{ $expertise['id'] }}" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Expertise Info</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form class="forms-sample" method="POST" action="{{ route('about.editExpertise', [$expertise['id']]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                              <label for="icon">Icon</label>
                              <input type="text" class="form-control shadow-sm" name="icon" placeholder="Icon" value="{{ $expertise['icon'] }}">
                            </div>
                            <div class="form-group">
                              <label for="expertise">Expertise</label>
                              <input type="text" class="form-control shadow-sm" name="expertise" placeholder="Expertise" value="{{ $expertise['expertise'] }}">
                            </div>
                            <div class="form-group">
                              <label for="description">Description</label>
                              <input type="text" class="form-control shadow-sm" name="description" placeholder="Description" value="{{ $expertise['description'] }}">
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal -->
                @endforeach
              </div>
              <form class="forms-sample" method="POST" action="{{ route('about.addExpertise') }}">
                @csrf
                <div class="form-group">
                  <label for="icon">Icon</label>
                  <input type="text" class="form-control shadow-sm" name="icon"
                    placeholder="Icon">
                </div>
                <div class="form-group">
                  <label for="expertise">Expertise</label>
                  <input type="text" class="form-control shadow-sm" name="expertise"
                    placeholder="Expertise">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control shadow-sm" name="description"
                    placeholder="Description">
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
@endsection

@push('addon-js')
  <!-- plugins:js -->
  <script src="{{ asset('adm-template/assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('adm-template/assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('adm-template/assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('adm-template/assets/js/misc.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="{{ asset('adm-template/assets/js/file-upload.js') }}"></script>
  <!-- End custom js for this page -->

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    $(function() {
      @if ($message = Session::get('success'))
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: "{!! $message !!}",
        })
      @elseif ($message = Session::get('error'))
        Swal.fire({
          icon: 'error',
          title: 'Opps..',
          text: "{!! $message !!}",
        })
      @endif
    });
  </script>
@endpush
