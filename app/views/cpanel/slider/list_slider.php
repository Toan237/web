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

 		<h3>Add New Slider</h3>
 		<div class="shadow" style="margin-bottom: 30px">
 			<?php
				?>
 			<form action="<?php echo BASE_URL ?>/slider/insert_slider" method="POST" enctype="multipart/form-data">
 				<table class="form">

 					<tr>
 						<td>
 							<label>Title</label>
 						</td>
 						<td>
 							<input type="text" name="sliderName" placeholder="Enter Slider Title..." class="medium" />
 						</td>
 					</tr>

 					<tr>
 						<td>
 							<label>Upload Image</label>
 						</td>
 						<td>
 							<label for="image" class='pretty-upload'>
 								<div class="deleteImage">
 									<span>&#x3A7;</span>
 								</div>
 								<image class="upload-icon" src="<?php echo BASE_URL ?>/public/images/image-gallery.svg" />
 								<p>Choose an image</p>
 								<img id='outputArea' />
 							</label>
 							<input type="hidden" name="old_image" />
 							<input type="file" name="image_slider" id="image" />
 						</td>
 					</tr>



 					<tr>
 						<td></td>
 						<td>
 							<input type="submit" name="submit" Value="Save" class="btn btn-primary" />
 						</td>
 					</tr>
 				</table>
 			</form>
 		</div>




 		<h3>Slider List</h3>
 		<?php
			if (isset($del_slider)) {
				echo $del_slider;
			}
			?>
 		<table class="table mt-3">
 			<thead>
 				<tr>
 					<th>No.</th>
 					<th>Slider Title</th>
 					<th>Slider Image</th>
 					<th>Action</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php
					$i = 0;
					foreach ($list_slider as $key => $list) {
						$i++;
					?>
 					<tr class="odd gradeX">
 						<th scope="row"><?php echo $i; ?></th>
 						<td><?php echo $list['sliderName']; ?></td>
 						<td><img src="<?php echo BASE_URL ?>/public/uploads/slider/<?php echo $list['slider_image'] ?>" height="100px" width="200px" /></td>

 						<td>
 							<a href="<?php echo BASE_URL ?>/slider/delete_slider/<?php echo $list['sliderId'] ?>" onclick="return confirm('Do you want to delete this item?');">Delete</a>

 						</td>
 					</tr>
 				<?php
					}
					?>
 			</tbody>
 		</table>
 	</div>
 </div>

 </div>
 <script type="text/javascript">
 	$(document).ready(function() {
 		setupLeftMenu();

 		$('.datatable').dataTable();
 		setSidebarHeight();
 	});


 	const image = document.getElementById("image");
 	const deleteImage = document.querySelector(".deleteImage");
 	const output = document.getElementById("outputArea");
 	const uploadIcon = document.querySelector('.upload-icon');
 	const p = document.querySelector('.pretty-upload p');

 	image.addEventListener("change", previewImage);
 	deleteImage.addEventListener("click", deleteReviewImage);



 	function previewImage(e) {
 		var reader = new FileReader();

 		reader.onload = function() {
 			if (!reader.result) return;

 			deleteImage.style.display = "flex";

 			output.style.display = "block";

 			output.src = reader.result;

 			uploadIcon.style.display = "none";

 			p.style.display = "none";

 		};

 		reader.readAsDataURL(e.target.files[0]);
 	}

 	function deleteReviewImage(e) {
 		image.value = null;
 		e.preventDefault();

 		output.removeAttribute("src");
 		output.style.display = "none";
 		deleteImage.style.display = "none";

 		uploadIcon.style.display = "block";

 		p.style.display = "block";
 	}
 </script>