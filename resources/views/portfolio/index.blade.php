<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with JohnDoe landing page.">
  <meta name="author" content="Devcrud">
  <title>{{ isset($title) ? $title : 'Ali Shoddiqien | Protfolio' }}</title>
  <!-- font icons -->
  <link rel="stylesheet" href="{{ asset('pub-template/assets/vendors/themify-icons/css/themify-icons.css') }}">
  <!-- Bootstrap + JohnDoe main styles -->
  <link rel="stylesheet" href="{{ asset('pub-template/assets/css/johndoe.css') }}">

  {{-- mdi icon --}}
  <link rel="stylesheet" href="{{ asset('adm-template/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
  {{-- <a href="components.html" class="btn btn-primary btn-component" data-spy="affix" data-offset-top="600"><i
      class="ti-shift-left-alt"></i> Components</a> --}}
  <header class="header">
    <div class="container">
      <ul class="social-icons pt-3">
        @foreach ($socialMedias as $socialMedia)
          <li class="social-item">
            <a class="social-link text-light" href="{{ $socialMedia['link'] }}" target="_blank">
              <i class="{{ $socialMedia['icon'] }} mdi-24px" aria-hidden="true"></i>
            </a>
          </li>
        @endforeach
      </ul>
      <div class="header-content">
        <h4 class="header-subtitle">{{ $intro['greeting'] }}</h4>
        <h1 class="header-title">{{ $intro['intro'] }}</h1>
        <h6 class="header-mono">
          @foreach ($skillLists as $skillList)
            {{ $skillList['skill'] }} | {{ ' ' }}
          @endforeach
        </h6>
        <a href="{{ $elevator['cv'] }}" class="btn btn-primary btn-rounded" target="_blank"><i
            class="ti-download pr-2"></i>Download My CV</a>
      </div>
    </div>
  </header>
  <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white" data-spy="affix" data-offset-top="510">
    <div class="container">
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse mt-sm-20 navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="#home" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#about" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="#resume" class="nav-link">Resume</a>
          </li>
        </ul>
        <ul class="navbar-nav brand">
          <img src="{{ asset('pub-template/assets/imgs/avatar.jpg') }}" alt="" class="brand-img">
          <li class="brand-txt">
            <h5 class="brand-title">{{ $intro['intro'] }}</h5>
            <div class="brand-subtitle">
              @foreach ($skillLists as $skillList)
                {{ $skillList['skill'] }} | {{ ' ' }}
              @endforeach
            </div>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="#service" class="nav-link">Services</a>
          </li>
          <li class="nav-item">
            <a href="#portfolio" class="nav-link">Portfolio</a>
          </li>
          <li class="nav-item last-item">
            <a href="#contact" class="nav-link">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div id="about" class="row about-section">
      <div class="col-lg-4 about-card">
        <h3 class="font-weight-light">Who am I ?</h3>
        <span class="line mb-5"></span>
        <h5 class="mb-3">{{ $elevator['title'] }}</h5>
        <p class="mt-20">
          {{ ucfirst($elevator['elevator']) }}
        </p>
        <a href="{{ $elevator['cv'] }}" target="_blank" class="btn btn-outline-danger"><i
            class="icon-down-circled2 "></i>Download My CV</a>
      </div>
      <div class="col-lg-4 about-card">
        <h3 class="font-weight-light">Personal Info</h3>
        <span class="line mb-5"></span>
        <ul class="mt40 info list-unstyled">
          <li><span>Birthdate</span> : {{ $personalInfo['birthdate'] }}</li>
          <li><span>Email</span> : {{ $personalInfo['email'] }}</li>
          <li><span>Phone</span> : {{ $personalInfo['phone'] }} <span class="text-muted">(+62 for outside
              Indonesia)</span></li>
          <li><span>Address</span> : {{ $personalInfo['address'] }}</li>
        </ul>
        <ul class="social-icons pt-3">
          @foreach ($socialMedias as $socialMedia)
            <li class="social-item">
              <a class="social-link" href="{{ $socialMedia['link'] }}" target="_blank">
                <i class="{{ $socialMedia['icon'] }} mdi-24px" aria-hidden="true"></i>
              </a>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="col-lg-4 about-card">
        <h3 class="font-weight-light">My Expertise</h3>
        <span class="line mb-5"></span>
        @foreach ($expertises as $expertise)
          <div class="row">
            <div class="col-1 text-danger pt-1"><i class="{{ $expertise['icon'] }} mdi-36px"></i></div>
            <div class="col-10 ml-auto mr-3">
              <h6>{{ $expertise['expertise'] }}</h6>
              <p class="subtitle"> {{ ucfirst($expertise['description']) }}</p>
              <hr>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <!--Resume Section-->
  <section class="section" id="resume">
    <div class="container">
      <h2 class="mb-5"><span class="text-danger">My</span> Resume</h2>
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="card">
            <div class="card-header">
              <div class="mt-2">
                <h4>Work Experiences</h4>
                <span class="line"></span>
              </div>
            </div>
            <div class="card-body">
              @foreach ($experiences as $experience)
                <h6 class="title text-danger">{{ $experience['low'] }}</h6>
                <P>{{ $experience['position'] }}</P>
                <P class="subtitle">
                  {{ ucfirst($experience['description']) }}
                </P>
                <hr>
              @endforeach
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="mt-2">
                <h4>Certifiation</h4>
                <span class="line"></span>
              </div>
            </div>
            <div class="card-body">
              <h6 class="title text-danger">Junior Web Programmer (BNSP)</h6>
              <P>Agustus 2022 - Agustus 2025</P>
              <P class="subtitle">
                The BSNP (Badan Sertifikasi Nasional Profesi) awards this certificate for the competence of a junior web
                programmer.
              </P>
              <hr>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card">
            <div class="card-header">
              <div class="mt-2">
                <h4>Education</h4>
                <span class="line"></span>
              </div>
            </div>
            <div class="card-body">
              @foreach ($educations as $education)
                <h6 class="title text-danger">{{ $education['los'] }}</h6>
                <P>{{ $education['education'] }}</P>
                <P class="subtitle">
                  {{ ucfirst($education['description']) }}
                </P>
                <hr>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <div class="pull-left">
                <h4 class="mt-2">Skills</h4>
                <span class="line"></span>
              </div>
            </div>
            <div class="card-body pb-2">
              @foreach ($abilities as $ability)
                <h6>{{ $ability['skill'] }}</h6>
                <div class="progress mb-3">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $ability['level'] }}%"
                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="pull-left">
                <h4 class="mt-2">Languages</h4>
                <span class="line"></span>
              </div>
            </div>
            <div class="card-body pb-2">
              @foreach ($languages as $language)
                <h6>{{ ucfirst($language['languages']) }}</h6>
                <div class="progress mb-3">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $language['level'] }}%"
                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section bg-dark py-5">
    <div class="container text-center">
      <h2 class="text-light font-weight-normal">I Am Available For FreeLance</h2>
    </div>
  </section>

  <section class="section" id="service">
    <div class="container">
      <h2 class="mb-4 pb-4"><span class="text-danger">My</span> Services</h2>
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <div class="card mb-5">
            <div class="card-header has-icon">
              <i class="ti-write text-danger" aria-hidden="true"></i>
            </div>
            <div class="card-body px-4 py-3">
              <h5 class="mb-3 card-title text-dark">Web Development</h5>
              <P class="subtitle">
                You want to create a website or a website-based application. You can rely on me as a web developer to
                create websites and applications that will help you promote your business and simplify your operations.
                You don't have to wait any longer. I have these abilities, as evidenced by the attachments to my
                portfolio.
              </P>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="card mb-5">
            <div class="card-header has-icon">
              <i class="ti-vector text-danger" aria-hidden="true"></i>
            </div>
            <div class="card-body px-4 py-3">
              <h5 class="mb-3 card-title text-dark">Graphic Design</h5>
              <P class="subtitle">
                I have over four years of experience in the digital printing industry, and I am capable of designing a
                product to produce printed products for promotional purposes, among other things. You can hire me as a
                coworker if you need a design for print media.
              </P>
              <br>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="card mb-5">
            <div class="card-header has-icon">
              <i class="ti-support text-danger" aria-hidden="true"></i>
            </div>
            <div class="card-body px-4 py-3">
              <h5 class="mb-3 card-title text-dark">Consultation</h5>
              <P class="subtitle">
                You have a problem in the world of advertising design or a website application that you want to make a
                reality. You should not be hesitant to discuss it with me, and I will gladly provide the best input to
                solve problems with my skills and experience.
              </P>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section class="section bg-custom-gray" id="portfolio">
    <div class="container">
      <h1 class="mb-5"><span class="text-danger">My</span> Portfolio</h1>
      <div class="portfolio">
        <div class="filters">
          <a href="#" data-filter=".all" class="active">
            All
          </a>
          <a href="#" data-filter=".web">
            Web
          </a>
          <a href="#" data-filter=".graphic">
            Graphic
          </a>
          <a href="#" data-filter=".etc">
            Etc
          </a>
        </div>
        <div class="portfolio-container">
          @foreach ($portfolios as $portfolio)
            <div class="col-md-6 col-lg-4 {{ strtolower($portfolio->getCategory['category']) }} new all">
              <div class="portfolio-item">
                <img src="{{ asset('image/' . $portfolio['image']) }}" class="img-fluid"
                  alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                <div class="content-holder">
                  <a class="img-popup" href="{{ asset('image/' . $portfolio['image']) }}"></a>
                  <div class="text-holder">
                    <h6 class="title">{{ ucwords($portfolio->getCategory['category']) }}</h6>
                    <div class="subtitle text-white bg-light p-2 rounded mb-2">
                      {!! $portfolio['description'] !!}
                    </div>
                    @if ($portfolio['public'] == 'none' && $portfolio['admin'] == 'none')
                      <a href="#" class="btn btn-light">Preview not available</a>
                    @else
                      @if ($portfolio['public'] != 'none')
                        <a href="{{ $portfolio['public'] }}" class="btn btn-light" target="_blank">Visit admin
                          page</a>
                      @endif
                      @if ($portfolio['admin'] != 'none')
                        <a href="{{ $portfolio['admin'] }}" class="btn btn-light" target="_blank">Visit public
                          page</a>
                      @endif
                    @endif
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <!-- End of portfolio section -->

  <div class="section contact bg-warning" id="contact">
    {{-- <div id="map" class="map"></div> --}}
    <div class="container">
      <div class="row">
        {{-- <div class="col-lg-8">
          <div class="contact-form-card">
            <h4 class="contact-title">Send a message</h4>
            <form action="">
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Name *" required>
              </div>
              <div class="form-group">
                <input class="form-control" type="email" placeholder="Email *" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" id=" placeholder="Message *" rows="7" required></textarea>
              </div>
              <div class="form-group ">
                <button type="submit" class="form-control btn btn-primary">Send Message</button>
              </div>
            </form>
          </div>
        </div> --}}
        <div class="col">
          <div class="contact-info-card">
            <h4 class="contact-title">Get in touch</h4>
            <div class="row mb-2">
              <div class="col-1 pt-1 mr-1">
                <i class="ti-mobile icon-md"></i>
              </div>
              <div class="col-10 ">
                <h6 class="d-inline">Phone : <br> <span class="text-muted">
                    {{ $personalInfo['phone'] }} (+62)
                </h6>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-1 pt-1 mr-1">
                <i class="ti-map-alt icon-md"></i>
              </div>
              <div class="col-10">
                <h6 class="d-inline">Address :<br> <span class="text-muted">{{ $personalInfo['address'] }}</span>
                </h6>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-1 pt-1 mr-1">
                <i class="ti-envelope icon-md"></i>
              </div>
              <div class="col-10">
                <h6 class="d-inline">Email :<br> <span class="text-muted">{{ $personalInfo['email'] }}</span></h6>
              </div>
            </div>
            <ul class="social-icons pt-4 mx-auto">
              @foreach ($socialMedias as $socialMedia)
                <li class="social-item">
                  <a class="social-link text-lidarkght" href="{{ $socialMedia['link'] }}" target="_blank">
                    <i class="{{ $socialMedia['icon'] }} mdi-24px" aria-hidden="true"></i>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
  <footer class="footer py-3">
    <div class="container">
      <p class="small mb-0 text-light">
        Ali Shoddiqien &copy;
        <script>
          document.write(new Date().getFullYear())
        </script> Created With <i class="ti-heart text-danger"></i> By <a href="http://devcrud.com"
          target="_blank"><span class="text-danger" title="Bootstrap 4 Themes and Dashboards">DevCRUD</span></a>
      </p>
    </div>
  </footer>

  <!-- core  -->
  <script src="{{ asset('pub-template/assets/vendors/jquery/jquery-3.4.1.js') }}"></script>
  <script src="{{ asset('pub-template/assets/vendors/bootstrap/bootstrap.bundle.js') }}"></script>

  <!-- bootstrap 3 affix -->
  <script src="{{ asset('pub-template/assets/vendors/bootstrap/bootstrap.affix.js') }}"></script>

  <!-- Isotope  -->
  <script src="{{ asset('pub-template/assets/vendors/isotope/isotope.pkgd.js') }}"></script>

  <!-- Google mpas -->
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

  <!-- JohnDoe js -->
  <script src="{{ asset('pub-template/assets/js/johndoe.js') }}"></script>

</body>

</html>
