<?php

class Account {
    private $id_dangky;
    private $tenkhachhang;
    private $email;
    private $diachi;
    private $matkhau;
    private $dienthoai;
   
   
        
    function __construct($id_dangky, $tenkhachhang, $email, $diachi, $matkhau, $dienthoai,) {
        $this->id_dangky = $id_dangky;
        $this->tenkhachhang = $tenkhachhang;
        $this->email = $email;
        $this->diachi = $diachi;
        $this->matkhau = $matkhau;
        $this->dienthoai = $dienthoai;
    }
    public function insert($conn) {
        $sql = "insert into tbl_dangky(id_dangky,tenkhachhang,email,diachi,matkhau,dienthoai) values (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssss",$this->id_dangky,$this->tenkhachhang,$this->email,$this->diachi,$this->matkhau,$this->dienthoai);
        $stmt->execute();
         
    }
    public function login($conn) {
        $sql = "select tenkhachhang,matkhau from tbl_dangky where tenkhachhang = '$this->tenkhachhang'  AND matkhau='$this->matkhau' ";
        $stmt = mysqli_query($conn, $sql);
        return $stmt;
    }
    public function showallcustomer($conn) {
        $sql = "SELECT * FROM tbl_dangky";
        $result = $conn->query($sql);
        return $result;
    }
    public function showallseachname($conn,$seach) {
        $sql = "SELECT * FROM tbl_dangky where tendangky Like '%$seach%' ";
        $result = $conn->query($sql);
        return $result;
    }
    //  public function delete($conn) {
    //     $id = $_REQUEST['delete'];
    //     $stmt = $conn->prepare("update customer set Startus = ? where Customer_ID = ?");
    //     $dl="false";
    //     $stmt->bind_param("ss",$dl,$id);
    //     $result = $stmt->execute();
    //     return $result;
    // }
     public function edit($conn) {
        $id_dangky = $_REQUEST['edit'];
        $stmt = $conn->prepare("update tbl_dangky set  tenkhachhang=?,email=?,diachi=?,matkhau=?,dienthoai=? where  id_dangky= ?");
        $stmt->bind_param("ssssss",$this->tenkhachhang,$this->email,$this->diachi,$this->matkhau,$this->dienthoai,$id_dangky);
        $result = $stmt->execute();
        return $result;
    }

    public function seach($conn){
        $id_dangky = $_GET['edit'];
        $sql = "SELECT * FROM tbl_dangky where  id_dangky='$id_dangky'";
        $result = $conn->query($sql);
        return $result;
    }
}