<?php
class slider extends DController
{
    function __construct()
    {
        $data = array();
        $message = array();
        parent::__construct();
    }
    public function index()
    {
        $this->add_slider();
    }
    public function add_slider()
    {
        Session::checkSession();

        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/slider/add_slider');
        $this->load->view('cpanel/footer');
    }
    public function insert_slider()
    {
        $sliderName = $_POST['sliderName'];


        $image = $_FILES['image_slider']['name'];
        $tmp_image = $_FILES['image_slider']['tmp_name'];

        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0] . time() . '.' . $file_ext;

        $path_uploads = "public/uploads/slider/" . $unique_image;

        // $type = $_POST['type'];

        $table_slider = "tbl_slider";

        $data = array(
            'sliderName' => $sliderName,
            'slider_image' => $unique_image,
            // 'type' => $type

        );
        $productmodel = $this->load->model('productmodel');
        $result = $productmodel->insertslider($table_slider, $data);
        if ($result == 1) {
            move_uploaded_file($tmp_image, $path_uploads);
            $message['msg'] = "Thêm sản phẩm thành công";
            header('Location:' . BASE_URL . "/slider/list_slider?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Thêm sản phẩm thất bại";
            header('Location:' . BASE_URL . "/slider/list_slider?msg=" . urlencode(serialize($message)));
        }
    }
    public function list_slider()
    {
        Session::checkSession();
        $table_slider = "tbl_slider";
        $productmodel = $this->load->model('productmodel');
        $data['list_slider'] = $productmodel->listslider($table_slider);
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/slider/list_slider', $data);
        $this->load->view('cpanel/footer');
    }
    public function delete_slider($id)
    {
        $productmodel = $this->load->model('productmodel');
        $table_slider = "tbl_slider";

        $cond = "sliderid=$id";

        $result = $productmodel->deleteslider($table_slider, $cond);

        if ($result == 1) {
            $message['msg'] = "Xóa dữ liệu thành công";
            header('Location:' . BASE_URL . "/slider/list_slider?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Xóa dữ liệu thất bại";
            header('Location:' . BASE_URL . "/slider/list_slider?msg=" . urlencode(serialize($message)));
        }
    }
}
