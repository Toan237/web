<div class="main">

	<div class="content">
		<div class="container">
			<div class="content_top">
				<h3>Featured Product</h3>
			</div>
			<div class="section group row first">
				<?php
				$i = 0;
				foreach ($productfeathered as $key => $feathered) {
					$i++;
				?>
					<div class="col-6 col-md-6 col-xl-2 product product" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000" data-aos-delay="<?php echo $i * 50 ?>">
						<a href="<?php echo BASE_URL ?>/product/productdetails/<?php echo $feathered['productId'] ?>">
							<div class="card">
								<img class="card-img-top" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $feathered['image'] ?>" alt="" />
								<div class="card-body">
									<h5 class="card-title"><?php echo $feathered['productName'] ?></h5>
									<p><span class="price"><?php echo "$" . $feathered['price'] ?></span></p>

								</div>
							</div>

							<form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="POST" class="buy-form">
								<input type="hidden" value="<?php echo $feathered['productId'] ?>" name="product_id">
								<input type="hidden" value="<?php echo $feathered['productName'] ?>" name="product_name">
								<input type="hidden" value="<?php echo $feathered['image'] ?>" name="product_image">
								<input type="hidden" value="<?php echo $feathered['price'] ?>" name="product_price">
								<input type="hidden" value="1" name="product_quantity">
								<button class="btn btn-primary buyBtn">Buy</button>
							</form>

						</a>


					</div>


				<?php
				}
				// }
				?>
			</div>

			<div class="banner" style="margin-bottom: 100px">
				<image src="<?php echo BASE_URL ?>/public/uploads/others/3_2.jpg" />
			</div>



			<div class="content_top">
				<h3>New Product</h3>
			</div>
			<div class="container">

				<div class="section group row">
					<?php
					$i = 0;
					foreach ($productnew as $key => $new) {
						$i++;

					?>
						<div class="col-6 col-md-6 col-xl-2 product product" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000" data-aos-delay="<?php echo $i * 50 ?>">
							<a href="<?php echo BASE_URL ?>/product/productdetails/<?php echo $new['productId'] ?>">
								<div class="card">
									<img class="card-img-top" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $new['image'] ?>" alt="" />
									<div class="card-body">
										<h5 class="card-title"><?php echo $new['productName'] ?></h5>
										<p><span class="price"><?php echo number_format($new['price'], 0, ',', '.') . ' VNĐ' ?></span></p>
									</div>
								</div>
								<form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="POST" class="buy-form">
									<input type="hidden" value="<?php echo $new['productId'] ?>" name="product_id">
									<input type="hidden" value="<?php echo $new['productName'] ?>" name="product_name">
									<input type="hidden" value="<?php echo $new['image'] ?>" name="product_image">
									<input type="hidden" value="<?php echo $new['price'] ?>" name="product_price">
									<input type="hidden" value="1" name="product_quantity">
									<button class="btn btn-primary buyBtn">Buy</button>
								</form>
							</a>

						</div>
					<?php
					}
					// }
					?>
				</div>
				<div class="row" style="margin-bottom: 100px">
					<div class="col-6">
						<image width="100%" src="<?php echo BASE_URL ?>/public/uploads/others/4_1.jpg" />
					</div>
					<div class="col-6">
						<image width="100%" src="<?php echo BASE_URL ?>/public/uploads/others/5_1.jpg" />
					</div>
				</div>
			</div>
			<div class="content_top">
				<h3>HP laptop</h3>
			</div>
			<div class="container">

				<div class="section group row">
					<?php
					$i = 0;
					foreach ($productHP as $key => $new) {
						$i++;
					?>
						<div class="col-6 col-md-6 col-xl-2 product product" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000" data-aos-delay="<?php echo $i * 50 ?>">
							<a href="<?php echo BASE_URL ?>/product/productdetails/<?php echo $new['productId'] ?>">
								<div class="card">
									<img class="card-img-top" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $new['image'] ?>" alt="" />
									<div class="card-body">
										<h5 class="card-title"><?php echo $new['productName'] ?></h5>
										<p><span class="price"><?php echo number_format($new['price'], 0, ',', '.') . ' VNĐ' ?></span></p>
									</div>
								</div>

								<form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="POST" class="buy-form">
									<input type="hidden" value="<?php echo $new['productId'] ?>" name="product_id">
									<input type="hidden" value="<?php echo $new['productName'] ?>" name="product_name">
									<input type="hidden" value="<?php echo $new['image'] ?>" name="product_image">
									<input type="hidden" value="<?php echo $new['price'] ?>" name="product_price">
									<input type="hidden" value="1" name="product_quantity">
									<button class="btn btn-primary buyBtn">Buy</button>
								</form>
							</a>

						</div>
					<?php
					}
					// }
					?>
				</div>

			</div>
			<div class="content_top">
				<h3>Dell laptop</h3>
			</div>
			<div class="container">

				<div class="section group row">
					<?php
					$i = 0;
					foreach ($productDELL as $key => $new) {
						$i++;
					?>
						<div class="col-6 col-md-6 col-xl-2 product product" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000" data-aos-delay="<?php echo $i * 50 ?>">
							<a href="<?php echo BASE_URL ?>/product/productdetails/<?php echo $new['productId'] ?>">
								<div class="card">
									<img class="card-img-top" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $new['image'] ?>" alt="" />
									<div class="card-body">
										<h5 class="card-title"><?php echo $new['productName'] ?></h5>
										<p><span class="price"><?php echo number_format($new['price'], 0, ',', '.') . ' VNĐ' ?></span></p>
									</div>
								</div>
								<form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="POST" class="buy-form">
									<input type="hidden" value="<?php echo $new['productId'] ?>" name="product_id">
									<input type="hidden" value="<?php echo $new['productName'] ?>" name="product_name">
									<input type="hidden" value="<?php echo $new['image'] ?>" name="product_image">
									<input type="hidden" value="<?php echo $new['price'] ?>" name="product_price">
									<input type="hidden" value="1" name="product_quantity">
									<button class="btn btn-primary buyBtn">Buy</button>
								</form>
							</a>

						</div>
					<?php
					}
					// }
					?>
				</div>

			</div>
			<div class="content_top">
				<h3>Lenovo laptop</h3>
			</div>
			<div class="container">

				<div class="section group row">
					<?php
					$i = 0;
					foreach ($productLENOVO as $key => $new) {
						$i++;
					?>
						<div class="col-6 col-md-6 col-xl-2 product product" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000" data-aos-delay="<?php echo $i * 50 ?>">
							<a href="<?php echo BASE_URL ?>/product/productdetails/<?php echo $new['productId'] ?>">
								<div class="card">
									<img class="card-img-top" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $new['image'] ?>" alt="" />
									<div class="card-body">
										<h5 class="card-title"><?php echo $new['productName'] ?></h5>
										<p><span class="price"><?php echo number_format($new['price'], 0, ',', '.') . ' VNĐ' ?></span></p>
									</div>
								</div>

								<form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="POST" class="buy-form">
									<input type="hidden" value="<?php echo $new['productId'] ?>" name="product_id">
									<input type="hidden" value="<?php echo $new['productName'] ?>" name="product_name">
									<input type="hidden" value="<?php echo $new['image'] ?>" name="product_image">
									<input type="hidden" value="<?php echo $new['price'] ?>" name="product_price">
									<input type="hidden" value="1" name="product_quantity">
									<button class="btn btn-primary buyBtn">Buy</button>
								</form>
							</a>

						</div>
					<?php
					}
					// }
					?>
				</div>

			</div>


		</div>
	</div>
	<?php
