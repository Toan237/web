<?php
class ordermodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insert_order($table_order, $data_order)
    {
        return $this->db->insert($table_order, $data_order);
    }
    public function insert_order_details($table_order_details, $data_details)
    {
        return $this->db->insert($table_order_details, $data_details);
    }
    public function list_order($table_order)
    {
        $sql = "SELECT * FROM $table_order ORDER BY order_id DESC ";
        return $this->db->select($sql);
    }
    public function list_order_details($table_product, $table_order_details, $cond)
    {
        $sql = "SELECT * FROM $table_order_details,$table_product WHERE $cond ";

        return $this->db->select($sql);
    }
    public function list_info($table_order_details, $cond_info)
    {
        $sql = "SELECT * FROM $table_order_details INNER JOIN tbl_customers ON $cond_info INNER JOIN tbl_order on $table_order_details.order_code=tbl_order.order_code";
        return $this->db->select($sql);
    }
    public function orderconfirm($table_order, $data, $cond)
    {
        return $this->db->update($table_order, $data, $cond);
    }
    public function list_order_by_id($table_order_details, $table_order, $table_customers, $table_product, $customer_id)
    {
        $sql = "SELECT * FROM $table_order_details 
        INNER JOIN $table_customers ON $table_order_details.customer_id=$table_customers.customer_id AND $table_customers.customer_id=$customer_id 
        INNER JOIN $table_product ON $table_order_details.product_id=$table_product.productId
        INNER JOIN $table_order ON $table_order.order_code=$table_order_details.order_code";
        return $this->db->select($sql);
    }
}
