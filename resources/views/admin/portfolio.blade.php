@extends('admin.layouts.master')
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-barley menu-icon"></i>
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
        {{-- Category --}}
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Category</h3>
              <p class="card-description"> Information about category portfolio </p>
              <div class="mb-5 pb-3 border border-info rounded">
                @foreach ($categories as $category)
                  <div class="d-flex m-3 mb-0 align-items-top border border-light shadow-sm p-3">
                    <div class="mb-0 flex-grow">
                      <h5 class="me-2 mb-2">Category:</h5>
                      <h6 class="me-2 mb-2 text-muted">{{ ucfirst($category['category']) }}</h6>
                    </div>
                    <div class="ms-auto">
                      <button type="button" class="btn btn-inverse-info btn-icon" data-bs-toggle="modal"
                        data-bs-target="#category{{ $category['id'] }}">
                        <i class="mdi mdi-tooltip-edit mdi-24px"></i>
                      </button>
                      <button type="button" class="btn btn-inverse-danger btn-icon" data-bs-toggle="modal"
                        data-bs-target="#delete-cat-{{ $category['id'] }}">
                        <i class="mdi mdi mdi-delete-forever mdi-24px"></i>
                      </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="category{{ $category['id'] }}" data-bs-backdrop="static"
                      data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form class="forms-sample" method="POST"
                              action="{{ route('portfolio.update', [$category['id']]) }}">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                <label for="edit-category">Category</label>
                                <input type="text"
                                  class="form-control shadow-sm @error('edit-category') is-invalid @enderror"
                                  name="edit-category" placeholder="Category" value="{{ $category['category'] }}">
                                @error('edit-category')
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

                    <!-- Modal -->
                    <div class="modal fade" id="delete-cat-{{ $category['id'] }}" data-bs-backdrop="static"
                      data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header bg-gradient-danger">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p class="text-center">Are you sure want to delete
                              <strong> {{ $category['category'] }}</strong> ?
                            </p>
                          </div>
                          <div class="modal-footer">
                            <form action="{{ route('portfolio.destroy', [$category['id']]) }}" method="post">
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
                  </div>
                @endforeach
              </div>
              <form class="forms-sample" method="POST" action="{{ route('portfolio.store') }}">
                @csrf
                <div class="form-group">
                  <label for="category">Category</label>
                  <input type="text" class="form-control shadow-sm @error('category') is-invalid @enderror"
                    name="category" placeholder="Category" value="{{ old('category') }}">
                  @error('category')
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

        {{-- Portfolio --}}
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Portfolio</h4>
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Public Page</th>
                      <th>Admin Page</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($portfolios as $ey => $portfolio)
                      <tr>
                        <td>{{ ++$ey }}</td>
                        <td>{{ $portfolio->getCategory['category'] }}</td>
                        <td>{!! $portfolio['description'] !!}</td>
                        <td>
                          <img src="{{ asset('image/' . $portfolio['image']) }}" alt="">
                        </td>
                        <td>{{ $portfolio['public'] }}</td>
                        <td>{{ $portfolio['admin'] }}</td>
                        <td>
                          <button type="button" class="btn btn-gradient-info btn-rounded btn-icon"
                            data-bs-toggle="modal" data-bs-target="#portfolio{{ $portfolio['id'] }}">
                            <i class="mdi mdi-tooltip-edit"></i>
                          </button>
                          <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon"
                            data-bs-toggle="modal" data-bs-target="#delete-portfolio{{ $portfolio['id'] }}">
                            <i class="mdi mdi-delete"></i>
                          </button>

                          <!-- Modal edit -->
                          <div class="modal fade" id="portfolio{{ $portfolio['id'] }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Portfolio</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form class="forms-sample" method="POST"
                                    action="{{ route('portfolio.editPortfolio', [$portfolio['id']]) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                      <label for="category">Category</label>
                                      <select name="category" class="form-control form-control-sm shadow-lg">
                                        @foreach ($categories as $category)
                                          <option value="{{ $category['id'] }}"
                                            {{ $portfolio['category_id'] == $category['id'] ? 'selected' : '' }}>
                                            {{ ucfirst($category['category']) }}
                                          </option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="description">Description</label>
                                      <textarea name="description" class="ckeditor shadow-lg" cols="30" rows="10">{{ $portfolio['description'] }}</textarea>
                                    </div>
                                    <div class="form-group">
                                      <label for="image">Image</label>
                                      <input type="file" class="form-control shadow-lg"
                                        placeholder="{{ $portfolio['image'] }}" aria-label="image" name="image"
                                        accept="image/*">
                                    </div>
                                    <div class="form-group">
                                      <label for="public">Public Page</label>
                                      <input type="text" class="form-control shadow-lg" placeholder="Public Page"
                                        aria-label="public" name="public" value="{{ $portfolio['public'] }}">
                                    </div>
                                    <div class="form-group">
                                      <label for="admin">Admin Page</label>
                                      <input type="text" class="form-control shadow-lg" placeholder="Admin Page"
                                        aria-label="admin" name="admin" value="{{ $portfolio['admin'] }}">
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
                          <div class="modal fade" id="delete-portfolio{{ $portfolio['id'] }}"
                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header bg-gradient-danger">
                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Portfolio</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <p class="text-center">
                                    Are you sure want to delete this portfolio?
                                  </p>
                                </div>
                                <div class="modal-footer">
                                  <form action="{{ route('portfolio.deletePortfolio', [$portfolio['id']]) }}" method="post">
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
              </div>

              <hr>

              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Portfolio</h4>
                  <form class="forms-sample" method="POST" action="{{ route('portfolio.addPortfolio') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category"
                          class="form-control form-control-sm shadow-lg @error('category') is-invalid @enderror">
                          <option selected disabled>Select Category</option>
                          @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}">{{ ucfirst($category['category']) }}</option>
                          @endforeach
                        </select>
                        @error('edit-category')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="ckeditor shadow-lg @error('description') is-invalid @enderror"></textarea>
                        @error('description')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control shadow-lg @error('image') is-invalid @enderror"
                          placeholder="Image" aria-label="image" name="image" accept="image/*">
                        @error('image')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="public">Public Page</label>
                        <input type="text" class="form-control shadow-lg @error('public') is-invalid @enderror"
                          placeholder="Public Page" aria-label="public" name="public">
                        @error('public')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="admin">Admin Page</label>
                        <input type="text" class="form-control shadow-lg @error('admin') is-invalid @enderror"
                          placeholder="Admin Page" aria-label="admin" name="admin">
                        @error('admin')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
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

@push('addon-css')
@endpush

@push('addon-js')
  <!-- plugins:js -->
  <script src="{{ asset('adm-template/assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('adm-template/assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('adm-template/assets/js/hoverable-collapse.js') }}"></script>
  {{-- <script src="{{ asset('adm-template/assets/js/misc.js') }}"></script> --}}
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="{{ asset('adm-template/assets/js/file-upload.js') }}"></script>
  <!-- End custom js for this page -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  {{-- ckeditor --}}
  <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

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

    $(document).ready(function() {
      $('.ckeditor').ckeditor()
    })
  </script>
@endpush
