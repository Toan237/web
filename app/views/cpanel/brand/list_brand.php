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
        <h3>Add brand</h3>

        <div style="margin-bottom: 50px">
            <form action="<?php echo BASE_URL ?>/brand/insert_brand" method="POST">

                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" name="brandName" placeholder="Thêm thương hiệu sản phẩm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                </div>
            </form>
        </div>


        <h3>Brand List</h3>
        <div class="block">


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Brand name</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <?php

                $i = 0;
                foreach ($listbrand as $key => $list) {
                    $i++;
                ?>

                    <tbody>
                        <tr>
                            <th scope="row"><?php
                                            echo $i
                                            ?></th>
                            <td><?php
                                echo $list['brandName']
                                ?></td>
                            <td><a href="<?php echo BASE_URL ?>/brand/delete_brand/<?php echo $list['brandId'] ?>">Delete</a></td>
                            <td><a href="<?php echo BASE_URL ?>/brand/edit_brand/<?php echo $list['brandId'] ?>">Edit</a> </td>
                        </tr>


                    </tbody>
                <?php

                }
                ?>
            </table>
            </tbody>
            </table>



        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();
        });
    </script>