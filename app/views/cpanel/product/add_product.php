 <div class="col-10">
     <div class="dashboard--layout">
         <h3>Add product</h3>
         <?php

            ?>
         <form class="shadow" action="<?php echo BASE_URL ?>/product/insert_product" method="POST" enctype="multipart/form-data">
             <table class='form'>

                 <tr>
                     <td>
                         <label>Name</label>
                     </td>
                     <td>
                         <input type="text" name="productName" placeholder="Enter Product Name..." class="medium" />
                     </td>
                 </tr>
                 <tr>
                     <td>
                         <label>Category</label>
                     </td>
                     <td>
                         <select id="select" name="category">ỏ
                             <option>------Select Category-------</option>
                             <?php

                                foreach ($category as $key => $cate) {
                                ?>
                                 <option value="<?php
                                                echo $cate['catId']
                                                ?>"><?php
                                                    echo $cate['catName']
                                                    ?></option>
                             <?php
                                }
                                // }
                                ?>
                         </select>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         <label>Brand</label>
                     </td>
                     <td>
                         <select id="select" name="brand">
                             <option>-------Select Brand-------</option>
                             <?php

                                foreach ($brand as $key => $bra) {

                                ?>
                                 <option value="<?php
                                                echo $bra['brandId']
                                                ?>"><?php
                                                    echo $bra['brandName']
                                                    ?></option>
                             <?php
                                }
                                // }
                                ?>
                         </select>

                     </td>
                 </tr>

                 <tr>
                     <td style="vertical-align: top; padding-top: 9px;">
                         <label>Description</label>
                     </td>
                     <td>
                         <textarea style="height:120px;" name="product_desc" class="tinymce"></textarea>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         <label>Price</label>
                     </td>
                     <td>
                         <input type="text" name="price" placeholder="Enter Price..." class="medium" />
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
                         <input type="file" name="image_product" id="image" />

                     </td>
                 </tr>

                 <tr>
                     <td>
                         <label>Product Type</label>
                     </td>
                     <td>
                         <select id="select" name="type">
                             <option>Select Type</option>
                             <option value="0">Featured</option>
                             <option value="1">Non-Featured</option>
                         </select>
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
 </div>
 <!-- Load TinyMCE -->
 <!-- <script src="<?php
                    // echo BASE_URL 
                    ?>/public/template/js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script> -->
 <script type="text/javascript">
     $(document).ready(function() {
         setupTinyMCE();
         setDatePicker('date-picker');
         $('input[type="checkbox"]').fancybutton();
         $('input[type="radio"]').fancybutton();
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