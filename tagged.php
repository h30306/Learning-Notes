<?php
    $dbhost = 'demo.jlwu.info:1107';
    $dbuser = 'VAI';
    $dbpass = '@VUH5Xi32tAM2yoAm';
    $dbname = 'VAI';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) ;//連接資料庫
    mysqli_query($conn, "SET NAMES 'utf8'");//設定語系
    mysqli_select_db($conn, $dbname);
    $sql = "select * from user";//查詢整個表單
    $result = mysqli_query($conn, $sql) ;
    // while($row = mysqli_fetch_array($result)){//印出資料
    //     echo $row['u_id']." ";
    //     echo $row['u_number']."<br>";
    // }
    $sql = "select * from article";//查詢整個表單
    $result = mysqli_query($conn, $sql) ;
    // while($row = mysqli_fetch_array($result)){//印出資料
    //     echo $row['a_id']." ";
    //     echo $row['a_article']."<br>";
        #echo $row['u_id']." ";
        #echo $row['u_number']."<br>";
    // }
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<!-- <form action="a.php"> <input type="text" name="books[]"/> <input type="text" name="books[]"/> <input type="text" name="books[]"/> <input type="submit" name="submit" /> </form> -->
<form action="in.php" method="post">
<?php

    for($i=1; $i<=10; $i++){
            echo "RFID編號： <input type='text' name=$i>";
            echo "<input type='reset' name='nreset' value='重新輸入'><br><br><hr>";
    }
    echo "<input type='submit' name='submit' value='送出表單'>";
?>

    </form>
</body>
</html>>
