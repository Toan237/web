<?php
class index extends DController
{
    function __construct()
    {

        parent::__construct();
    }
    public function index()
    {
        $this->homepage();
    }
    public function homepage()
    {

        Session::init();
        $table_product = "tbl_product";
        $cond = "type='0'";
        $productmodel = $this->load->model('productmodel');
        $data['productfeathered'] = $productmodel->getproduct_featheread($table_product, $cond);
        $data['productnew'] = $productmodel->getproduct_new($table_product);
        $data['productHP'] = $productmodel->getproduct_HP($table_product);
        $data['productDELL'] = $productmodel->getproduct_DELL($table_product);
        $data['productLENOVO'] = $productmodel->getproduct_LENOVO($table_product);

        $table_slider = "tbl_slider";

        $data['slider_show'] = $productmodel->show_slider($table_slider, $cond);

        $cond_product1 = "type='1'";
        $cond_product = "type='0'";
        $data['product_hot'] = $productmodel->product_hot($table_product, $cond_product);
        $data['product_hot1'] = $productmodel->product_hot($table_product, $cond_product1);

        $table_brand = 'tbl_brand';
        $brandmodel = $this->load->model('brandmodel');
        $data['brands'] = $brandmodel->listbrand($table_brand);


        $this->load->view('header');
        $this->load->view('preloader');
        $this->load->view('slider', $data);
        $this->load->view('home', $data);
        $this->load->view('footer');
    }
    public function loginpage()
    {
        $this->load->view('header');
        $this->load->view('loginpage');
        $this->load->view('signup');
        $this->load->view('footer');
    }
    public function search()
    {

        Session::init();
        $search = $_GET['search'];
        $cond = "$search";
        $table_product = 'tbl_product';

        $productmodel = $this->load->model('productmodel');
        $check_result = $productmodel->check_product($table_product, $cond);
        if (empty($check_result)) {

            header('Location:' . BASE_URL);
        } else {

            $data['check_search'] = $productmodel->search_product($table_product, $cond);
            $this->load->view('header');
            $this->load->view('search', $data);
            $this->load->view('footer');
        }
    }
    public function notfound()
    {
        Session::init();

        $this->load->view('header');
        $this->load->view('404');
        $this->load->view('footer');
    }
}
