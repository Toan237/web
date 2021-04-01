<?php

class Post
{
    private $conn;
    public $title;
    public $body;

    public function __construct()
    {
        $connect = 'mysql:dbname=web_mvc; host=localhost; charset=utf8';
        $user = 'root';
        $pass = '';
        $this->conn = new PDO($connect, $user, $pass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function read()
    {
        $query = "SELECT * FROM tbl_post";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function read_single()
    {
        $query = "SELECT * FROM tbl_post WHERE id=?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set property

        $this->title = $row['title'];
        $this->body = $row['body'];
    }


    public function create()
    {
        $query = "INSERT INTO tbl_post VALUES(null, :title, :body)";

        $stmt = $this->conn->prepare($query);

        // Clean data

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));

        // Bind data

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    public function delete()
    {
        $query = "DELETE FROM tbl_post where id = :id";

        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    public function update()
    {
        $query = "UPDATE tbl_post SET title=:title, body=:body WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        // Bind data

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}
