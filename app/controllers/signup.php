<?php
class signup extends DController
{
    function __construct()
    {
        $message = array();
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->signup();
    }
    public function signup()
    {
        $this->load->view('cpanel/signup');
    }
}
