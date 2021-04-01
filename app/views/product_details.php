<div class="main">
	<div class="product-detail" style="background: #fff; padding: 100px">
		<div class="row">
			<div class="col-2">
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
			<div class="col-10">
				<?php

				foreach ($detail as $key => $detl) {
				?>
					<form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="POST" class="col-10">
						<input type="hidden" value="<?php echo $detl['productId'] ?>" name="product_id">
						<input type="hidden" value="<?php echo $detl['productName'] ?>" name="product_name">
						<input type="hidden" value="<?php echo $detl['image'] ?>" name="product_image">
						<input type="hidden" value="<?php echo $detl['price'] ?>" name="product_price">
						<input type="hidden" value="1" name="product_quantity">
						<div class="row">
							<div class="col-6 col-md-6 col-xl-3 product">
								<img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $detl['image'] ?>?>" alt="<?php echo $detl['productName'] ?>" />
							</div>
							<div class="col-9">
								<h2><?php
									echo $detl['productName']
									?> </h2>
								<h3><?php
									echo $detl['price']
									?></h3>
								</p>
								<p><?php
									echo $detl['product_desc']
									?></p>

								<p>Brand: <span class="badge badge-secondary product__brand"><?php
																								echo $detl['brandName']
																								?></span></p>
								<div class="add-cart">
									<input type="number" class="quantity-field" name="quantity" value="1" min="1" />
									<input type="submit" class="btn btn-default" name="submit" value="Mua ngay" />
								</div>
								<!-- so sánh sản phẩm -->
								<div class="add-cart">
									<div class="button_details">

									</div>
									<div class="clear"></div>
								</div>
							</div>
							<div class="product-desc">
								<h2>Chi tiết sản phẩm</h2>
								<p><?php
									echo $detl['product_desc']
									?></p>
							</div>
					</form>
			</div>

		<?php
				}
				// 	}
		?>
		</div>
	</div>

</div>