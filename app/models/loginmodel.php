<?php
    class loginmodel extends DModel
    {
        public function __construct()
        {
            parent::__construct();
           
        }
        public function login($table_admin,$username,$password)
        {
            $sql = "SELECT * FROM $table_admin WHERE username=? AND password=?";
            
            return $this->db->affectedRows($sql,$username,$password);
        }
        public function getlogin($table_admin,$username,$password)
        {
            $sql = "SELECT * FROM $table_admin WHERE username=? AND password=?";
            
            return $this->db->selectUser($sql,$username,$password);
        }
        // public function categorybyid($table_category_product, $id)
        // {
        //     $sql = "SELECT * FROM $table_category_product WHERE id_category_product=:id";
            
        //     $data = array('id' => $id);
            
        //     return $this->db->select($sql,$data);
            
        // }
        // public function insertcategory($table_category_product,$data)
        // {
        //     return $this->db->insert($table_category_product,$data);
        // }
        // public function updatecategory($table_category_product, $data, $cond)
        // {
        //     return $this->db->update($table_category_product,$data,$cond);
        // }
        // public function deletecategory($table_category_product, $cond)
        // {
        //     return $this->db->delete($table_category_product,$cond);
        // }

    }
?>

