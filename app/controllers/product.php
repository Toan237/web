<?php
class product extends DController
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->add_product();
    }
    public function add_product()
    {
        Session::checkSession();
        //brand
        $table_brand = "tbl_brand";
        $brandmodel = $this->load->model('brandmodel');
        $data['brand'] = $brandmodel->listbrand($table_brand);
        //category
        $table_category = "tbl_category";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->listcategory($table_category);



        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/product/add_product', $data);
        $this->load->view('cpanel/footer');
    }
    public function insert_product()
    {
        $productName = $_POST['productName'];
        $category = $_POST['category'];
        $brand = $_POST['brand'];
        $product_desc = $_POST['product_desc'];
        $price = $_POST['price'];

        $image = $_FILES['image_product']['name'];
        $tmp_image = $_FILES['image_product']['tmp_name'];

        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0] . time() . '.' . $file_ext;

        $path_uploads = "public/uploads/product/" . $unique_image;

        $type = $_POST['type'];

        $table_product = "tbl_product";

        $data = array(
            'productName' => $productName,
            'catId' => $category,
            'brandId' => $brand,
            'product_desc' => $product_desc,
            'price' => $price,
            'image' => $unique_image,
            'type' => $type

        );
        // 
        $cond_check = "productName ='$productName'";
        $productmodel = $this->load->model('productmodel');
        $check_result = $productmodel->check_result($table_product, $cond_check);
        // 

        if (!empty($check_result)) {
            $message['msg'] = "Đã tồn tại sản phẩm. Mời nhập lại";
            header('Location:' . BASE_URL . "/product/add_product?msg=" . urlencode(serialize($message)));
        } else {
            $result = $productmodel->insertproduct($table_product, $data);
            if ($result == 1) {
                move_uploaded_file($tmp_image, $path_uploads);
                $message['msg'] = "Thêm sản phẩm thành công";
                header('Location:' . BASE_URL . "/product/add_product?msg=" . urlencode(serialize($message)));
            } else {
                $message['msg'] = "Thêm sản phẩm thất bại";
                header('Location:' . BASE_URL . "/product/add_product?msg=" . urlencode(serialize($message)));
            }
        }
    }
    public function list_product()
    {

        $current_page = 1;
        $per_page = 5;
        if (isset($_GET['p'])) {
            $current_page = $_GET['p'];
        }

        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');

        $table_product = "tbl_product";
        $table_category = "tbl_category";
        // $table_brand = "tbl_brand";
        $productmodel = $this->load->model('productmodel');

        $total = $productmodel->product_all_quantity($table_product);
        $data['listproduct'] = $productmodel->pagination($table_product, ($current_page - 1) * $per_page, $per_page);
        $data['current_page'] = $current_page;
        $data['max_page'] = ceil($total[0]['total'] / $per_page);

        // $data['listproduct'] = $productmodel->list_product($table_product, $table_category);

        $this->load->view('cpanel/product/list_product', $data);
        $this->load->view('cpanel/footer');
    }
    public function delete_product($id)
    {
        $table_product = "tbl_product";
        $cond = "productId='$id'";
        $productmodel = $this->load->model('productmodel');
        $result = $productmodel->deleteproduct($table_product, $cond);
        if ($result == 1) {
            $message['msg'] = "Xóa sản phẩm thành công";
            header('Location:' . BASE_URL . "/product/list_product/?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Xóa sản phẩm thất bại";
            header('Location:' . BASE_URL . "/product/list_product/?msg=" . urlencode(serialize($message)));
        }
    }
    public function edit_product($id)
    {
        $table_product = "tbl_product";
        $cond = "productId='$id'";
        $productmodel = $this->load->model('productmodel');
        $data['productbyid'] = $productmodel->productbyid($table_product, $cond);
        // $data['category'] = $model->category($table_category);
        //brand
        $table_brand = "tbl_brand";
        $brandmodel = $this->load->model('brandmodel');
        $data['brand'] = $brandmodel->listbrand($table_brand);
        //category
        $table_category = "tbl_category";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->listcategory($table_category);


        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/product/edit_product', $data);
        $this->load->view('cpanel/footer');
    }
    public function update_product($id)
    {
        $table_product = "tbl_product";
        $cond = "productId='$id'";
        $productmodel = $this->load->model('productmodel');

        $productName = $_POST['productName'];
        $category = $_POST['category'];
        $brand = $_POST['brand'];
        $product_desc = $_POST['product_desc'];
        $price = $_POST['price'];
        $type = $_POST['type'];

        $image = $_FILES['image_product']['name'];
        $tmp_image = $_FILES['image_product']['tmp_name'];

        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0] . time() . '.' . $file_ext;

        $path_uploads = "public/uploads/product/" . $unique_image;

        if ($image) {

            $data['productbyid'] = $productmodel->productbyid($table_product, $cond);
            foreach ($data['productbyid'] as $key => $value) {
                // if($value['image_product'])
                // {
                $path_unlink = "public/uploads/product/";
                unlink($path_unlink . $value['image']);
                // }
            }

            $data = array(
                'productName' => $productName,
                'catId' => $category,
                'brandId' => $brand,
                'product_desc' => $product_desc,
                'price' => $price,
                'image' => $unique_image,
                'type' => $type

            );
            move_uploaded_file($tmp_image, $path_uploads);
        } else {
            $data = array(
                'productName' => $productName,
                'catId' => $category,
                'brandId' => $brand,
                'product_desc' => $product_desc,
                'price' => $price,
                // 'image' => $unique_image,
                'type' => $type

            );
        }
        $result = $productmodel->updateproduct($table_product, $data, $cond);
        if ($result == 1) {

            $message['msg'] = "Cập nhật sản phẩm thành công";
            header('Location:' . BASE_URL . "/product/list_product?msg=" . urlencode(serialize($message)));
        } else {
            $message['msg'] = "Cập nhật sản phẩm thất bại";
            header('Location:' . BASE_URL . "/product/list_product?msg=" . urlencode(serialize($message)));
        }
    }
    public function productdetails($id)
    {
        Session::init();
        $table_product = "tbl_product";
        $table_brand = "tbl_brand";
        $table_category = "tbl_category";
        $cond = "$table_product.productId='$id'";
        $productmodel = $this->load->model('productmodel');
        $data['detail'] = $productmodel->get_details($table_product, $table_brand, $table_category, $cond);

        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->listcategory($table_category);


        $table_brand = 'tbl_brand';
        $brandmodel = $this->load->model('brandmodel');
        $data['brands'] = $brandmodel->listbrand($table_brand);


        $this->load->view('header');
        $this->load->view('product_details', $data);
        $this->load->view('footer');
    }
}
