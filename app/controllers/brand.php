<?php
class brand extends DController
{
    function __construct()
    {
        $data = array();
        // $message = array();
        parent::__construct();
    }
    public function index()
    {
        $this->add_brand();
    }
    public function add_brand()
    {
        Session::checkSession();
        // echo 'Don hang here';
        // Session::checkSession();
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/brand/add_brand');
        $this->load->view('cpanel/footer');
    }
    public function insert_brand()
    {
        $branName = $_POST['brandName'];
        $table_brand = 'tbl_brand';
        $data = array(
            'brandName' => $branName
        );
        $cond = "brandName='$branName'";
        $brandmodel = $this->load->model('brandmodel');

        $check_result = $brandmodel->check_result($table_brand, $cond);

        if (!empty($check_result)) {
            $message['msg'] = "Đã tồn tại thương hiệu.";
            header('Location:' . BASE_URL . "/brand/list_brand?msg=" . urlencode(serialize($message)));
        } else {
            $result = $brandmodel->insertbrand($table_brand, $data);
            if ($result == 1) {
                $message['msg'] = "Thêm dữ liệu thành công";
                header('Location:' . BASE_URL . "/brand/list_brand?msg=" . urlencode(serialize($message)));
            } else {
                $message['msg'] = "Thêm dữ liệu thất bại";
                header('Location:' . BASE_URL . "/brand/list_brand?msg=" . urlencode(serialize($message)));
            }
        }
    }
    public function list_brand()
    {
        // danh sach brand
        $brandmodel = $this->load->model('brandmodel');
        $table_brand = 'tbl_brand';
        $data['listbrand'] = $brandmodel->listbrand($table_brand);
        //-------------------------- 
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');

        $this->load->view('cpanel/brand/list_brand', $data);
        $this->load->view('cpanel/footer');
    }
    public function delete_brand($id)
    {

        $brandmodel = $this->load->model('brandmodel');
        $table_brand = 'tbl_brand';
        $cond = "brandId=$id";

        $productmodel = $this->load->model('productmodel');
        $table_product = 'tbl_product';
        $result_brand = $productmodel->productbyid($table_product, $cond);

        if (!empty($result_brand)) {
            $message['msg'] = "Không thể xóa, còn sản phẩm có thương hiệu.";
            header('Location:' . BASE_URL . "/brand/list_brand?msg=" . urlencode(serialize($message)));
        } else {
            $result = $brandmodel->deletebrand($table_brand, $cond);
            if ($result == 1) {
                $message['msg'] = "Xóa dữ liệu thành công";
                header('Location:' . BASE_URL . "/brand/list_brand?msg=" . urlencode(serialize($message)));
            } else {
                $message['msg'] = "Xóa dữ liệu thất bại";
                header('Location:' . BASE_URL . "/brand/list_brand?msg=" . urlencode(serialize($message)));
            }
        }
    }
    public function edit_brand($id)
    {
        $table_brand = "tbl_brand";
        $cond = "brandId='$id'";
        $brandmodel = $this->load->model('brandmodel');
        $data['editbrandid'] = $brandmodel->brandbyid($table_brand, $cond);
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/brand/edit_brand', $data);
        $this->load->view('cpanel/footer');
    }
    public function update_brand($id)
    {
        $brandmodel = $this->load->model('brandmodel');
        $table_brand = 'tbl_brand';
        $cond = "brandId='$id'";
        $brandName = $_POST['brandname'];
        $data = array(
            'brandName' => $brandName


        );
        $result = $brandmodel->updatebrand($table_brand, $data, $cond);
        if ($result == 1) {
            $message['msg'] = "Cập nhật dữ liệu thành công";
            header('Location:' . BASE_URL . "/brand/list_brand?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Cập nhật dữ liệu thất bại";
            header('Location:' . BASE_URL . "/brand/list_brand?msg=" . urlencode(serialize($message)));
        }
    }
}
