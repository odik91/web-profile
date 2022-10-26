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
        {{-- Working experience --}}
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Working Experience</h3>
              <p class="card-description"> Information about experience </p>
              <div class="mb-5 pb-3 border border-info rounded">
                @foreach ($experiences as $experience)
                  <div class="d-flex m-3 mb-0 align-items-top border border-light shadow-sm p-3">
                    <div class="mb-0 flex-grow">
                      <h5 class="me-2 mb-2">{{ $experience['low'] }}</h5>
                      <h6 class="me-2 mb-2 text-muted">{{ $experience['position'] }}</h6>
                      <p class="mb-0 font-weight-light">
                        {{ ucfirst($experience['description']) }}
                      </p>
                    </div>
                    <div class="ms-auto">
                      <button type="button" class="btn btn-inverse-danger btn-icon" data-bs-toggle="modal"
                        data-bs-target="#experience{{ $experience['id'] }}">
                        <i class="mdi mdi-tooltip-edit"></i>
                      </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="experience{{ $experience['id'] }}" data-bs-backdrop="static"
                      data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Working Experience</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form class="forms-sample" method="POST"
                              action="{{ route('resume.update', [$experience['id']]) }}">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                <label for="low">Length of work</label>
                                <input type="text" class="form-control shadow-sm" name="low"
                                  placeholder="Length of work" value="{{ $experience['low'] }}">
                              </div>
                              <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" class="form-control shadow-sm shadow-sm " name="position"
                                  placeholder="Position" value="{{ $experience['position'] }}">
                              </div>
                              <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control shadow-sm shadow-sm" name="description" cols="30" rows="10">{{ $experience['description'] }}</textarea>
                                @error('description')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                              <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                              <button type="reset" class="btn btn-light">Cancel</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal -->
                  </div>
                @endforeach
              </div>
              <form class="forms-sample" method="POST" action="{{ route('resume.store') }}">
                @csrf
                <div class="form-group">
                  <label for="low">Length of work</label>
                  <input type="text" class="form-control shadow-sm @error('low') is-invalid @enderror" name="low"
                    placeholder="Length of work" value="{{ old('low') }}">
                  @error('low')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="position">Position</label>
                  <input type="text" class="form-control shadow-sm shadow-sm @error('position') is-invalid @enderror"
                    name="position" placeholder="Position" value="{{ old('position') }}">
                  @error('position')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control shadow-sm shadow-sm @error('description') is-invalid @enderror" name="description"
                    cols="30" rows="10">{{ old('description') }}</textarea>
                  @error('description')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                <button type="reset" class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>

        {{-- Education --}}
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Education</h3>
              <p class="card-description"> Information about education </p>
              <div class="mb-5 pb-3 border border-info rounded">
                @foreach ($educations as $education)
                  <div class="d-flex m-3 mb-0 align-items-top border border-light shadow-sm p-3">
                    <div class="mb-0 flex-grow">
                      <h5 class="me-2 mb-2">{{ $education['los'] }}</h5>
                      <h6 class="me-2 mb-2 text-muted">{{ $education['education'] }}</h6>
                      <p class="mb-0 font-weight-light">
                        {!! nl2br($education['description']) !!}
                      </p>
                    </div>
                    <div class="ms-auto">
                      <button type="button" class="btn btn-inverse-danger btn-icon" data-bs-toggle="modal"
                        data-bs-target="#education{{ $education['id'] }}">
                        <i class="mdi mdi-tooltip-edit"></i>
                      </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="education{{ $education['id'] }}" data-bs-backdrop="static"
                      data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                      aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Education</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form class="forms-sample" method="POST"
                              action="{{ route('resume.editEducation', [$education['id']]) }}">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                <label for="los">Length of study</label>
                                <input type="text" class="form-control shadow-sm" name="los"
                                  placeholder="Length of study" value="{{ $education['los'] }}">
                              </div>
                              <div class="form-group">
                                <label for="education">Education</label>
                                <input type="text" class="form-control shadow-sm" name="education"
                                  placeholder="Education" value="{{ $education['education'] }}">
                              </div>
                              <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control shadow-sm" name="description" cols="30" rows="10">{{ $education['description'] }}</textarea>
                              </div>
                              <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                              <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal -->
                  </div>
                @endforeach
              </div>
              <form class="forms-sample" method="POST" action="{{ route('resume.addEducation') }}">
                @csrf
                <div class="form-group">
                  <label for="los">Length of study</label>
                  <input type="text" class="form-control shadow-sm @error('los') is-invalid @enderror"
                    name="los" placeholder="Length of study" value="{{ old('los') }}">
                  @error('los')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="education">Education</label>
                  <input type="text" class="form-control shadow-sm @error('education') is-invalid @enderror"
                    name="education" value="{{ old('education') }}" placeholder="Education">
                  @error('education')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control shadow-sm @error('description') is-invalid @enderror" name="description" cols="30"
                    rows="10">{{ old('education') }}</textarea>
                  @error('education')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>

        {{-- Ability --}}
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Skill and Ability</h3>
              <p class="card-description"> Information about sill and ability </p>

              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Skill</th>
                          <th>Ability</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($abilities as $key => $ability)
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $ability['skill'] }}</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-success" role="progressbar"
                                  style="width: {{ $ability['level'] }}%" aria-valuenow="{{ $ability['level'] }}"
                                  aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>
                              <button type="button" class="btn btn-gradient-info btn-rounded btn-icon"
                                data-bs-toggle="modal" data-bs-target="#ability{{ $ability['id'] }}">
                                <i class="mdi mdi-tooltip-edit"></i>
                              </button>
                              <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon">
                                <i class="mdi mdi-delete"></i>
                              </button>
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="ability{{ $ability['id'] }}" data-bs-backdrop="static"
                              data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                              aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Skill and Ability</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form class="forms-sample" method="POST"
                                      action="{{ route('resume.editAbility', [$ability['id']]) }}">
                                      @csrf
                                      @method('PUT')
                                      <div class="form-group">
                                        <label for="skill">Skill</label>
                                        <input type="text" class="form-control shadow-sm" name="skill"
                                          placeholder="Skill" value="{{ $ability['skill'] }}">
                                      </div>
                                      <div class="form-group">
                                        <label for="level">Level in Percentage</label>
                                        <input type="number" min="0" class="form-control shadow-sm"
                                          name="level" placeholder="Level in Percentage"
                                          value="{{ $ability['level'] }}">
                                      </div>
                                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                      <button type="button" class="btn btn-light" class="btn-close"
                                        data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Modal -->
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <form class="forms-sample" method="POST" action="{{ route('resume.addAbility') }}">
                @csrf
                <div class="form-group">
                  <label for="skill">Skill</label>
                  <input type="text" class="form-control shadow-sm @error('skill') is-invalid @enderror"
                    name="skill" placeholder="Skill">
                  @error('skill')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="level">Level in Percentage</label>
                  <input type="number" min="0"
                    class="form-control shadow-sm @error('level') is-invalid @enderror" name="level"
                    placeholder="Level in Percentage">
                  @error('level')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                <button type="reset" class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>

        {{-- Languages --}}
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Languages</h3>
              <p class="card-description"> Information about languages </p>

              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Languages</th>
                          <th>Ability</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($languages as $key => $language)
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $language['languages'] }}</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-success" role="progressbar"
                                  style="width: {{ $language['level'] }}%" aria-valuenow="{{ $language['level'] }}"
                                  aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>
                              <button type="button" class="btn btn-gradient-info btn-rounded btn-icon"
                                data-bs-toggle="modal" data-bs-target="#ability{{ $language['id'] }}">
                                <i class="mdi mdi-tooltip-edit"></i>
                              </button>
                              <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon">
                                <i class="mdi mdi-delete"></i>
                              </button>
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="ability{{ $language['id'] }}" data-bs-backdrop="static"
                              data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                              aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Languages</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form class="forms-sample" method="POST"
                                      action="{{ route('resume.editLanguage', [$language['id']]) }}">
                                      <div class="form-group">
                                        <label for="languages">Languages</label>
                                        <input type="text" class="form-control shadow-sm" name="languages"
                                          placeholder="Languages" value="{{ $language['languages'] }}">
                                      </div>
                                      <div class="form-group">
                                        <label for="level">Level in Percentage</label>
                                        <input type="number" min="0" class="form-control shadow-sm"
                                          name="level" placeholder="Level in Percentage"
                                          value="{{ $language['level'] }}">
                                      </div>
                                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                      <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Modal -->
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <form class="forms-sample" method="POST" action="{{ route('resume.addLanguage') }}">
                @csrf
                <div class="form-group">
                  <label for="languages">Languages</label>
                  <input type="text" class="form-control shadow-sm" name="languages" placeholder="Languages">
                </div>
                <div class="form-group">
                  <label for="level">Level in Percentage</label>
                  <input type="number" min="0" class="form-control shadow-sm" name="level"
                    placeholder="Level in Percentage">
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                <button type="reset" class="btn btn-light">Cancel</button>
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
