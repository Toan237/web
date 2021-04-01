<?php

class categorymodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insertcategory($table_category, $data)
    {
        return $this->db->insert($table_category, $data);
    }
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
