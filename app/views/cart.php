<div class="main">
	<div class="cartoption">
		<!-- <div class="container"> -->

		<div class="cartpage">

			<div class="container">
				<h2>Your Cart</h2>

				<div class="row">

					<table class="tblone col-9">
						<tr>
							<th width="15%">Product Name</th>
							<th width="20%">Image</th>
							<th width="15%">Price</th>
							<th width="25%">Quantity</th>
							<th width="15%">Total Price</th>
							<th width="10%">Action</th>
						</tr>
						<?php
						if (isset($_SESSION['shopping_cart'])) {

						?>
							<form action="<?php echo BASE_URL ?>/giohang/updategiohang" method="POST">
								<?php

								$total = 0;
								foreach ($_SESSION['shopping_cart'] as $key => $value) {
									$subtotal = $value['product_quantity'] * $value['product_price'];
									$total += $subtotal;
								?>
									<tr>
										<td><?php echo $value['product_name'] ?></td>
										<td><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $value['product_image'] ?>" alt="" width="100px" /></td>

										<td><?php echo number_format($value['product_price'], 0, ',', '.') . ' VNĐ' ?></td>
										<td>
											<input type="hidden" name="cartId" value="" />
											<input type="number" name="qty[<?php echo $value['product_id'] ?>]" min="1" value="<?php echo $value['product_quantity'] ?>" />
											<button type="submit" style="box-shdow: none;" value="<?php echo $value['product_id'] ?>" name="update_cart" class="btn btn-sm btn-primary">Cập nhật</button>
										</td>

										<td><?php echo number_format($subtotal, 0, ',', '.') . ' VNĐ' ?></td>
										<td>
											<button type="submit" style="box-shdow: none;" value="<?php echo $value['product_id'] ?>" name="delete_cart" class="btn btn-sm btn-warning">Xóa</button>

										</td>
									</tr>
								<?php
								}
								?>
							</form>
					</table>

					<div class="col-2 totalcart ml-3">
						<div>
							<h5>Total : <span><?php
												echo number_format($total, 0, ',', '.') . ' VNĐ';

												?></span></h5>

						</div>
						<div>
							<div>VAT : <span>10%</span></div>

						</div>
						<div>
							<div>Grand Total : <span><?php
														echo number_format(($total * 0.9), 0, ',', '.') . ' VNĐ';
														?></span></div>

						</div>
					</div>

				</div>


				<?php
							if (Session::get('customer') == true) {
				?>
					<div class="register_account">

						<form method="POST" autocomplete="off" action="<?php echo BASE_URL ?>/giohang/dathang/">
							<?php
								foreach ($khachhang as $key => $info) {
							?>

								<p class="customer__name"><span>Họ và tên: </span><?php echo $info['customer_name']; ?></p>
								<p class="customer__phone"><span>SĐT: </span><?php echo $info['customer_phone']; ?></p>
								<p class="customer__name"><span>Địa chỉ: </span><?php echo $info['customer_address']; ?></p>
								<p class="customer__name"><span>Email: </span><?php echo $info['customer_email']; ?></p>
								<p class="customer__name"><span>Customer ID: </span><?php echo $info['customer_id']; ?></p>

								<input type="hidden" name="customer_id" value="<?php
																				echo $info['customer_id']
																				?>" required class="clsip"><br>

								<!-- 
								<input type="text" name="name" value=" required class=" clsip"><br>
								<label>Số điện thoại: <span style="color:red;">*</span></label><br>
								<input type="text" name="sodienthoai" value="<?php
																				echo $info['customer_phone']
																				?>" required class="clsip"><br>
								<label>Địa chỉ: <span style="color:red;">*</span></label><br>
								<input type="text" name="diachi" value="<?php
																		echo $info['customer_address']
																		?>" required class="clsip"><br>
								<label>Email: <span style="color:red;">*</span></label><br>
								<input type="text" name="email" value="<?php
																		echo $info['customer_email']
																		?>" required class="clsip"><br>
								<input type="text" name="customer_id" value="<?php
																				echo $info['customer_id']
																				?>" required class="clsip"><br> -->
								</td>


								<br>
								<input type="submit" class="btn btn-primary" name="frmSubmit" id="frmSubmit" value="Xác nhận">
								<div class="clear"></div>
							<?php
								}
							?>
						</form>
					</div>
				<?php
							} else {
				?>
					<form method="POST" autocomplete="off" action="<?php echo BASE_URL ?>/khachhang/dangnhap/">
						<input type="submit" class="btn btn-primary" name="frmSubmit" id="frmSubmit" value="Thanh toán">
					</form>
				<?php
							}
				?>
			</div>

		<?php

						} elseif (!empty($_GET['msg'])) {
							$msg = unserialize(urldecode($_GET['msg']));
							foreach ($msg as $key => $value) {
								// echo '<span style="color:blue;font-weight:bold;">'.$value.'</span>';
								echo '
							<table style="float:right;text-align:left;" width="60%">
							<tr>
								<th style="width: 100px; height: 30px;">' . $value . '</th>
		
							</tr>
		
							</table>';
							}
		?>
		<?php
						} else {
		?>
			<table style="float:right;text-align:left;" width="60%">
				<tr>
					<th style="width: 100px; height: 30px;">Giỏ hàng trống </th>

				</tr>

			</table>
		<?php
						}
		?>

		</div>
		<div class="shopping">
			<div class="shopleft">

				<a href="index.php"> <img src="images/shop.png" alt="" /></a>
			</div>
			<div class="shopright">
				<a href="payment.php"> <img src="images/checkout.jpg" alt="" /></a>
			</div>
		</div>
	</div>

	<div class="clear"></div>
</div>