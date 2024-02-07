		<!-- Start Schedule Area -->
		<section class="schedule">
			<div class="container">
				<div class="schedule-inner">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-12 ">
							<!-- single-schedule -->
							<div class="single-schedule first">
								<div class="inner">
									<div class="icon">
										<i class="fa fa-ambulance"></i>
									</div>
									<div class="single-content">
										{{-- <span>Lorem Amet</span> --}}
										<h4>About Blood</h4>
										<p>The ABO blood group system was discovered by Karl Landsteiner in 1900.
                                            46 years later (1946) the Blood Transfusion Service was formed.
                                            In 1996 the National Blood Service was formed to collect and provide blood supplies for all the hospitals in Sri Lanka.</p>
										{{-- <a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a> --}}
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<!-- single-schedule -->
							<div class="single-schedule middle">
								<div class="inner">
									<div class="icon">
										<i class="icofont-prescription"></i>
									</div>
									<div class="single-content">
										{{-- <span>Fusce Porttitor</span> --}}
										<h4>Components of Blood</h4>
										<p>When we receive your donation we separate it into individual components by spinning it in a machine called a centrifuge.
                                            The individual components are red cells, white cells, platelets and plasma. These can all be put to different uses.</p>
										{{-- <a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a> --}}
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<!-- single-schedule -->
							<div class="single-schedule last">
								<div class="inner">
									<div class="icon">
										<i class="icofont-ui-clock"></i>
									</div>
									<div class="single-content">
										{{-- <span>Donec luctus</span> --}}
										<h4>How does the Body Replace Blood</h4>
                                        <p>During a whole blood donation we aim to take just under a pint (about 470mls) of blood, which works out at no more than 13 per cent of your blood volume.
                                            After donation, your body has an amazing capacity to replace all the cells and fluids that have been lost.</p>
										{{-- <a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/End Start schedule Area -->

		<!-- Start Feautes -->
		<section class="Feautes section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Sri Lanka's Lifesaving Donors: 100% Voluntary</h2>
							<img src="{{ asset('homePage/images/section-img.png') }}" alt="#">
							<p>Celebrate the power of giving! In Sri Lanka</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-12">
						<!-- Start Single features -->
						<div class="single-features">
							<div class="signle-icon">
								<i class="icofont-ui-user-group"></i>
							</div>
							<h3>100% Voluntary</h3>
							<p>100% of Sri Lankan blood donors are voluntory non rermunerated donors.</p>
						</div>
						<!-- End Single features -->
					</div>
					<div class="col-lg-4 col-12">
						<!-- Start Single features -->
						<div class="single-features">
							<div class="signle-icon">
								<i class="icofont-blood-drop"></i>
							</div>
							<h3>You can donate</h3>
							<p>You can donate blood in every 4 months time.</p>
						</div>
						<!-- End Single features -->
					</div>
					<div class="col-lg-4 col-12">
						<!-- Start Single features -->
						<div class="single-features last">
							<div class="signle-icon">
								<i class="icofont-heart-beat"></i>
							</div>
							<h3>Three lives</h3>
							<p>Your precious donation of blood can save as many as 3 lives.</p>
						</div>
						<!-- End Single features -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End Feautes -->

		<!-- Start Fun-facts -->
		<div id="fun-facts" class="fun-facts section overlay">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont-simple-smile"></i>
							<div class="content">
								<span class="counter">{{$donorCount}}</span>
								<p>Donors</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont-hospital"></i>
							<div class="content">
								<span class="counter">{{$hospCount}}</span>
								<p>Hospitals</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont-building-alt"></i>
							<div class="content">
								<span class="counter">{{$orgCount}}</span>
								<p>Organizations</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont-laboratory"></i>
							<div class="content">
								<span class="counter" id="campaignCount"></span>
								<p>Campaingns</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
				</div>
			</div>
		</div>
		<!--/ End Fun-facts -->

		<!-- Start Why choose -->
		<section class="why-choose section" >
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Unveiling the Life-Giving Essence: Insights into Blood Types, Components, and the Vital Role of Donors</h2>
							<img src="{{ asset('homePage/images/section-img.png') }}" alt="#">
							<p>Blood comes in four main types - O, A, B and AB. Group O is the most common which means it is in high demand.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-12">
						<!-- Start Choose Left -->
						<div class="choose-left">
							<h3>About Blood</h3>
							<p>Blood can also be subdivided into its main components - red cells, white cells, platelets and plasma. Unfortunately red cells only have a shelf-life of 35 or 42 days, while platelets shelf life is even less, only five days.
                                Almost anyone between the ages of 18 and 55 can become a new blood donor. And those who are regular donors can continue to donate till 60.
                                The average adult has around 5 trillion red blood cells in one litre of blood. Which means you have on average 25 trillion red cells running around inside you, although 25 million (or 0.1%) of them die every day. That works out at roughly 300 a second.</p>
							<div class="row">
								<div class="col-lg-12">
									<ul class="list">
										<li><i class="fa fa-caret-right"></i>The first successful blood transfusion was carried out in 1665 by Dr Richard Lower. </li>
										<li><i class="fa fa-caret-right"></i>William Harvey was the first physician to discover that blood circulates round the body back in 1628.</li>
										<li><i class="fa fa-caret-right"></i>Dr. Karl Landsteiner discovered the ABO blood group system and realised that human patients needed to be given compatible blood.</li>
									</ul>
								</div>
								{{-- <div class="col-lg-6">
									<ul class="list">
										<li><i class="fa fa-caret-right"></i>Maecenas vitae luctus nibh. </li>
										<li><i class="fa fa-caret-right"></i>Duis massa massa.</li>
										<li><i class="fa fa-caret-right"></i>Aliquam feugiat interdum.</li>
									</ul>
								</div> --}}
							</div>
						</div>
						<!-- End Choose Left -->
					</div>
					<div class="col-lg-6 col-12">
						<!-- Start Choose Rights -->
						<div class="choose-right">
							<div class="video-image">
								<!-- Video Animation -->
								<div class="promo-video">
									<div class="waves-block">
										<div class="waves wave-1"></div>
										<div class="waves wave-2"></div>
										<div class="waves wave-3"></div>
									</div>
								</div>
								<!--/ End Video Animation -->
								<a href="https://www.youtube.com/watch?v=kOISEM6L4xk" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
							</div>
						</div>
						<!-- End Choose Rights -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End Why choose -->

		<!-- Start Call to action -->
		<section class="call-action overlay" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-12">
						<div class="content">
							<h2>Do you want to Contact Us? <br>Call : +94112369931-4</h2>
							<h2>Fax : +94112369939 <br>
								E-mail : info@nbts.health.gov.lk</h2>
							<div class="button">
								<a href="http://www.nbts.health.gov.lk/about/cluster-system" target="_blank" class="btn">Blood Banks</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Call to action -->

		<!-- Start portfolio -->
		<section class="portfolio section" id="advertisement">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Supporting Life: Give the Gift of Health through Financial and Equipment Donations</h2>
							<img src="{{ asset('homePage/images/section-img.png') }}" alt="#">
							<p>Support our mission! Your financial and equipment donations are crucial for sustaining and enhancing our blood transfusion services.</p>
						</div>
					</div>
				</div>
			</div>
            @if ($images->count())
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="owl-carousel portfolio-slider">

                                    @foreach ($images as $image)
                                        <div class="single-pf">
                                            <img src="{{ asset($image->path) }}" alt="#">

                                            @auth
                                                <a href="{{ route('admin.home') }}" class="btn">My Account</a>
                                            @else
                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}" class="btn">Register</a>
                                                @endif
                                            @endauth
                                        </div>
                                    @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            @else
                <center>No Running Ads</center>
            @endif
		</section>
		<!--/ End portfolio -->

		<!-- Start service -->
		<section class="services section" id="campaign">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Spreading Hope: Explore Our Blood Campaigns and Join the Lifesaving Movement</h2>
							<img src="{{ asset('homePage/images/section-img.png') }}" alt="#">
							<p>Explore our blood campaigns—a vital force in raising awareness, fostering community participation, and ensuring a stable blood supply. Join us in making a significant impact on healthcare and saving lives.</p>
						</div>
					</div>
				</div>
				<div class="row" id="campDataRow">





				</div>
			</div>
		</section>
		<!--/ End service -->
@push('specificJsForHomepage')


<script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
<script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>

<script>


// Add campaign count
window.onload = async function() {
    setTimeout(async function() {
        try {
            const campData = await getAllCampaigns();

            var approvedStatusTrue = campData.approvedStatus.filter(function (item) {
            return item.approve === true;
            });

            // console.log(campData);
            document.getElementById("campaignCount").innerText = approvedStatusTrue.length;
            // Get the reference to the row with ID "campDataRow"
            var campDataRow = document.getElementById("campDataRow");

            // Iterate over the campaigns and append HTML to the row
            for (let x = 0; x < campData._campaignIDs.length; x++) {
                if(campData.approvedStatus[x]){
                    // Create a new div element
                var newDiv = document.createElement("div");
                newDiv.className = "col-lg-4 col-md-6 col-12";

                // Set the inner HTML of the new div
                newDiv.innerHTML = `
                    <div class="single-service">
                        <i class="icofont icofont-blood"></i>
                        <h5><a href="service-details.html">${web3.utils.hexToUtf8(campData.locations[x])} <h6>Blood Donation Campaign</h6></a></h5>
                        <p>Location : ${web3.utils.hexToUtf8(campData.locations[x])}</p>
                        <p>Date : ${web3.utils.hexToUtf8(campData.dates[x])}</p>
                        <p>Starting at : ${web3.utils.hexToUtf8(campData.startTimes[x])}</p>
                        <p>Ending at : ${web3.utils.hexToUtf8(campData.endTimes[x])}</p>
                    </div>
                `;

                // Append the new div to the row
                campDataRow.appendChild(newDiv);

                }

            }


        } catch (error) {
            console.error('Error on page load:', error);

        }
    }, 4000); // 200 milliseconds
};

</script>

@endpush
