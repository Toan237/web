<?php
    class brandmodel extends DModel
    {
        public function __construct()
        {
            parent::__construct();
           
        }
        public function insertbrand($table_brand,$data)
        {
            return $this->db->insert($table_brand,$data);
        }
        public function listbrand($table_brand)
        {
            $sql = "SELECT * FROM $table_brand ORDER BY brandId DESC "; 
            return $this->db->select($sql);
        }
        public function deletebrand($table_brand, $cond)
        {
            return $this->db->delete($table_brand,$cond);
        }
        public function brandbyid($table_brand, $cond)
        {
            $sql = "SELECT * FROM $table_brand WHERE $cond"; 
            return $this->db->select($sql);   
        }
        public function updatebrand($table_brand, $data, $cond)
        {
            return $this->db->update($table_brand,$data,$cond);
        }
        public function check_result($table_brand,$cond)
        {
            $sql = "SELECT * FROM $table_brand WHERE $cond ";
            return $this->db->select($sql);
        }
    }
