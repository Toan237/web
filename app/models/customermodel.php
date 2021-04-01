<?php
class customermodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insertcustomer($table_customer, $data)
    {
        return $this->db->insert($table_customer, $data);
    }

    public function login($table_customer, $username, $password)
    {
        $sql = "SELECT * FROM $table_customer WHERE customer_email=? AND customer_password=?";

        return $this->db->affectedRows($sql, $username, $password);
    }
    public function getlogin($table_customer, $username, $password)
    {
        $sql = "SELECT * FROM $table_customer WHERE customer_email=? AND customer_password=?";

        return $this->db->selectUser($sql, $username, $password);
    }
    public function show_customer($id)
    {
        $sql = "SELECT * FROM tbl_customers WHERE customer_id='$id' ";
        // $result = $this->db->select($query);
        return $this->db->select($sql);
    }
    public function info_customer($table_customer, $id)
    {
        $sql = "SELECT * FROM $table_customer WHERE customer_id='$id'";
        return $this->db->select($sql);
    }
    public function list_customer($table_customer)
    {
        $sql = "SELECT * FROM $table_customer ORDER BY customer_id DESC ";
        return $this->db->select($sql);
    }
    // -----------------------------------------------
    public function listcategory($table_category)
    {
        $sql = "SELECT * FROM $table_category ORDER BY catId DESC ";
        return $this->db->select($sql);
    }
    public function deletecategory($table_category, $cond)
    {
        return $this->db->delete($table_category, $cond);
    }
    public function categorybyid($table_category, $cond)
    {
        $sql = "SELECT * FROM $table_category WHERE $cond";
        return $this->db->select($sql);
    }
    public function updatecategory($table_category, $data, $cond)
    {
        return $this->db->update($table_category, $data, $cond);
    }
    public function check_result($table_category, $cond)
    {
        $sql = "SELECT * FROM $table_category WHERE $cond ";
        return $this->db->select($sql);
    }
}
