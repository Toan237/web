<div class="col-10">
	<div class="dashboard--layout">
		<?php
		if (!empty($_GET['msg'])) {
			$msg = unserialize(urldecode($_GET['msg']));
			foreach ($msg as $key => $value) {
				echo '<div class="alert alert-success" role="alert" style="width: 500px; margin-bottom: 30px">' . $value . '</div>';
			}
		}
		?>
		<h3>Product List <a class="addBtn" href="<?php echo BASE_URL ?>/product/add_product">Add Product</a></h3>
		<table class="table">
			<thead>
				<tr>

					<th scope="col">Product Name</th>
					<th scope="col">Product Desc</th>
					<th scope="col">Image</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($data['listproduct'] as $key => $product) {
				?>

					<tr>

						<td><?php echo $product['productName'] ?></td>
						<td><?php echo $product['product_desc'] ?></td>
						<td>
							<img class="card-img-top" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $product['image'] ?>" alt="" />
						</td>
						<td>
							<a href="<?php echo BASE_URL ?>/product/edit_product/<?php echo $product['productId'] ?>">Edit</a>
						</td>
						<td><a href="<?php echo BASE_URL ?>/product/delete_product/<?php echo $product['productId'] ?>">Delete</a></td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<ul class="pagination">

			<li class="page-item"><a class="page-link" href="
					<?php if ($current_page == 1) {
						echo "#";
					} else {
						echo BASE_URL ?>/product/list_product/tatca?p=<?php echo $current_page - 1;
																	} ?>">Previous</a></li>
			<li class="page-item"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item"><a class="page-link" href="
					<?php if ($current_page == $max_page) {
						echo "#";
					} else {
						echo BASE_URL ?>/product/list_product/tatca?p=<?php echo $current_page + 1;
																	} ?>">Next</a></li>
		</ul>
	</div>

</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		setupLeftMenu();
		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>