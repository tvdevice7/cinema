@extends('master') @section('content')
<section style="background: url('sources/img/photogrid.jpg') center center repeat; background-size: cover;" class="bar background-white relative-positioned">
  <div class="container">
    <!-- SLIDER Start-->
    <div class="home-carousel">
      <div class="dark-mask mask-primary"></div>
      <div class="container">
        <div class="homepage owl-carousel">
          <div class="item">
            <div class="row">
              <div class="col-md-5 text-right">
                <p>
                  <img src="sources/img/logo.png" alt="" class="ml-auto">
                </p>
                <h1>THÔNG TIN KHUYẾN MÃI MỚI NHẤT</h1>
                <p>SẼ nằm
                  <br>ở chỗ này</p>
              </div>
              <div class="col-md-7">
                <img src="sources/img/template-homepage.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="item">
            <div class="row">
              <div class="col-md-7 text-center">
                <img src="sources/img/template-mac.png" alt="" class="img-fluid">
              </div>
              <div class="col-md-5">
                <h2>46 HTML pages full of features</h2>
                <ul class="list-unstyled">
                  <li>Sliders and carousels</li>
                  <li>4 Header variations</li>
                  <li>Google maps, Forms, Megamenu, CSS3 Animations and much more</li>
                  <li>+ 11 extra pages showing template features</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="row">
              <div class="col-md-5 text-right">
                <h1>Design</h1>
                <ul class="list-unstyled">
                  <li>Clean and elegant design</li>
                  <li>Full width and boxed mode</li>
                  <li>Easily readable Roboto font and awesome icons</li>
                  <li>7 preprepared colour variations</li>
                </ul>
              </div>
              <div class="col-md-7">
                <img src="sources/img/template-easy-customize.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="item">
            <div class="row">
              <div class="col-md-7">
                <img src="sources/img/template-easy-code.png" alt="" class="img-fluid">
              </div>
              <div class="col-md-5">
                <h1>Easy to customize</h1>
                <ul class="list-unstyled">
                  <li>7 preprepared colour variations.</li>
                  <li>Easily to change fonts</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END SLIDER -->
  </div>
</section>


<section class="bar bg-gray no-mb text-md-center">
  <div class="container">
    <ul id="pills-tab" role="tablist" class="nav nav-pills nav-justified">
      <li class="nav-item">
        <a id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"
          class="nav-link">PHIM ĐANG CHIẾU</a>
      </li>
      <li class="nav-item">
        <a id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"
          class="nav-link active">PHIM SẮP CHIẾU</a>
      </li>
      
    </ul>
    <div id="pills-tabContent" class="tab-content">
      <div id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" class="tab-pane fade show active">
        <h1>phim đang chiếu để vô đây </h1>
      </div>
      <div id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" class="tab-pane fade">
        <h1>phim sắp chiếu để vô đây </h1>
    </div>
      
    </div>
  </div>
</section>


<section style="background: url('sources/img/fixed-background-2.jpg') center top no-repeat; background-size: cover;" class="bar no-mb color-white text-center bg-fixed relative-positioned">
  <div class="dark-mask"></div>
  <div class="container">
    <div class="icon icon-outlined icon-lg">
      <i class="fa fa-file-code-o"></i>
    </div>
    <h3 class="text-uppercase">Bạn muốn nhận ưu đãi?</h3>
    <p class="lead">Hãy đăng ký thành viên để được hưởng những khuyến mãi hấp dẫn nhất! </p>
    <p class="text-center">
      <a href="dang-ky" class="btn btn-template-outlined-white btn-lg">Đăng ký ngay</a>
    </p>
  </div>
</section>

@endsection