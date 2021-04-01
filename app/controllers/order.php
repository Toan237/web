<?php
class order extends DController
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->order();
    }
    public function order()
    {
        Session::checkSession();
        $ordermodel = $this->load->model('ordermodel');
        $table_order = "tbl_order";
        $data['order'] = $ordermodel->list_order($table_order);



        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/order/order', $data);
        $this->load->view('cpanel/footer');
    }
    public function order_details($order_code)
    {
        Session::checkSession();
        $ordermodel = $this->load->model('ordermodel');
        $table_order_details = "tbl_order_details";
        $table_product = "tbl_product";
        $table_customer = "tbl_customers";

        $cond = "$table_product.productId=$table_order_details.product_id AND $table_order_details.order_code = '$order_code'";
        $cond_info = "$table_order_details.customer_id=$table_customer.customer_id and $table_order_details.order_code='$order_code'";

        $data['order_details'] = $ordermodel->list_order_details($table_product, $table_order_details, $cond);
        $data['order_info'] = $ordermodel->list_info($table_order_details, $cond_info);

        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/order/order_details', $data);
        $this->load->view('cpanel/footer');
    }
    public function order_confirm($order_code)
    {
        $ordermodel = $this->load->model('ordermodel');
        $table_order = "tbl_order";
        $cond = "$table_order.order_code='$order_code'";
        $data = array(
            'order_status' => 1

        );
        $result = $ordermodel->orderconfirm($table_order, $data, $cond);
        if ($result == 1) {
            $message['msg'] = "Đã xử lý đơn hàng thành công";
            header('Location:' . BASE_URL . "/order/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Đã xử lý đơn hàng thất bại";
            header('Location:' . BASE_URL . "/order/?msg=" . urlencode(serialize($message)));
        }
    }
    public function your_order()
    {

        Session::init();
        $id = Session::get('customer_id');
        $table_order_details = "tbl_order_details";
        $table_order = "tbl_order";
        $table_customers = "tbl_customers";
        $table_product = "tbl_product";
        $ordermodel = $this->load->model('ordermodel');

        $data['your_order'] = $ordermodel->list_order_by_id($table_order_details, $table_order, $table_customers, $table_product, $id);

        $this->load->view('header');
        $this->load->view('yourorder', $data);
        $this->load->view('footer');
    }
}
