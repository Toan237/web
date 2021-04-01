<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<span style="color:blue;font-weight:bold;">' . $value . '</span>';
    }
}
?>
<div class="col-10 section-padding">

    <h3>Sửa danh mục</h3>


    <?php
    foreach ($editcategoryid as $key => $categoryid) {
    ?>
        <form action="<?php echo BASE_URL ?>/category/update_category/<?php echo $categoryid['catId'] ?>" method="post">

            <table class="form">
                <tr>
                    <td>
                        <input type="text" value="<?php echo $categoryid['catName'] ?>" name="catName" placeholder="Sửa danh mục sản phẩm..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</div>