
<header id="header" class="header fixed-top d-flex align-items-center" style="background-color: #0d6efd;  ">

    <style>
        .logo-container {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .logo-text {
            color: black;
            margin-left: 10px;
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ url('admin/dashboard') }}" class="logo-container">
            <img src="{{ asset('assets/img/12345.jpg') }}" class="avatar" alt="Avatar">
            <span class="d-none d-lg-block logo-text" style="color: black; font-weight: bold; font-size: 25px;">MAO</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>


    <!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

            <div class="nav-profile d-flex align-items-center pe-0">
                <span class="d-none d-md-block mt-2" style="margin-right: 10px; color: black; font-weight: bold;">
                    @if (Auth::check())
                        <h6 style="margin-right: 10px; color: black; font-weight: bold;">{{ Auth::user()->name }}</h6>
                    @endif
                </span>

                @if (Auth::check() && Auth::user()->image)
                <img src="data:image/jpeg;base64,{{ Auth::user()->image }}" alt="Avatar" class="rounded-circle" style="width: 50px; height: 50px;">
            @else
                <img src="{{ asset('path_to_default_image.jpg') }}" alt="Default Profile" class="rounded-circle" style="margin-right: 10px;">
            @endif

            </div>


        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

    </header>
<style>
    .nav-profile:hover span {
    background-color: #0d6efd;
}

</style>

