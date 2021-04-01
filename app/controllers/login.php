<?php
class login extends DController
{
    function __construct()
    {
        $message = array();
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->login();
    }
    public function login()
    {
        Session::init();
        if (Session::get('login') == true) {
            header("Location:" . BASE_URL . "/login/dashboard");
        }
        $this->load->view('cpanel/login');
    }

    public function dashboard()
    {
        Session::checkSession();
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/dashboard');
        $this->load->view('cpanel/footer');
    }
    public function authentication_login()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $table_admin = 'tbl_admin';
        $loginmodel = $this->load->model('loginmodel');

        $count = $loginmodel->login($table_admin, $username, $password);

        if ($count == 0) {
            header("Location:" . BASE_URL . "/login");
            // $message['msg'] = "User hoặc mật khẩu sai xin kiểm tra lại";
            // header("Location:".BASE_URL."/login");
        } else {
            // header("Location:".BASE_URL."/login/dashboard");
            $result = $loginmodel->getlogin($table_admin, $username, $password);
            Session::init();
            Session::set('login', true);
            Session::set('username', $result[0]['username']);
            Session::set('userid', $result[0]['admin_id']);
            header("Location:" . BASE_URL . "/login/dashboard");
        }
    }
    public function logout()
    {
        Session::init();
        Session::destroy();
        header("Location:" . BASE_URL . "/");
    }
}
