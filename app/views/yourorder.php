<?php if (count($your_order) > 0) { ?>
    <!-- <?php echo '<pre>';
            var_dump($your_order);
            echo '</pre>' ?> -->

    <div class="container">
        <?php foreach ($your_order as $key => $order) { ?>
            <div class="order">
                <div class="th">
                    <div>Product Name</div>
                    <div>Product Image</div>
                    <div>Product Quantity</div>
                    <div>Order Date</div>
                    <div>Status</div>
                </div>

                <div class="td">
                    <div id="order-code">#<?php echo $order['order_code']; ?></div>
                    <div><?php echo $order['productName'] ?></div>
                    <div>
                        <image height="100px" width="100px" style="object-fit:contain" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $order['image'] ?>" ?>
                    </div>
                    <div><?php echo $order['product_quantity'] ?></div>
                    <div><?php echo $order['order_date'] ?></div>
                    <?php if ($order['order_status'] == 0) {
                        echo "<div class='order-status pending'>Pending</div>";
                    } else {
                        echo "<div class='order-status approved'>Approved</div>";
                    }
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>


    </div>
<?php
} else {
?>
    <div class="empty">
        <img src="<?php echo BASE_URL ?>/public/images/undraw_No_data_re_kwbl (1).svg" alt="">
        <p>No order yet</p>
    </div>


<?php
}
?>