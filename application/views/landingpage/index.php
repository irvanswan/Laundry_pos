<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="favicon" sizes="76x76" href="<?= base_url('assets/img/favicon.png'); ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.png'); ?>">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Landing Page Kuy Laundry</title>


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">


  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/boxicons.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/owl.carousel.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/venobox.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/aos.css') ?>" rel="stylesheet">


  <link href="<?= base_url('assets/css/stylel.css') ?>" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header-transparent">
    <div class="container">

      <div id="logo" class="pull-left">
        <h2 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin-top: -7px;"><a href="<?= base_url('index.php') ?>">KUY LAUNDRY</a>
        </h2>

      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="<?= base_url('index.php') ?>">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Feature</a></li>
          <li><a href="#team">Testimoni</a></li>
          <li><a href="#portfolio">Contact</a></li>
          <li><a href="<?= base_url('auth') ?>">Login</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Welcome to Kuy Laundry</h1>
      <h2>Semuanya mudah dengan Kuy Laundry</h2>
      <a href="#about" class="btn-get-started">Pelajari</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up" data-aos-anchor-placement="center-center">
        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <h2 class="title">About Us</h2>
            <p>
              Kuy Laundry adalah sistem yang membantu usaha Laundry dengan aplikasi berbasis
              web. Adanya Kuy Laudry pekerjaan yang menumpuk akan lebih diselesaikan dengan
              mudah dan cepat. Didukung dengan sistem jadwal cuci maka pencucian akan terasa
              lebih terarah dan termanajemen.
            </p>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fa fa-file-text-o"></i></div>
              <h4 class="title"><a href="">Bingung Laporan Banyak?</a></h4>
              <p class="description">Tenang, Kuy Laundry sudah memiliki laporan didalam website, jadi anda tidak
                perlu report lagi soal laporan.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="fa fa-files-o"></i></div>
              <h4 class="title"><a href="">Cetak Struk?</a></h4>
              <p class="description">Kuy Laundry juga dibekali cetak struk sehingga tidak perlu repot lagi kunjungan
                customer.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="fa fa-question"></i></div>
              <h4 class="title"><a href="">Masih Ragu</a></h4>
              <p class="description">Yuk scroll kebawah lagi, lebih banyak fiturnya loh!</p>
            </div>

          </div>

          <div class="col-lg-6 background order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100"></div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Kontribusi</h3>
          <p class="section-description">Kami sudah berkontibusi untuk pengusaha laundry dengan nilai dibawah ini</p>
        </div>
        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">232</span>
            <p>Klien</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">521</span>
            <p>Transaksi</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">700</span>
            <p>Customer</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">300</span>
            <p>Membership</p>
          </div>

        </div>

      </div>
    </section><!-- End Facts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Feature</h3>
          <p class="section-description">Kami memiliki beberapa fitur yang dapat memudahkan pekerjaan anda</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-desktop"></i></a></div>
              <h4 class="title"><a href="">Manajemen Penghasilan</a></h4>
              <p class="description">Anda dapat memanage omzet dari kunjungan customer dan ongkos</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-user-md"></i></a></div>
              <h4 class="title"><a href="">Absen Pegawai</a></h4>
              <p class="description">Anda dapat memanage dan memantau bagaimana pegawai anda saat bekerja</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-whatsapp"></i></a></div>
              <h4 class="title"><a href="">Kirim Pesan</a></h4>
              <p class="description">Anda dapat mengirim pesan melalui Whatsapp dan secara realtime</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-dropbox"></i></a></div>
              <h4 class="title"><a href="">Stok Barang</a></h4>
              <p class="description">Anda dapat memanage stok barang sesuai dengan kebutuhan outlet, asyik kan?</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-money"></i></a></div>
              <h4 class="title"><a href="">Pengeluaran</a></h4>
              <p class="description">Pengeluaran laundry dapat dikelola dengan fitur ini, aman, dan cepat</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-user-secret"></i></a></div>
              <h4 class="title"><a href="">Gaji</a></h4>
              <p class="description">Kelola gaji outletmu dengan fitur ini dan dapatkan banyak manfaatnya</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <section id="call-to-action">
      <div class="container">
        <div class="row" data-aos="zoom-in">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Penasaran Kan?</h3>
            <p class="cta-text">Masih banyak lo fitur-fiturnya kuy lihat testimoni dulu
              produk</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#team">Click Aja !</a>
          </div>
        </div>

      </div>
    </section>

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Testimoni</h3>
          <p class="section-description">Apa kata mereka?</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url('assets/img/team-1.jpg') ?>" alt=""></div>
              <h4>Mbak Laura</h4>
              <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum quaerat commodi id fugit, dolor
                officia provident cupiditate a eveniet fuga.</span>

            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="200" data-aos-anchor-placement="center-center">
              <div class="pic"><img src="<?= base_url('assets/img/team-2.jpg') ?>" alt=""></div>
              <h4>Mas David</h4>
              <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus minus neque reiciendis
                corporis, magni modi tenetur commodi voluptate cupiditate ipsam!</span>

            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="pic"><img src="<?= base_url('assets/img/team-3.jpg') ?>" alt=""></div>
              <h4>Mbak Victoria</h4>
              <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus earum voluptate commodi nisi placeat
                officia aperiam accusamus facilis? Natus, ea.</span>

            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="pic"><img src="<?= base_url('assets/img/team-4.jpg') ?>" alt=""></div>
              <h4>Mas Osas</h4>
              <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam deleniti quam nostrum? Tempore
                aperiam, non esse minima fuga beatae eos.</span>

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Produk</h3>
          <p class="section-description">Tunggu sebentar, kami juga menjual barang menarik yang bermanfaat bagi anda</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <!-- <li data-filter="*" class="filter-active">Alat</li> -->
              <!-- <li data-filter=".filter-app">Alat</li>
              <li data-filter=".filter-card">Tools</li>
              <li data-filter=".filter-web">Bahan</li> -->
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-4 col-md-6 portfolio-item filter-app text-center">
            <img src="<?= base_url('assets/img/portfolio/fingerp.png') ?>" class="img-fluid text-center" alt="">
            <div class="portfolio-info">
              <h4>Finger print</h4>
              <!-- <p>App</p> -->
              <!-- <a href="assets/img/portfolio/printer_mini.png" data-gall="portfolioGallery" class="venobox preview-link"
                title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> -->
            </div>
          </div>

          <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/portfolio/scanner_b.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="assets/img/portfolio/fingerp.png" data-gall="portfolioGallery" class="venobox preview-link"
                title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/printer_mini.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 2</h4>
              <p>App</p>
              <a href="assets/img/portfolio/scanner_b.png" data-gall="portfolioGallery" class="venobox preview-link"
                title="App 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div> -->

          <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/fingerp.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 2</h4>
              <p>Card</p>
              <a href="assets/img/portfolio/printer_mini.png" data-gall="portfolioGallery" class="venobox preview-link"
                title="Card 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div> -->

          <div class="col-lg-4 col-md-6 portfolio-item filter-web text-center">
            <img src="<?= base_url('assets/img/portfolio/scanner_b.png') ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Scanner Barcode</h4>
              <!-- <p>Web</p> -->
              <!-- <a href="assets/img/portfolio/fingerp.png" data-gall="portfolioGallery" class="venobox preview-link"
                title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> -->
            </div>
          </div>

          <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/printer_mini.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 3</h4>
              <p>App</p>
              <a href="assets/img/portfolio/scanner_b.png" data-gall="portfolioGallery" class="venobox preview-link"
                title="App 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div> -->

          <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/fingerp.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 1</h4>
              <p>Card</p>
              <a href="assets/img/portfolio/printer_mini.png" data-gall="portfolioGallery" class="venobox preview-link"
                title="Card 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/scanner_b.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 3</h4>
              <p>Card</p>
              <a href="assets/img/portfolio/fingerp.png" data-gall="portfolioGallery" class="venobox preview-link"
                title="Card 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div> -->

          <div class="col-lg-4 col-md-6 portfolio-item filter-web text-center">
            <img src="<?= base_url('assets/img/portfolio/printer_mini.png') ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Printer Mini</h4>
              <!-- <p>Web</p> -->
              <!-- <a href="assets/img/portfolio/scanner_b.png" data-gall="portfolioGallery" class="venobox preview-link"
                title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> -->
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Portfolio Section -->
    <!-- ======= Footer ======= -->
    <footer class="bg-info" id="footer">
      <!-- Footer Links -->
      <div class="container-fluid text-center text-md-left">
        <!-- Grid row -->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-6 mt-md-0 mt-3">
            <!-- Content -->
            <h5 class="text-uppercase text-center">Alamat</h5>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.483659749977!2d112.72514561532782!3d-7.299430273783382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb9ab8b4fde1%3A0xa4ee655389b2ad27!2sJl.%20Hayam%20Wuruk%2C%20Sawunggaling%2C%20Kec.%20Wonokromo%2C%20Kota%20SBY%2C%20Jawa%20Timur%2060242!5e0!3m2!1sid!2sid!4v1603000871104!5m2!1sid!2sid" width="100%" height="210" frameborder="1" style="border:0;" allowfullscreen="1" aria-hidden="false" tabindex="0"></iframe>
          </div>
          <!-- Grid column -->
          <hr class="clearfix w-100 d-md-none pb-3">
          <!-- Grid column -->
          <div class="col-md-6 mb-md-0 mb-3">
            <!-- Links -->
            <h5 class="text-uppercase text-center">Contact</h5>
            <ul class="list-unstyled text-center d-flex flex-column">
              <li class="p-2 text-center font-weight-bold small" style="font-size: 15px;">
                <a href="#" class="fa fa-whatsapp"></a> WhatsApp : +6281373230877
              </li>
              <li class="p-2 text-center font-weight-bold small" style="font-size: 15px;">
                <a href="#" class="fa fa-google"></a> Gmail : laundryKuy@gmail.com
              </li>
              <li class="p-2 text-center font-weight-bold small" style="font-size: 15px;">
                <a href="#" class="fa fa-twitter"></a> Twitter : _KuyLaundry
              </li>
              <li class="p-2 text-center font-weight-bold small" style="font-size: 15px;">
                <a href="#" class="fa fa-instagram"></a> Instagram : @KuyLaundry_
              </li>
            </ul>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
      <!-- Footer Links -->
      <!-- Copyright -->
      <div class="container">
        <div class="copyright" style="padding-top: 30px;">
          &copy;2020 Copyright: <a href=" https://ideku-reserved.com/" style="font:15 serif; font-weight:bold; color:white"> Ideku reserved.com</a>
        </div>
      </div>
      <!-- Copyright -->
    </footer>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/validate.js') ?>"></script>
    <script src="<?= base_url('assets/js/counterup.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.waypoints.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/isotope.pkgd.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/superfish.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/hoverIntent.js') ?>"></script>
    <script src="<?= base_url('assets/js/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/venobox.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/aos.js') ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/js/main.js') ?>"></script>

</body>

</html>