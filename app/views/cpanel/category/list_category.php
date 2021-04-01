<div class="col-10 ">

    <div class="dashboard--layout">
        <?php
        if (!empty($_GET['msg'])) {
            $msg = unserialize(urldecode($_GET['msg']));
            foreach ($msg as $key => $value) {
                echo '<div class="alert alert-success" role="alert" style="width: 500px; margin-bottom: 30px">' . $value . '</div>';
            }
        }
        ?>
        <h3>Add category</h3>


        <form action="<?php echo BASE_URL ?>/category/insert_category" method="post" style="margin-bottom: 50px">

            <div class="input-group mb-3 mt-3">
                <input type="text" class="form-control" name="catName" placeholder="Category sản phẩm" aria-label="Recipient's username" aria-describedby="basic-addon2">

            </div>

        </form>


        <h3>Category List</h3>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"> Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($listcategory as $key => $list) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $list['catName'] ?></td>
                        <td><a href="<?php echo BASE_URL ?>/category/delete_category/<?php echo $list['catId'] ?>">Delete</a> || <a href="<?php echo BASE_URL ?>/category/edit_category/<?php echo $list['catId'] ?>">Edit</a></td>
                    </tr>
                <?php
                }
                ?>

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