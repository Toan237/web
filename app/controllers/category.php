<?php
class category extends DController
{
    function __construct()
    {
        $data = array();
        // $message = array();
        parent::__construct();
    }
    public function index()
    {
        $this->add_category();
    }
    public function add_category()
    {
        Session::checkSession();
        // echo 'Don hang here';
        // Session::checkSession();
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/category/add_category');
        $this->load->view('cpanel/footer');
    }


    public function insert_category()
    {
        $catName = $_POST['catName'];
        $table_category = 'tbl_category';
        $data = array(
            'catName' => $catName
        );
        $cond = "catName ='$catName'";
        $categorymodel = $this->load->model('categorymodel');
        $check_result = $categorymodel->check_result($table_category, $cond);

        if (!empty($check_result)) {
            $message['msg'] = "Đã tồn tại danh mục sản phẩm.";
            header('Location:' . BASE_URL . "/category/list_category?msg=" . urlencode(serialize($message)));
        } else {
            $result = $categorymodel->insertcategory($table_category, $data);
            if ($result == 1) {
                $message['msg'] = "Thêm dữ liệu thành công";
                header('Location:' . BASE_URL . "/category/list_category/?msg=" . urlencode(serialize($message)));
            } else {
                $message['msg'] = "Thêm dữ liệu thất bại";
                header('Location:' . BASE_URL . "/category/list_category/?msg=" . urlencode(serialize($message)));
            }
        }
    }
    public function list_category()
    {
        $categorymodel = $this->load->model('categorymodel');
        $table_category = 'tbl_category';
        $data['listcategory'] = $categorymodel->listcategory($table_category);
        //-------------------------- 
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');

        $this->load->view('cpanel/category/list_category', $data);
        $this->load->view('cpanel/footer');
    }
    public function delete_category($id)
    {
        $categorymodel = $this->load->model('categorymodel');
        $table_category = 'tbl_category';
        $cond = "catId=$id";

        $productmodel = $this->load->model('productmodel');
        $table_product = 'tbl_product';

        $result_product = $productmodel->productbyid($table_product, $cond);
        if (!empty($result_product)) {
            $message['msg'] = "Không thể xóa,còn sản phẩm chứa danh mục.";
            header('Location:' . BASE_URL . "/category/list_category?msg=" . urlencode(serialize($message)));
        } else {
            $result = $categorymodel->deletecategory($table_category, $cond);
            if ($result == 1) {
                $message['msg'] = "Xóa dữ liệu thành công";
                header('Location:' . BASE_URL . "/category/list_category?msg=" . urlencode(serialize($message)));
            } else {
                $message['msg'] = "Xóa dữ liệu thất bại";
                header('Location:' . BASE_URL . "/category/list_category?msg=" . urlencode(serialize($message)));
            }
        }
    }
    public function edit_category($id)
    {
        $table_category = "tbl_category";
        $cond = "catId='$id'";
        $categorymodel = $this->load->model('categorymodel');
        $data['editcategoryid'] = $categorymodel->categorybyid($table_category, $cond);
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/category/edit_category', $data);
        $this->load->view('cpanel/footer');
    }
    public function update_category($id)
    {
        $categorymodel = $this->load->model('categorymodel');
        $table_category = 'tbl_category';
        $cond = "catId='$id'";
        $catName = $_POST['catName'];
        $data = array(
            'catName' => $catName


        );
        $result = $categorymodel->updatecategory($table_category, $data, $cond);
        if ($result == 1) {
            $message['msg'] = "Cập nhật dữ liệu thành công";
            header('Location:' . BASE_URL . "/category/list_category?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Cập nhật dữ liệu thất bại";
            header('Location:' . BASE_URL . "/category/list_category?msg=" . urlencode(serialize($message)));
        }
    }
}
