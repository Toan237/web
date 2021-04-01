<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<span style="color:blue;font-weight:bold;">' . $value . '</span>';
    }
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h3>Cập nhật thương hiệu thương hiệu</h3>
        <div class="block copyblock">
            <?php
            foreach ($editbrandid as $key => $brandid) {
            ?>
                <form action="<?php echo BASE_URL ?>/brand/update_brand/<?php echo $brandid['brandId'] ?>" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $brandid['brandName'] ?>" name="brandname" placeholder="Thêm thương hiệu sản phẩm..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="btn btn-primary" type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>