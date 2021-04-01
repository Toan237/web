<div class="col-10">
    <div class="dashboard--layout">
        <div style="display: flex; justify-content: space-between">
            <h3>Thông tin đơn hàng</h3>




            <?php if ($order_info[0]['order_status'] == '0') { ?>

                <form action="<?php echo BASE_URL ?>/order/order_confirm/<?php echo $order_info[0]['order_code'] ?>" method="POST">
                    <button class="btn btn-dark">Xác nhận đơn hàng cho khách</button>
                </form>
            <?php
            }
            ?>

        </div>

        <table class="table" id="example">
            <thead>
                <tr>
                    <th scope="col">Order Code</th>
                    <th scope="col">Tên người đặt</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($order_info as $key => $ord) {

                ?>

                    <tr>
                        <td><?php echo $ord['order_code'] ?></td>
                        <td><?php echo $ord['customer_name'] ?></td>
                        <td><?php echo $ord['customer_email'] ?></td>
                        <td><?php echo $ord['customer_phone'] ?></td>
                        <td><?php echo $ord['customer_address'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <h3 style="margin-top: 50px">Danh sách đơn hàng</h3>


        <table class="table" id="example">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $total = 0;
                foreach ($order_details as $key => $ord) {
                    $total += $ord['product_quantity'] * $ord['price'];
                    $i++;

                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $ord['productName'] ?></td>
                        <td><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $ord['image'] ?>" height="100" width="100" alt=""></td>

                        <td><?php echo $ord['product_quantity'] ?></td>
                        <td><?php echo number_format($ord['price'], 0, ',', '.') . 'đ' ?></td>
                        <td><?php echo number_format($ord['product_quantity'] * $ord['price'], 0, ',', '.') . 'đ' ?></td>
                    </tr>
                <?php
                }
                ?>

            </tbody>


        </table>

        <p style="font-weight: bold; font-size: 18px">Tổng tiền:<?php
                                                                echo number_format($total, 0, ',', '.') . 'đ'
                                                                ?></p><br>


    </div>
</div>