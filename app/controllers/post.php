<?php
class Post extends DController
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->post();
    }

    public function post()
    {
        $this->load->view('header');
        $this->load->view('post');
        $this->load->view('footer');
    }
}
