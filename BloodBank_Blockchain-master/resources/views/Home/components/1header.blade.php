		<!-- Header Area -->
		<header class="header" >

			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<a href="#"><img src="homePage/images/logo.png" alt="#"></a>
								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
                                            {{-- <i class="icofont-rounded-down"></i> --}}
											<li class="active"><a href="#">Home </a>
												{{-- <ul class="dropdown">
													<li><a href="index.html">Home Page 1</a></li>
												</ul> --}}
											</li>
											<li><a href="#campaign">Campaigns </a></li>
											<li><a href="#advertisement">Advertisements </a></li>
											{{-- <li><a href="#">Pages <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li><a href="404.html">404 Error</a></li>
												</ul>
											</li> --}}
											{{-- <li><a href="#">Blogs <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li><a href="blog-single.html">Blog Details</a></li>
												</ul>
											</li> --}}
											<li><a href="#footer">Contact Us</a></li>
										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>
							<div class="col-lg-1 col-12">
								<div class="get-quote">
									{{-- <a href="appointment.html" class="">Book Appointment</a> --}}


                                    @if (Route::has('login'))

                                    @auth
                                    <a href="{{ route('admin.home') }}" class="btn">My Account</a>
                                    @else
                                    <a href="{{ route('login') }}" class="btn">Login</a>

                                    @endauth
                                    @endif




								</div>
							</div>

                            <div class="col-lg-1 col-12">
								<div class="get-quote">
                                    @if (Route::has('register'))
                                    @auth
                                        @else
                                        <a href="{{ route('register') }}" class="btn">Register</a>
                                    @endauth

                                    @endif
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->

		<!-- Slider Area -->
		<section class="slider">
			<div class="hero-slider">
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('/homepage/images/slider2.jpg');">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Donate <span>Blood</span> and <span>Inspire</span> Others</h1>
									<p>Join us in making a difference by donating blood to save lives. Your contribution helps ensure a stable and secure blood supply for those in need. Every donation counts, and together we can create a healthier and more vibrant community. </p>
									<div class="button">
                                        @if (Route::has('login'))

                                        @auth
                                        <a href="{{ route('admin.home') }}" class="btn">My Account</a>
                                        @else
                                        <a href="{{ route('login') }}" class="btn">Login</a>

                                        @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn primary">Register</a>
                                        @endif
                                        @endauth

                                    @endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Single Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('/homepage/images/slider.png');">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Empower the Community: Be a Lifesaver, Donate <span>Blood</span>, and <span>Inspire</span> Hope</h1>
									<p>Discover the impact of your blood donation. By giving the gift of life, you play a crucial role in supporting medical treatments, emergency care, and improving overall community health. </p>
									<div class="button">
                                        @if (Route::has('login'))

                                        @auth
                                        <a href="{{ route('admin.home') }}" class="btn">My Account</a>
                                        @else
                                        <a href="{{ route('login') }}" class="btn">Login</a>

                                        @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn primary">Register</a>
                                        @endif
                                        @endauth

                                    @endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Start End Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('/homepage/images/slider3.jpg');">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Transform Lives: Give the Precious Gift of <span>Blood</span> and Ignite <span>Inspiration</span></h1>
									<p>Ready to make a difference? Donating blood is a simple and rewarding process. Learn about eligibility criteria, find a donation center near you, and take the first step towards saving lives. Your generosity can inspire others to join the cause!</p>
									<div class="button">


                                        @if (Route::has('login'))

                                        @auth
                                        <a href="{{ route('admin.home') }}" class="btn">My Account</a>
                                        @else
                                        <a href="{{ route('login') }}" class="btn">Login</a>

                                        @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn primary">Register Now</a>
                                        @endif
                                        @endauth

                                    @endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Single Slider -->
			</div>
		</section>
		<!--/ End Slider Area -->







