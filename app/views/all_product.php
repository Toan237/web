<div class="main">
	<div class="content">
		<div class="container">
			<div class="content_top">

				<h3>Danh sách sản phẩm</h3>

				<div class="clear"></div>
			</div>

			<div class="section group row">
				<?php
				foreach ($product_all as $key => $each) {

				?>
					<div class="col-6 col-md-6 col-xl-2 product product">
						<a href="<?php echo BASE_URL ?>/product/productdetails/<?php echo $each['productId'] ?>">
							<div class="card">
								<img class="card-img-top" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $each['image'] ?>" alt="" />
								<div class="card-body">
									<h5 class="card-title"><?php echo $each['productName'] ?></h5>
									<p><span class="price"><?php echo "$" . $each['price'] ?></span></p>
								</div>
							</div>
						</a>

					</div>
				<?php
				}
				?>

			</div>
			<nav aria-label="Page navigation example">
				<ul class="pagination">
					<li class="page-item"><a class="page-link" href="?p=1">First</i> </a> </li>
					<li class="<?php if ($current_page <= 1) {
									echo 'page-item disabled';
								} else {
									echo "page-item";
								} ?>">
						<a class="page-link" href="<?php if ($current_page <= 1) {
														echo '#';
													} else {
														echo  "?p=" . ($current_page - 1);
													}
													?>">
							Prev</a> </li>
					<li class="<?php if ($current_page >= $max_page) {
									echo 'page-item disabled';
								} else {
									echo "page-item";
								} ?>">
						<a class="page-link" href="<?php if ($current_page >= $max_page) {
														echo '#';
													} else {
														echo   "?p=" . ($current_page + 1);
													} ?>">Next</a>
					</li>
					<li class="page-item"><a class="page-link" href="?p=<?php echo $max_page; ?>">Last</a></li>
				</ul>
			</nav>
		</div>

		<div class="content_bottom">

		</div>
	</div>