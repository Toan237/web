<?php
class productmodel extends DModel
{
    function __construct()
    {
        parent::__construct();
        // echo 'This is homemodel';
    }
    public function insertproduct($table_product, $data)
    {
        return $this->db->insert($table_product, $data);
    }

    public function allproduct()
    {
        $sql = "SELECT * FROM tbl_product";
        return $this->db->select($sql);
    }
    public function list_product($table_product, $table_category)
    {

        $sql = "SELECT * FROM $table_product,$table_category WHERE 
            $table_product.catId = $table_category.catId
            ORDER BY $table_product.productId DESC ";
        return $this->db->select($sql);
    }
    public function deleteproduct($table_product, $cond)
    {
        return $this->db->delete($table_product, $cond);
    }
    public function productbyid($table_product, $cond)
    {
        $sql = "SELECT * FROM $table_product WHERE $cond";
        return $this->db->select($sql);
    }
    public function updateproduct($table_product, $data, $cond)
    {
        return $this->db->update($table_product, $data, $cond);
    }
    public function getproduct_featheread($table_product, $cond)
    {
        $sql = "SELECT * FROM $table_product where $cond order by productId desc LIMIT 6 ";
        return $this->db->select($sql);
    }
    public function getproduct_new($table_product)
    {
        $sql = "SELECT * FROM $table_product order by productId desc LIMIT 6 ";
        return $this->db->select($sql);
    }
    public function getproduct_HP($table_product)
    {
        $sql = "SELECT * FROM $table_product inner join tbl_brand on $table_product.brandId=tbl_brand.brandId and tbl_brand.brandName='hp' ";
        return $this->db->select($sql);
    }
    public function getproduct_DELL($table_product)
    {
        $sql = "SELECT * FROM $table_product inner join tbl_brand on $table_product.brandId=tbl_brand.brandId and tbl_brand.brandName='dell' ";
        return $this->db->select($sql);
    }
    public function getproduct_LENOVO($table_product)
    {
        $sql = "SELECT * FROM $table_product inner join tbl_brand on $table_product.brandId=tbl_brand.brandId and tbl_brand.brandName='lenovo' ";
        return $this->db->select($sql);
    }


    public function get_details($table_product, $table_brand, $table_category, $cond)
    {
        $sql =
            "SELECT $table_product.*, $table_category.catName, $table_brand.brandName
			 FROM $table_product INNER JOIN $table_category ON $table_product.catId = $table_category.catId
								INNER JOIN $table_brand ON $table_product.brandId = $table_brand.brandId
			 WHERE $cond ";
        return $this->db->select($sql);
    }
    public function insertslider($table_slider, $data)
    {
        return $this->db->insert($table_slider, $data);
    }
    public function listslider($table_slider)
    {
        $sql = "SELECT * FROM $table_slider ORDER BY sliderid DESC ";
        return $this->db->select($sql);
    }
    public function deleteslider($table_slider, $cond)
    {
        return $this->db->delete($table_slider, $cond);
    }
    public function show_slider($table_slider, $cond)
    {
        $sql = "SELECT * FROM $table_slider where $cond order by sliderid desc";
        $result = $this->db->select($sql);
        return $result;
    }
    public function search_product($table_product, $cond)
    {
        $sql = " SELECT * FROM $table_product WHERE productName LIKE '%$cond%'";
        return $this->db->select($sql);
    }
    public function check_product($table_product, $cond)
    {
        $sql = " SELECT * FROM $table_product WHERE productName LIKE '%$cond%'";
        return $this->db->select($sql);
    }
    public function product_hot($table_product, $cond_product)
    {
        $sql = "SELECT * FROm $table_product WHERE $cond_product ORDER BY productId DESC LIMIT 2";
        return $this->db->select($sql);
    }
    public function product_hot1($table_product, $cond_product1)
    {
        $sql = "SELECT * FROm $table_product WHERE $cond_product1 ORDER BY productId DESC LIMIT 2";
        return $this->db->select($sql);
    }
    public function product_all($table_product)
    {
        $sql = "SELECT * FROM $table_product order by $table_product.productId desc";
        return $this->db->select($sql);
    }
    public function product_all_quantity($table_product)
    {
        $sql = "SELECT COUNT(*) as total FROM $table_product order by $table_product.productId desc";
        return $this->db->select($sql);
    }

    public function pagination($table_product, $start, $perpage)
    {
        $sql = "SELECT * FROM $table_product order by $table_product.productId desc LIMIT $start, $perpage";
        return $this->db->select($sql);
    }

    public function check_result($table_product, $cond_check)
    {
        $sql = "SELECT * FROM $table_product WHERE $cond_check ";
        return $this->db->select($sql);
    }

    public function getProductByBrand($brand)
    {
        $sql = "SELECT * FROM tbl_product INNER JOIN tbl_brand ON tbl_brand.brandId = tbl_product.brandId WHERE tbl_brand.brandName = '$brand'";

        return $this->db->select($sql);
    }
}
