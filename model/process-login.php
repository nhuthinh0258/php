<?php
    // login.php TRUYỀN DỮ LIỆU SANG
    session_start();

if(isset($_POST['btnlogin'])){
        $user=$_POST['txtusername'];
        $pass=$_POST['txtmatkhau'];
    

    // Bước 01: Kết nối Database Server
    $conn = mysqli_connect('localhost','root','','gymmax');
    if(!$conn){
        die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
    }
    // Bước 02: Thực hiện truy vấn
    $sql = "select * from db_user WHERE tendangnhap = '$user' AND matkhau = '$pass'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        //Cấp thẻ làm việc
        $_SESSION['isLoginok']=$user;
        header("location:../giaodien-user.php");
    }
    else
    {
        $error="Sai tên tài khoản hoặc mật khẩu";
        header("location:../login.php?error=$error");
    }


    // Bước 03: Đóng kết nối
    mysqli_close($conn);
}
else{
    header("location: ../login.php");
}
?>