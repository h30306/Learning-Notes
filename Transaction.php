<?php

	session_start();
	$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'get-net-save';

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error with MYSQL connection');
    $seldb = mysqli_select_db($conn,$dbname) or die('DB connection failed');
     mysqli_query($conn,"set names utf8");

    //執行第一次SQL語法
   	$sql = "SELECT * FROM user WHERE user.account = '".$_SESSION['username']."'";
   	$result = mysqli_query($conn,$sql);
   	$row_result = mysqli_fetch_assoc($result);

   	//執行第二次SQL語法
	$sql2 = "SELECT * FROM transaction WHERE transaction.p_id = '".$row_result['p_id']."'";
   	$result2 = mysqli_query($conn,$sql2);
  	
  	$data_nums = mysqli_num_rows($result2); //統計總比數
    $per = 10; //每頁顯示項目數量
    $pages = ceil($data_nums/$per); //取得不小於值的下一個整數
    if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
        $page=1; //則在此設定起始頁數
    } else {
        $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
    }
    $start = ($page-1)*$per; //每一頁開始的資料序號
    $result2 = mysqli_query($conn,$sql2.' LIMIT '.$start.', '.$per) or die("Error");
  ?>

<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
--> 
<html lang="en">
<head>
	<title>Get Net-Save</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" type="text/css" href="index.css">
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--匯入bootstrap-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!--匯入jQuery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!--bootstrap javascript-->
	<link rel="stylesheet" href="assets/css/reveal.css"> 
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.reveal.js"></script>

	

		

</head>
<body>

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Main -->
		<div id="main">
			<div class="inner">
				<header>

				<nav class="navbar navbar-default navbar-top" style="border-bottom: solid 5px #f56a6a;background-color: #fff; border-left: none;border-right: none;">
						<div class="container">
							<div class="navbar-header" style="padding-left:300px ">
								<h1 style="font-size: 50px;"><img src="logo2.png" width="70" height="50">Get Net-Save</h1>
							</div>
						</div>
					</nav>
				</header>	
				<section>
	
<div class="box">
<!-- 	<form style="padding-left:800px">
	<h4 style="display:inline;">從</h4>
	<input id="thedate" type="text" name="日期" style="width: 30%" style="display:inline;" />
	<h4 style="display:inline;">到</h4>
	<input id="thedate" type="text" name="日期" style="width: 30%" style="display:inline;" />
	<button style="height: 30px;">搜尋</button>
	</form>
	 -->
	<table width="700" border="1">
   <tr>
    <td >日期</td>
   
    <td >類別</td>
    <td >備註</td>
    <td >交易方式</td>
    <td >金額</td>
    <td >收支</td>

  </tr>
  <?php
  for($i=1;$i<=mysqli_num_rows($result2);$i++){
		$rs=mysqli_fetch_row($result2);
	?>
  <tr>
    <td><?php echo $rs[2]?></td>
    <td><?php echo $rs[3]?></td>
    <td><?php echo $rs[4]?></td>
    <td><?php echo $rs[5]?></td>
    <td><?php echo $rs[6]?></td>
    <td><?php echo $rs[7]?></td>
    
  
  </tr>
  
  <?php
}
?>
</table>
<br/>
<?php
    //分頁頁碼
	
    echo '共 '.$data_nums.' 筆-在 '.$page.' 頁-共 '.$pages.' 頁';
    echo "<br /><a href=?page=1>首頁</a> ";
    echo "第 ";
    for( $i=1 ; $i<=$pages ; $i++ ) {
        if ( $page-3 < $i && $i < $page+3 ) {
            echo "<a href=?page=".$i.">".$i."</a> ";
        }
    } 
    echo " 頁 <a href=?page=".$pages.">末頁</a><br /><br />";
    
?>

	</div>
				</section>
				
				</div>
			</div>


			<!-- Sidebar -->
			<div id="sidebar" >
				<div class="inner">

					<div align="center">
			<a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade">
			<img src="photo.php" class="img-thumbnail image-responsive" style="width: 150px;height: 150px;" ">
			</a>
			</div>
			
			<!--彈出視窗-->
			<form enctype="multipart/form-data" method="post" action="upload.php" class="reveal-modal" id="myModal">
			<p> 
			<label><h3 align="center">請選擇圖片：</h3></label> 
			<h6 align="center"><input type="file" id="file_input" accept="image/jpeg, image/png,image/bin" name="image"/> </h6>
			</p> 
			<div id="result" align="center"></div>
    		<a class="close-reveal-modal">&times;</a>
    		<h6 align="center"><input type="submit" value="確定上傳"/></h6>
			</form>


 
  



			
			
			<!--瀏覽照片js-->
			<script language="javascript">

			var result = document.getElementById("result");
			var input = document.getElementById("file_input"); 

			if(typeof FileReader==='undefined'){ 
			result.innerHTML = "Sorry, 瀏覽器不支持 FileReader"; 
			input.setAttribute('disabled','disabled'); 
			}else{ 
			input.addEventListener('change',readFile,false);
			}

			function readFile(){ 
			var file = this.files[0]; 
			var reader = new FileReader(); 
			reader.readAsDataURL(file); 
			reader.onload = function(e){ 
			result.innerHTML = '<img src="'+this.result+'"height="100"/>';}
			
			};
			
			</script>
			




					<!-- Menu -->
					<nav id="menu">
						<ul>
						<li><h2><a  href="index.php">主頁</a></h2></li>
						<li><h2><a  href="Transaction.php">交易紀錄</a></h2></li>
						<li><h2><a  href="Analysis.php">交易分析</a></h2></li>
						<li><h2><a  href="About Us.php">關於我們</a></h2></li>
						</ul>
					</nav>


					<footer>
					<form action="logout.php">
						<button>登出</button>
						</form>
					</footer>



				</div>
			</div>

		</div>

		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>


		

	</body>
	</html>