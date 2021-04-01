<?php
class khachhang extends DController
{
    function __construct()
    {

        parent::__construct();
    }
    public function index()
    {
        $this->khachhang();
    }
    public function khachhang()
    {
    }
    public function dangnhap()
    {

        Session::init();

        $this->load->view('customer_login');
    }
    public function dangky()
    {
        Session::init();

        $this->load->view('customer_register');
    }
    public function lichsudonhang()
    {
    }
    public function dangxuat()
    {

        Session::init();
        Session::destroy();
        // $message['msg'] = "Đăng xuất thành công";
        // header('Location:' . BASE_URL . "/khachhang/dangnhap?msg=" . urlencode(serialize($message)));
        header('Location:' . BASE_URL);
    }
    public function check_khachhang()
    {
        Session::init();
        // echo Session::get('customer');


    }
    public function login_customer()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $table_customer = 'tbl_customers';
        $customermodel = $this->load->model('customermodel');

        $count = $customermodel->login($table_customer, $username, $password);

        if ($count == 0) {
            // header("Location:".BASE_URL."/login");
            $message['error'] = "Tên tài khoản hoặc mật khẩu sai xin kiểm tra lại";
            header('Location:' . BASE_URL . "/khachhang/dangnhap?error=" . urlencode(serialize($message)));
        } else {
            // header("Location:".BASE_URL."/login/dashboard");
            $result = $customermodel->getlogin($table_customer, $username, $password);

            Session::init();
            Session::set('customer', true);
            Session::set('customer_name', $result[0]['customer_name']);
            Session::set('customer_id', $result[0]['customer_id']);
            $message['msg'] = "Đăng nhập thành công";
            header('Location:' . BASE_URL
                // ."/khachhang/dangnhap?msg=".urlencode(serialize($message))
            );
        }
    }
    public function insert_dangky()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['sodienthoai'];
        $address = $_POST['diachi'];
        $password = $_POST['password'];



        $table_customer = "tbl_customers";

        $data = array(
            'customer_name' => $name,
            'customer_email' => $email,
            'customer_phone' => $phone,
            'customer_address' => $address,
            'customer_password' => md5($password)

        );

        $customermodel = $this->load->model('customermodel');

        $result = $customermodel->insertcustomer($table_customer, $data);
        if ($result == 1) {
            $message['success'] = "Đăng ký thành công, mời bạn đăng nhập";
            header('Location:' . BASE_URL . "/khachhang/dangky?success=" . urlencode(serialize($message)));
        } else {
            $message['error'] = "Đăng ký thất bại";
            header('Location:' . BASE_URL . "/khachhang/dangky?error=" . urlencode(serialize($message)));
        }
    }

    public function loginpage()
    {
        $this->load->view('header');
        $this->load->view('loginpage');
        $this->load->view('footer');
    }
    public function search()
    {
        $search = $_POST['search'];
        $cond = "$search";
        $table_product = 'tbl_product';

        $productmodel = $this->load->model('productmodel');
        $check_result = $productmodel->check_product($table_product, $cond);
        if (empty($check_result)) {

            header('Location:' . BASE_URL);
        } else {

            $data['check_search'] = $productmodel->search_product($table_product, $cond);
            $this->load->view('header');
            // // $this->load->view('slider',$data1);
            $this->load->view('search', $data);
            $this->load->view('footer');
        }
        // print_r($data);
        // $table_slider = "tbl_slider";
        // $cond_slider = "type='1'";
        // $data1['slider_show'] = $productmodel->show_slider($table_slider, $cond);


    }
    // public function notfound()
    // {
    //     $this->load->view('header');
    //     $this->load->view('404');
    //     $this->load->view('footer');
    // }
}
