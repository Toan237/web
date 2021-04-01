<div class="container">

	<div class="header_bottom row">
		<div class="col-12 col-md-4 col-lg-3">
			<div class="category">
				<ul>
					<li>Shop by category</li>
					<?php foreach ($brands as $key => $brand) {

					?>
						<li><a href="<?php echo BASE_URL ?>/allproduct/brand/ <?php echo $brand['brandName'] ?>"><?php echo strtoupper($brand['brandName']) ?></a></li>


					<?php
					} ?>



				</ul>
			</div>
		</div>
		<div class="col-12 col-md-4 col-lg-6">



			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

				<div class="carousel-inner">
					<?php

					// echo '<pre>';
					// var_dump($slider_show);
					// echo '</pre>';
					$i = 0;
					foreach ($slider_show as $key => $slide) {
						$i++;
					?>
						<div class="carousel-item <?php if ($i == 1) echo "active" ?>">
							<img class="d-block w-100 " src="<?php echo BASE_URL ?>/public/uploads/slider/<?php echo $slide['slider_image']; ?>" alt="First slide">
						</div>
					<?php
					}
					?>
				</div>

				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>

		</div>

		<div class="col-12 col-md-4 col-lg-3">
			<div class="slider__box">
				<img class="slider__image" src="<?php echo BASE_URL ?>/public/uploads/slider/1_2.jpg" alt="" />
			</div>
			<div class="slider__box">
				<img class="slider__image" src="<?php echo BASE_URL ?>/public/uploads/slider/2_2.jpg" alt="" />

			</div>
		</div>


		<div class="slider__below">
			<div class="box">

				<image class="slider__below--img" src="<?php echo BASE_URL ?>/public/uploads/others/001-free-delivery.svg" />
				<div>
					<h3>Free Shipping</h3>
					<p>On all orders over $75.00</p>

				</div>
			</div>
			<div class="box">

				<image class="slider__below--img" src="<?php echo BASE_URL ?>/public/uploads/others/002-box.svg" />
				<div>
					<h3>Free Returns</h3>
					<p>Returns are free within 9 days</p>

				</div>
			</div>
			<div class="box">

				<image class="slider__below--img" src="<?php echo BASE_URL ?>/public/uploads/others/003-support.svg" />
				<div>
					<h3>Support 24/7</h3>
					<p>Contact us 24 hours a day</p>

				</div>
			</div>
			<div class="box">

				<image class="slider__below--img" src="<?php echo BASE_URL ?>/public/uploads/others/004-credit-card.svg" />
				<div>
					<h3>100% Payment Secure</h3>
					<p>Your payment are safe with us.</p>

				</div>
			</div>
		</div>




	</div>
</div>