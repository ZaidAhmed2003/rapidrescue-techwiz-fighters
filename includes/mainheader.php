<!-- Main header-->
<header class="main-header header-style-one">
  <!--Start Header Top-->
  <div class="header-top">
    <div class="auto-container">
      <div class="outer-box">
        <div class="header-top__left">
          <div class="main-logo-box">
            <a href="index.php">
              <img
                width="110px"
                src="assets/images/resources/logo.png"
                alt="Awesome Logo"
                title="" />
            </a>
          </div>
        </div>

        <div class="header-top__right">
          <div class="header-contact-info-style1">
            <ul>
              <li>
                <div class="icon">
                  <span class="icon-telephone"></span>
                </div>
                <div class="text">
                  <p>Call anytime</p>
                  <h5><a href="tel:123456789">+ 1- (246) 333-0089</a></h5>
                </div>
              </li>
              <li>
                <div class="icon">
                  <span class="icon-email"></span>
                </div>
                <div class="text">
                  <p>Write email</p>
                  <h5>
                    <a href="mailto:yourmail@email.com">rapidrescue@company.com</a>
                  </h5>
                </div>
              </li>
            </ul>
          </div>
          <!-- <div class="header-button-style1">
                  <a class="btn-one" href="contact.html">
                    <span class="txt">Get a Free Quote</span>
                  </a>
                </div> -->
        </div>
      </div>
    </div>
  </div>
  <!--End Header Top-->

  <!--Start Header-->
  <div class="header">
    <div class="auto-container">
      <div class="outer-box">
        <!--Start Header Left-->
        <div class="header-left">
          <div class="nav-outer style1 clearfix">
            <!--Mobile Navigation Toggler-->
            <div class="mobile-nav-toggler">
              <div class="inner">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </div>
            </div>
            <!-- Main Menu -->
            <nav class="main-menu style1 navbar-expand-md navbar-light">
              <div
                class="collapse navbar-collapse show clearfix"
                id="navbarSupportedContent">
                <ul class="navigation clearfix scroll-nav">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="#about">About Us</a></li>
                  <li><a href="#services">Services</a></li>
                  <li><a href="#blog">Blog</a></li>
                  <li><a href="<?= ROOT_URL ?>login.php?role=user">Login</a></li>
                  <li><a href="#requestAmbulanceForm">Requset An Ambulance</a></li>
                  <!-- <li class="dropdown">
                    <a href="#">Login</a>
                    <ul>
                      <li><a href="<?= ROOT_URL ?>login.php?role=user">As User</a></li>
                      <li><a href="<?= ROOT_URL ?>login.php?role=driver">As Driver</a></li>
                    </ul>
                  </li> -->
                </ul>
              </div>
            </nav>
            <!-- Main Menu End-->
          </div>
        </div>
        <!--End Header Left-->

        <!--Start Header Right-->
        <div class="header-right">
          <div class="header-social-link">
            <ul class="clearfix">
              <li>
                <a href="#"><i class="icon-twitter"></i></a>
              </li>
              <li>
                <a href="#"><i class="icon-facebook"></i></a>
              </li>
              <li>
                <a href="#"><i class="icon-pinterest"></i></a>
              </li>
              <li>
                <a href="#"><i class="icon-instagram"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <!--End Header Right-->
      </div>
    </div>
  </div>
  <!--End header-->

  <!--Sticky Header-->
  <div class="sticky-header">
    <div class="container">
      <div class="clearfix">
        <!--Logo-->
        <div class="logo float-left">
          <a href="index.html" class="img-responsive">
            <img
              width="110px"
              src="assets/images/resources/logo.png"
              alt=""
              title="" />
          </a>
        </div>
        <!--Right Col-->
        <div class="right-col float-right">
          <!-- Main Menu -->
          <nav class="main-menu clearfix">
            <!--Keep This Empty / Menu will come through Javascript-->
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!--End Sticky Header-->

  <!-- Mobile Menu  -->
  <div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn">
      <span class="icon fa fa-times-circle"></span>
    </div>
    <nav class="menu-box">
      <div class="nav-logo">
        <a href="index.html"><img
            width="110px"
            src="assets/images/resources/logo.png"
            alt=""
            title="" /></a>
      </div>
      <div class="menu-outer">
        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
      </div>
      <!--Social Links-->
      <div class="social-links">
        <ul class="clearfix">
          <li>
            <a href="#"><span class="fab fa fa-facebook-square"></span></a>
          </li>
          <li>
            <a href="#"><span class="fab fa fa-twitter-square"></span></a>
          </li>
          <li>
            <a href="#"><span class="fab fa fa-pinterest-square"></span></a>
          </li>
          <li>
            <a href="#"><span class="fab fa fa-google-plus-square"></span></a>
          </li>
          <li>
            <a href="#"><span class="fab fa fa-youtube-square"></span></a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- End Mobile Menu -->
</header>