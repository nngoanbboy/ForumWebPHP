<?php
class TocaoModel{
    public function LayKetQuaTocaobaiviet($idBaiViet,$idTaiKhoan,$noiDung){
        $ketqua = false;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "4rum";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "insert into tocaobaiviet (idBaiViet,idTaiKhoan,noiDung) values($idBaiViet,$idTaiKhoan,'$noiDung')";
        
        if ($conn->query($sql) === TRUE) {
            $ketqua = true;
        }
        
        return $ketqua;
    }
    public function LayKetQuaTocaobinhluan($idBinhLuan,$idTaiKhoan,$noiDung){
        $ketqua = false;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "4rum";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "insert into tocaobinhluan (idBinhLuan,idTaiKhoan,noiDung) values($idBinhLuan,$idTaiKhoan,'$noiDung')";
        
        if ($conn->query($sql) === TRUE) {
            $ketqua = true;
        }
        
        return $ketqua;
    }
}
?>