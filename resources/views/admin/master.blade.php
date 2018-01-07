   @include('admin.include.head')
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Admin Panel</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      @include('admin.include.sidebar')
      @include('admin.include.header')
      
      
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container">
         @yield('mainContent')
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <!-- footer-->
    @include('admin.include.footer')
    
    
  </div>

