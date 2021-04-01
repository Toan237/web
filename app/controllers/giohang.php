<?php
class giohang extends DController
{
    function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->giohang();
    }
    public function giohang()
    {
        Session::init();

        $table_customer = "tbl_customers";
        $customermodel = $this->load->model('customermodel');
        if (isset($_SESSION['customer_id'])) {
            $id = $_SESSION['customer_id'];
            $data['khachhang'] = $customermodel->info_customer($table_customer, $id);

            $this->load->view('header');
            $this->load->view('cart', $data);
            $this->load->view('footer');
        } else {
            $this->load->view('header');
            $this->load->view('cart');
            $this->load->view('footer');
        }
    }
    public function dathang()
    {
        Session::init();

        $table_order = "tbl_order";
        $table_order_details = "tbl_order_details";
        $ordermodel = $this->load->model('ordermodel');

        $customer_id = $_POST['customer_id'];
        $order_code = rand(0, 9999);

        date_default_timezone_set("Asia/ho_chi_minh");
        $date = date("d/m/Y");
        $hour = date("h:i:sa");


        $data_order = array(
            'order_status' => 0,
            'order_code' => $order_code,
            'order_date' => $date . ' ' . $hour,
        );


        $result_order = $ordermodel->insert_order($table_order, $data_order);



        if (Session::get("shopping_cart") == true) {
            foreach (Session::get("shopping_cart") as $key => $value) {
                $data_details = array(
                    'order_code' => $order_code,
                    'product_id' => $value['product_id'],
                    'product_quantity' => $value['product_quantity'],
                    'customer_id' => $customer_id,

                );
                $result_order_details = $ordermodel->insert_order_details($table_order_details, $data_details);
            }
            unset($_SESSION["shopping_cart"]);
        }
        if ($result_order_details) {
            $message['msg'] = "Đặt hàng thành công, chúng tôi sẽ giao hàng sớm nhất có thể";
            header('Location:' . BASE_URL . "/giohang?msg=" . urlencode(serialize($message)));
        }
    }

    public function themgiohang()
    {
        Session::init();
        // Session::destroy();
        if (isset($_SESSION["shopping_cart"])) {
            $avaiable = 0;
            foreach ($_SESSION["shopping_cart"] as $key => $value) {
                if ($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['product_id']) {
                    $avaiable++;
                    $_SESSION["shopping_cart"][$key]['product_quantity'] = $_SESSION["shopping_cart"][$key]['product_quantity'] + $_POST['product_quantity'];
                }
            }
            if ($avaiable == 0) {
                $item = array(
                    'product_id' => $_POST["product_id"],
                    'product_name' => $_POST["product_name"],
                    'product_price' => $_POST["product_price"],
                    'product_image' => $_POST["product_image"],
                    'product_quantity' => $_POST["product_quantity"]
                );
                $_SESSION["shopping_cart"][] = $item;
            }
        } else {
            $item = array(
                'product_id' => $_POST["product_id"],
                'product_name' => $_POST["product_name"],
                'product_image' => $_POST["product_image"],
                'product_price' => $_POST["product_price"],
                'product_quantity' => $_POST["product_quantity"]
            );
            $_SESSION["shopping_cart"][] = $item;
        }
        header("Location:" . BASE_URL . '/giohang');
    }
    public function updategiohang()
    {
        Session::init();

        if (isset($_POST["delete_cart"])) {
            if (isset($_SESSION["shopping_cart"])) {
                foreach ($_SESSION["shopping_cart"] as $key => $values) {
                    if ($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['delete_cart']) {
                        unset($_SESSION["shopping_cart"][$key]);
                    }
                }
                header("Location:" . BASE_URL . '/giohang');
            } else {
                header("Location:" . BASE_URL);
            }
        } else {
            foreach ($_POST["qty"] as $key => $qty) {

                foreach ($_SESSION["shopping_cart"] as $session => $values) {
                    if ($values['product_id'] == $key && $qty >= 1) {
                        $_SESSION["shopping_cart"][$session]['product_quantity'] = $qty;
                    }
                }
            }
            header("Location:" . BASE_URL . '/giohang');
        }
    }
}
