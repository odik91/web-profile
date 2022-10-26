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
                <div class="d-flex m-3 mb-0 align-items-top border border-light shadow-sm p-3">
                  <div class="mb-0 flex-grow">
                    <h5 class="me-2 mb-2">2018 - 2022</h5>
                    <h6 class="me-2 mb-2 text-muted">Job Position</h6>
                    <p class="mb-0 font-weight-light">It is a long established fact that a reader will be distracted by
                      the readable content of a page.</p>
                  </div>
                  <div class="ms-auto">
                    <button type="button" class="btn btn-inverse-danger btn-icon" data-bs-toggle="modal"
                      data-bs-target="#experience1">
                      <i class="mdi mdi-tooltip-edit"></i>
                    </button>
                  </div>

                  <!-- Modal -->
                  <div class="modal fade" id="experience1" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Working Experience</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form class="forms-sample">
                            <div class="form-group">
                              <label for="low">Length of work</label>
                              <input type="text" class="form-control shadow-sm" id="low" name="low"
                                placeholder="Length of work">
                            </div>
                            <div class="form-group">
                              <label for="position">Position</label>
                              <input type="text" class="form-control shadow-sm" id="position" name="position"
                                placeholder="Position">
                            </div>
                            <div class="form-group">
                              <label for="description">Description</label>
                              <textarea class="form-control shadow-sm" id="description" name="description" cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" name="submit-low" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal -->

                </div>
                <div class="d-flex m-3 mb-0 align-items-top border border-light shadow-sm p-3">
                  <div class="mb-0 flex-grow">
                    <h5 class="me-2 mb-2">2018 - 2022</h5>
                    <h6 class="me-2 mb-2 text-muted">Job Position</h6>
                    <p class="mb-0 font-weight-light">It is a long established fact that a reader will be distracted by
                      the readable content of a page.</p>
                  </div>
                  <div class="ms-auto">
                    <button type="button" class="btn btn-inverse-danger btn-icon">
                      <i class="mdi mdi-tooltip-edit"></i>
                    </button>
                  </div>
                </div>
                <div class="d-flex m-3 mb-0 align-items-top border border-light shadow-sm p-3">
                  <div class="mb-0 flex-grow">
                    <h5 class="me-2 mb-2">2018 - 2022</h5>
                    <h6 class="me-2 mb-2 text-muted">Job Position</h6>
                    <p class="mb-0 font-weight-light">It is a long established fact that a reader will be distracted by
                      the readable content of a page.</p>
                  </div>
                  <div class="ms-auto">
                    <button type="button" class="btn btn-inverse-danger btn-icon">
                      <i class="mdi mdi-tooltip-edit"></i>
                    </button>
                  </div>
                </div>
              </div>
              <form class="forms-sample">
                <div class="form-group">
                  <label for="low">Length of work</label>
                  <input type="text" class="form-control shadow-sm" id="low" name="low"
                    placeholder="Length of work">
                </div>
                <div class="form-group">
                  <label for="position">Position</label>
                  <input type="text" class="form-control shadow-sm" id="position" name="position"
                    placeholder="Position">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control shadow-sm" id="description" name="description" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" name="submit-low" class="btn btn-gradient-primary me-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
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
                <div class="d-flex m-3 mb-0 align-items-top border border-light shadow-sm p-3">
                  <div class="mb-0 flex-grow">
                    <h5 class="me-2 mb-2">2018 - 2022</h5>
                    <h6 class="me-2 mb-2 text-muted">School / Collage</h6>
                    <p class="mb-0 font-weight-light">It is a long established fact that a reader will be distracted by
                      the readable content of a page.</p>
                  </div>
                  <div class="ms-auto">
                    <button type="button" class="btn btn-inverse-danger btn-icon" data-bs-toggle="modal"
                      data-bs-target="#education1">
                      <i class="mdi mdi-tooltip-edit"></i>
                    </button>
                  </div>

                  <!-- Modal -->
                  <div class="modal fade" id="education1" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Education</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form class="forms-sample">
                            <div class="form-group">
                              <label for="los">Length of study</label>
                              <input type="text" class="form-control shadow-sm" id="los" name="los"
                                placeholder="Length of study">
                            </div>
                            <div class="form-group">
                              <label for="education">Education</label>
                              <input type="text" class="form-control shadow-sm" id="education" name="education"
                                placeholder="Education">
                            </div>
                            <div class="form-group">
                              <label for="description">Description</label>
                              <textarea class="form-control shadow-sm" id="description" name="description" cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" name="submit-los"
                              class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal -->
                </div>
                <div class="d-flex m-3 mb-0 align-items-top border border-light shadow-sm p-3">
                  <div class="mb-0 flex-grow">
                    <h5 class="me-2 mb-2">2018 - 2022</h5>
                    <h6 class="me-2 mb-2 text-muted">School / Collage</h6>
                    <p class="mb-0 font-weight-light">It is a long established fact that a reader will be distracted by
                      the readable content of a page.</p>
                  </div>
                  <div class="ms-auto">
                    <button type="button" class="btn btn-inverse-danger btn-icon">
                      <i class="mdi mdi-tooltip-edit"></i>
                    </button>
                  </div>
                </div>
                <div class="d-flex m-3 mb-0 align-items-top border border-light shadow-sm p-3">
                  <div class="mb-0 flex-grow">
                    <h5 class="me-2 mb-2">2018 - 2022</h5>
                    <h6 class="me-2 mb-2 text-muted">School / Collage</h6>
                    <p class="mb-0 font-weight-light">It is a long established fact that a reader will be distracted by
                      the readable content of a page.</p>
                  </div>
                  <div class="ms-auto">
                    <button type="button" class="btn btn-inverse-danger btn-icon">
                      <i class="mdi mdi-tooltip-edit"></i>
                    </button>
                  </div>
                </div>
              </div>
              <form class="forms-sample">
                <div class="form-group">
                  <label for="los">Length of study</label>
                  <input type="text" class="form-control shadow-sm" id="los" name="los"
                    placeholder="Length of study">
                </div>
                <div class="form-group">
                  <label for="education">Education</label>
                  <input type="text" class="form-control shadow-sm" id="education" name="education"
                    placeholder="Education">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control shadow-sm" id="description" name="description" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" name="submit-los" class="btn btn-gradient-primary me-2">Submit</button>
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
                        <tr>
                          <td>1</td>
                          <td>test 1</td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <button type="button" class="btn btn-gradient-info btn-rounded btn-icon"
                              data-bs-toggle="modal" data-bs-target="#ability1">
                              <i class="mdi mdi-tooltip-edit"></i>
                            </button>
                            <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>test 2</td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <button type="button" class="btn btn-gradient-info btn-rounded btn-icon">
                              <i class="mdi mdi-tooltip-edit"></i>
                            </button>
                            <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>test 3</td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <button type="button" class="btn btn-gradient-info btn-rounded btn-icon">
                              <i class="mdi mdi-tooltip-edit"></i>
                            </button>
                            <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="ability1" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Skill and Ability</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="forms-sample">
                        <div class="form-group">
                          <label for="skill">Skill</label>
                          <input type="text" class="form-control shadow-sm" id="skill" name="skill"
                            placeholder="Skill">
                        </div>
                        <div class="form-group">
                          <label for="level">Level in Percentage</label>
                          <input type="number" min="0" class="form-control shadow-sm" id="level"
                            name="level" placeholder="Level in Percentage">
                        </div>
                        <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal -->

              <form class="forms-sample">
                <div class="form-group">
                  <label for="skill">Skill</label>
                  <input type="text" class="form-control shadow-sm" id="skill" name="skill"
                    placeholder="Skill">
                </div>
                <div class="form-group">
                  <label for="level">Level in Percentage</label>
                  <input type="number" min="0" class="form-control shadow-sm" id="level" name="level"
                    placeholder="Level in Percentage">
                </div>
                <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
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
                        <tr>
                          <td>1</td>
                          <td>test 1</td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <button type="button" class="btn btn-gradient-info btn-rounded btn-icon"
                              data-bs-toggle="modal" data-bs-target="#ability1">
                              <i class="mdi mdi-tooltip-edit"></i>
                            </button>
                            <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>test 2</td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <button type="button" class="btn btn-gradient-info btn-rounded btn-icon">
                              <i class="mdi mdi-tooltip-edit"></i>
                            </button>
                            <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>test 3</td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <button type="button" class="btn btn-gradient-info btn-rounded btn-icon">
                              <i class="mdi mdi-tooltip-edit"></i>
                            </button>
                            <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <!-- Modal -->
                    <div class="modal fade" id="ability1" data-bs-backdrop="static" data-bs-keyboard="false"
                      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Languages</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form class="forms-sample">
                              <div class="form-group">
                                <label for="languages">Languages</label>
                                <input type="text" class="form-control shadow-sm" id="languages" name="languages"
                                  placeholder="Languages">
                              </div>
                              <div class="form-group">
                                <label for="level">Level in Percentage</label>
                                <input type="number" min="0" class="form-control shadow-sm" id="level" name="level"
                                  placeholder="Level in Percentage">
                              </div>
                              <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Submit</button>
                              <button class="btn btn-light">Cancel</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal -->

                  </div>
                </div>
              </div>

              <form class="forms-sample">
                <div class="form-group">
                  <label for="languages">Languages</label>
                  <input type="text" class="form-control shadow-sm" id="languages" name="languages"
                    placeholder="Languages">
                </div>
                <div class="form-group">
                  <label for="level">Level in Percentage</label>
                  <input type="number" min="0" class="form-control shadow-sm" id="level" name="level"
                    placeholder="Level in Percentage">
                </div>
                <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Submit</button>
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
@endpush
