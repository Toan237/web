<div class="main" style="background: #fff">

    <div class="container">

        <div class="content_top">
            <h3 style="margin-bottom: 40px">Tìm kiếm sản phẩm</h3>
            <div class="section group row mt-3">
                <?php
                $i = 0;
                foreach ($check_search as $key => $each) {
                    $i++;
                ?>



                    <div class="col-6 col-md-6 col-xl-2 product product" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000" data-aos-delay="<?php echo $i * 50 ?>">
                        <a href="<?php echo BASE_URL ?>/product/productdetails/<?php echo $each['productId'] ?>">
                            <div class="card">
                                <img class="card-img-top" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $each['image'] ?>" alt="" />
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $each['productName'] ?></h5>
                                    <p><span class="price"><?php echo "$" . $each['price'] ?></span></p>
                                </div>
                            </div>

                            <form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="POST" class="buy-form">
                                <input type="hidden" value="<?php echo $each['productId'] ?>" name="product_id">
                                <input type="hidden" value="<?php echo $each['productName'] ?>" name="product_name">
                                <input type="hidden" value="<?php echo $each['image'] ?>" name="product_image">
                                <input type="hidden" value="<?php echo $each['price'] ?>" name="product_price">
                                <input type="hidden" value="1" name="product_quantity">
                                <button class="btn btn-primary buyBtn">Buy</button>
                            </form>
                        </a>

                    </div>

                <?php
                    // }
                }
                // }
                ?>
            </div>
        </div>

        <div class="content_bottom">

        </div>
    </div>
    <?php
