<?php
class allproduct extends DController
{
    function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->danhmuc();
    }
    public function tatca()
    {
        $current_page = 1;
        $per_page = 3;
        if (isset($_GET['p'])) {
            $current_page = $_GET['p'];
        }

        Session::init();
        $table_product = 'tbl_product';

        $productmodel = $this->load->model('productmodel');


        $total = $productmodel->product_all_quantity($table_product);
        $data['product_all'] = $productmodel->pagination($table_product, ($current_page - 1) * $per_page, $per_page);
        $data['current_page'] = $current_page;
        $data['max_page'] = ceil($total[0]['total'] / $per_page);

        $this->load->view('header');
        $this->load->view('all_product', $data);
        $this->load->view('footer');
    }

    public function brand($brand)
    {
        // allproduct/brand/dell


        $productmodel = $this->load->model('productmodel');

        $data['product_all'] = $productmodel->getProductByBrand($brand);

        $this->load->view('header');
        $this->load->view('all_product', $data);
        $this->load->view('footer');
    }
}
