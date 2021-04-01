<?php
class customer extends DController
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->customer();
    }
    public function customer()
    {
        Session::checkSession();
        $customermodel = $this->load->model('customermodel');
        $table_customer = "tbl_customers";
        $data['customer'] = $customermodel->list_customer($table_customer);

        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/customer/customer', $data);
        $this->load->view('cpanel/footer');
    }
}
