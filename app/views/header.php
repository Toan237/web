<!DOCTYPE HTML>

<head>
	<title>Store Website</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="icon" href="<?php echo BASE_URL; ?>/public/images/solid.png" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link href="<?php echo BASE_URL ?>/public/css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo BASE_URL ?>/public/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<script src="<?php echo BASE_URL ?>/public/js/jquerymain.js"></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

	<script src="<?php echo BASE_URL ?>/public/js/script.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo BASE_URL ?>/public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL ?>/public/js/nav.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL ?>/public/js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL ?>/public/js/easing.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL ?>/public/js/nav-hover.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
		$(document).ready(function($) {
			$('#dc_mega-menu-orange').dcMegaMenu({
				rowItems: '4',
				speed: 'fast',
				effect: 'fade'
			});
		});
	</script>
</head>

<body>
	<div class="header_top">
		<div class="container wrapper">
			<div class="header__logo">
				<a href="http://localhost/web_mvc"><span>Ko</span>lors.</a>
			</div>
			<div class="header__search">
				<form action="<?php echo BASE_URL ?>/index/search" autocomplete="off" method="GET">
					<input type="text" name="search">
					<button><img src="https://img.icons8.com/material-two-tone/24/000000/search.png" /></button>
				</form>
			</div>
			<div class="header__cart">
				<img src="<?php echo BASE_URL ?>/public/images/cart.svg" />
				<?php
				if (isset($_SESSION['shopping_cart'])) {
					if (count($_SESSION['shopping_cart']) === 0) {
						echo "<span class='badge badge-pill badge-dark'>0</span>";
					} else {
						echo "<span class='badge badge-pill badge-dark'>" . count($_SESSION['shopping_cart']) . "</span>";
					}
				} else {
					echo "<span class='badge badge-pill badge-dark'>0</span>";
				}

				?>
				<div class="header__cart-content">
					<?php
					if (isset($_SESSION['shopping_cart'])) {
						if (count($_SESSION['shopping_cart']) === 0) {
					?>

							<div class="header__cart-empty">
								<img src="<?php echo BASE_URL ?>/public/images/online-shopping.svg" />
								<p>Empty cart</p>
							</div>
						<?php
						} else {
						?>

							<p style='color: grey;padding-left: 30px;'>Cart products</p>
							<form action="<?php echo BASE_URL ?>/giohang/updategiohang" method="POST">

								<?php


								foreach ($_SESSION['shopping_cart'] as $key => $value) {

								?>
									<div class="header__cart-product">
										<img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $value['product_image'] ?>" alt="" style="width: 100px; height: 100px;object-fit:contain" />
										<p class="name"><?php echo $value['product_name'] ?></p>
										<p class="price"><?php echo "$" . $value['product_price']; ?> </p>
										<div class="delete">
											<button type="submit" value="<?php echo $value['product_id'] ?>" name="delete_cart">
												<img src="<?php echo BASE_URL ?>/public/images/trash.svg" />
											</button>
										</div>
									</div>


							<?php
								}
								echo "<hr/><div style='display: flex; align-items: center; justify-content: flex-end;padding-right: 30px;
							margin-top: 20px;'><a href='http://localhost/web_mvc/giohang' class='btn btn-primary'>Giỏ hàng</a></div>";
							}
						} else { ?>

							<div class="header__cart-empty">
								<img src="<?php echo BASE_URL ?>/public/images/online-shopping.svg" />
								<p>Empty cart</p>
							</div>

						<?php
						}

						?>


				</div>

			</div>
			<div class="header__account">
				<?php
				if (Session::get('customer') == true) {
				?>
					<a href="<?php echo BASE_URL ?>/khachhang/dangxuat"><img src="https://img.icons8.com/windows/32/000000/login-rounded-right.png" />Logout</a>
				<?php
				} else {
				?> <a href="<?php echo BASE_URL ?>/khachhang/dangnhap"><img src="https://img.icons8.com/windows/32/000000/login-rounded-right.png" />Login</a>
				<?php
				}
				?>

			</div>
		</div>
	</div>
	</div>
	<div class="menu">

		<ul id="dc_mega-menu-orange" class="dc_mm-orange">
			<div class="container">
				<li><a href="<?php echo BASE_URL ?>">Home</a></li>
				<li><a href="<?php echo BASE_URL ?>/allproduct/tatca">Products</a> </li>
				<li><a href="<?php echo BASE_URL ?>/giohang">Cart</a></li>

				<li><a href="contact.php">Contact</a> </li>
				<li><a href="<?php echo BASE_URL ?>/order/your_order">Your Order</a></li>
				<div class="clear"></div>
			</div>
		</ul>
	</div>