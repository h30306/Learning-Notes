<?php


    session_start();
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'get-net-save';

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error with MYSQL connection');
    $seldb = mysqli_select_db($conn,$dbname) or die('DB connection failed');
    mysqli_query($conn,"set names utf8");

    $sql1 = "SELECT * FROM user WHERE user.account = '".$_SESSION['username']."'";
    $result = mysqli_query($conn,$sql1);
    $row_result = mysqli_fetch_assoc($result);


    // $sql = "INSERT INTO transaction(t_id,p_id,日期,類別,備註,交易方式,金額,收支) VALUES (NULL,'".$row_result['p_id']."','".$_POST["日期"]."','".$_POST["類別"]."','".$_POST["備註"]."','".$_POST["交易方式"]."','".$_POST["金額"]."','收')";
    for($i=1; $i<=10; $i++){
        $sql = "INSERT INTO transaction(t_id, 備註) VALUES (NULL ,'".$_POST[$i]."')";
        mysqli_query($conn,$sql);
    }

    mysqli_close($conn);

?>