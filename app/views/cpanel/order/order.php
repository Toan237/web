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
        <h3>Danh sách đơn hàng</h3>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Đơn hàng</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Quản lí</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($order as $key => $ord) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $ord['order_code'] ?></td>
                        <td><?php echo $ord['order_date'] ?></td>
                        <td><?php if ($ord['order_status'] == 0) {
                                echo 'Chưa xác nhận';
                            } else {
                                echo 'Đã xác nhận';
                            } ?></td>
                        <td><a href="<?php echo BASE_URL ?>/order/order_details/<?php echo $ord['order_code'] ?>">Xem đơn hàng</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="pull-right">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>


                    <li class="<?php
                                // echo ($i == $p) ? 'active' : '' 
                                ?>">
                        <a href="?page=<?php
                                        // echo $i ;
                                        ?>"><?php
                                            // echo $i; 
                                            ?></a>
                    </li>

                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                </ul>
            </nav>
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