
<?php
class Load
{
    function __construct()
    {
        // echo 'This is Main';
    }
    public function view($filename, $data = false)
    {
        if ($data == true) {
            extract($data);
        }
        include 'app/views/' . $filename . '.php';
    }
    public function model($filename)
    {
        include 'app/models/' . $filename . '.php';
        return new $filename();
    }
}
?>