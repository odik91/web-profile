@extends('admin.layouts.master')
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-human-handsup"></i>
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
              <h4 class="card-title">Introduction</h4>
              <p class="card-description"> Basic form elements </p>
              <div class="mb-5 p-4 border border-info rounded">
                <h5>{{ isset($intro['greeting']) ? $intro['greeting'] : 'Hello, I am' }}</h5>
                <p>
                  {{ isset($intro['intro']) ? $intro['intro'] : 'Ali Shoddiqien' }}
                </p>
                <div class="text-center">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#indtroduction">
                    Edit
                  </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="indtroduction" data-bs-backdrop="static" data-bs-keyboard="false"
                  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Introdution</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" method="POST" action="{{ route('intro.update', [$intro['id']]) }}">
                          @csrf
                          @method('PATCH')
                          <div class="form-group">
                            <label for="greeting">Greeting Word</label>
                            <input type="text" class="form-control shadow-sm" id="greeting" name="greeting"
                              placeholder="Greeting Word" value="{{ $intro['greeting'] }}">
                          </div>
                          <div class="form-group">
                            <label for="intro">Intro</label>
                            <input type="text" class="form-control shadow-sm" id="intro" name="intro"
                              placeholder="Intro" value="{{ $intro['intro'] }}">
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                              aria-label="Close">Cancel</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->

              </div>
              @if (!isset($intro['greeting']) || !isset($intro['intro']))
                <form class="forms-sample" method="POST" action="{{ route('intro.store') }}">
                  @csrf
                  <div class="form-group">
                    <label for="greeting">Greeting Word</label>
                    <input type="text" class="form-control shadow-sm" id="greeting" name="greeting"
                      placeholder="Greeting Word">
                  </div>
                  <div class="form-group">
                    <label for="intro">Intro</label>
                    <input type="text" class="form-control shadow-sm" id="intro" name="intro"
                      placeholder="Intro">
                  </div>
                  <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                  <button type="reset" class="btn btn-light">Cancel</button>
                </form>
              @endif
            </div>
          </div>
        </div>
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Skill lists</h4>
              <table class="table table-striped table-hover table-responsive">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Skill</th>
                    <th>Icon</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($introSkills as $key => $introSkill)
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{ ucwords($introSkill['skill']) }}</td>
                      <td><i class="{{ $introSkill['icon'] }} mdi-36px"></i></td>
                      <td>
                        <button type="button" class="btn btn-gradient-info btn-rounded btn-icon" data-bs-toggle="modal"
                          data-bs-target="#skill{{ $introSkill['id'] }}">
                          <i class="mdi mdi-tooltip-edit"></i>
                        </button>
                        <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon"
                          data-bs-toggle="modal" data-bs-target="#delete-skill{{ $introSkill['id'] }}">
                          <i class="mdi mdi-delete"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="delete-skill{{ $introSkill['id'] }}" data-bs-backdrop="static"
                          data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                          aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header bg-gradient-danger">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Skill</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <p class="text-center">Are you sure want to delete
                                  <strong>{{ $introSkill['skill'] }}</strong> ?
                                </p>
                              </div>
                              <div class="modal-footer">
                                <form action="{{ route('intro.deleteSkill', [$introSkill['id']]) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-gradient-primary me-2 shadow">Delete</button>
                                  <button type="button" class="btn btn-light shadow" data-bs-dismiss="modal"
                                    aria-label="Close">Cancel</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal -->
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <hr>

              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Skills</h4>
                  <form class="forms-sample" method="POST" action="{{ route('intro.addSkill') }}">
                    @csrf
                    <div class="row">
                      <div class="col-md-4">
                        <input type="text" class="form-control shadow-lg" placeholder="Skill Name"
                          aria-label="Skill Name" id="skill" name="skill">
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form-control shadow-lg" placeholder="Icon" aria-label="icon"
                          id="icon" name="icon">
                      </div>
                      <div class="col-md-4">
                        <button type="submit" id="skill-form"
                          class="btn btn-gradient-primary me-2 shadow">Submit</button>
                        <button type="reset" class="btn btn-light shadow">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              @foreach ($introSkills as $key => $introSkill)
                <!-- Modal -->
                <div class="modal fade" id="skill{{ $introSkill['id'] }}" data-bs-backdrop="static"
                  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Skill</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" method="POST"
                          action="{{ route('intro.editSkill', [$introSkill['id']]) }}">
                          @csrf
                          @method('PATCH')
                          <div class="row">
                            <div class="form-group">
                              <label for="skill">Skill</label>
                              <input type="text" class="form-control shadow-lg" placeholder="Skill Name"
                                aria-label="Skill Name" name="skill" value="{{ $introSkill['skill'] }}">
                            </div>
                            <div class="form-group">
                              <label for="icon">Icon</label>
                              <input type="text" class="form-control shadow-lg" placeholder="Icon"
                                aria-label="icon" name="icon" value="{{ $introSkill['icon'] }}">
                            </div>
                            <div class="form-group">
                              <button type="submit" id="skill-form"
                                class="btn btn-gradient-primary me-2 shadow">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
              @endforeach

            </div>
          </div>
        </div>
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Social Media</h4>
              <table class="table table-striped table-hover table-responsive">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Social Media</th>
                    <th>Icon</th>
                    <th>Link</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sosmeds as $key => $sosmed)
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{ ucwords($sosmed['social_media']) }}</td>
                      <td><i class="{{ $sosmed['icon'] }} mdi-36px text-info"></i></td>
                      <td>{{ $sosmed['link'] }}</td>
                      <td>
                        <button type="button" class="btn btn-gradient-info btn-rounded btn-icon"
                          data-bs-toggle="modal" data-bs-target="#sosmed{{ $sosmed['id'] }}">
                          <i class="mdi mdi-tooltip-edit"></i>
                        </button>
                        <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon" data-bs-toggle="modal" data-bs-target="#delete-sosmed{{ $sosmed['id'] }}">
                          <i class="mdi mdi-delete"></i>
                        </button>

                        <!-- Modal edit -->
                        <div class="modal fade" id="sosmed{{ $sosmed['id'] }}" data-bs-backdrop="static"
                          data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                          aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Skill</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form class="forms-sample" method="POST"
                                  action="{{ route('intro.editSosmed', [$sosmed['id']]) }}">
                                  @csrf
                                  @method('PATCH')
                                  <div class="form-group">
                                    <label for="skill">Social Media</label>
                                    <input type="text" class="form-control shadow-lg" placeholder="Social Media"
                                      aria-label="Social Media" name="social-media"
                                      value="{{ $sosmed['social_media'] }}">
                                  </div>
                                  <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <input type="text" class="form-control shadow-lg" placeholder="Icon"
                                      aria-label="icon" name="icon" value="{{ $sosmed['icon'] }}">
                                  </div>
                                  <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text" class="form-control shadow-lg" placeholder="Link"
                                      aria-label="link"name="link" value="{{ $sosmed['link'] }}">
                                  </div>
                                  <div class="form-group text-center">
                                    <button type="submit" name="submit"
                                      class="btn btn-gradient-primary me-2">Submit</button>
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                                      aria-label="Close">Cancel</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal -->

                        <!-- Modal delete -->
                        <div class="modal fade" id="delete-sosmed{{ $sosmed['id'] }}" data-bs-backdrop="static"
                          data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                          aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header bg-gradient-danger">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Skill</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <p class="text-center">Are you sure want to delete
                                  <strong>{{ $sosmed['social_media'] }}</strong> ?
                                </p>
                              </div>
                              <div class="modal-footer">
                                <form action="{{ route('deleteSosmed', [$sosmed['id']]) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-gradient-primary me-2 shadow">Delete</button>
                                  <button type="button" class="btn btn-light shadow" data-bs-dismiss="modal"
                                    aria-label="Close">Cancel</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal -->
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <hr>

              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Social Media</h4>
                  <form class="forms-sample" method="POST" action="{{ route('intro.addSosmed') }}">
                    @csrf
                    <div class="row">
                      <div class="form-group">
                        <input type="text" class="form-control shadow-lg" placeholder="Social Media"
                          aria-label="Social Media" id="social-media" name="social-media">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control shadow-lg" placeholder="Icon" aria-label="icon"
                          id="icon" name="icon">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control shadow-lg" placeholder="Link" aria-label="link"
                          id="link" name="link">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-gradient-primary me-2 shadow">Submit</button>
                        <button type="reset" class="btn btn-light shadow">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
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
