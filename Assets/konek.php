<?php 
if($_POST["kirim"]){
    $connection= mysqli_connect("localhost", "root", "") or die(mysql_error());
    mysqli_select_db($connection,"buku_tamu");

    $nama= mysqli_escape_string($connection,$_POST["nama"]);
    $email= mysqli_escape_string($connection,$_POST["email"]);
    $tgl= time();

    if($nama && $email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $in = mysqli_query($connection,"INSERT INTO tamu VALUES('$tgl', '$nama', '$email');") or die(mysqli_error($connection));
            if($in){
                echo'<script language = "javascript">alert("terimakasih data anda sudah disimpan"); document.location="http://127.0.0.1:5501/index.html";</script>';
            }else{
                echo '<div id="error">Input database gagal</div>';
            }
        }else{
            echo '<div id="error">masukan email dengan benar</div>';
        }
    }else{
        echo '<div id="error">Isikan form terlebih dahulu</div>';
    }
}