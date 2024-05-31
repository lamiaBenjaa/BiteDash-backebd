@include('components.head')

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <!-- Layout container -->
    <div class="layout-container">
      <!-- Menu -->
      @include('components.sideBar')

      <!-- Layout page -->
      <div class="layout-page">
        <!-- Navbar -->
        @include('components.nav')

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <div class="m-3">
            @if(session()->has('success'))
             <x-alert type='success'>
                {{session('success')}}
             </x-alert>
          @endif
          </div>
          @yield('content')

          <hr class="my-5" />

          @include('components.footer')
        </div>
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
  </div>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  @include('components.scripts')


</body>

</html>
