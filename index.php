<?php 
	 session_start();
  	$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'get-net-save';

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('Error with MYSQL connection');
    $seldb = mysqli_select_db($conn,$dbname) or die('DB connection failed');
     mysqli_query($conn,"set names utf8");

	$sql = "SELECT * FROM user WHERE user.account = '".$_SESSION['username']."'";
    $result6 = mysqli_query($conn,$sql);
    $row_result6 = mysqli_fetch_assoc($result6);

	$sql5 = "SELECT SUM(金額) FROM transaction WHERE 收支='收' AND transaction.p_id = '".$row_result6['p_id']."' AND  transaction.日期 LIKE '".date('Y-m-d')."'";	
	$result5 = mysqli_query($conn,$sql5);
    $row_result5 = mysqli_fetch_assoc($result5);

    $sql7 = "SELECT SUM(金額) FROM transaction WHERE 收支='支' AND transaction.p_id = '".$row_result6['p_id']."' AND  transaction.日期 LIKE '".date('Y-m-d')."'";	
	$result7 = mysqli_query($conn,$sql7);
    $row_result7 = mysqli_fetch_assoc($result7);

    $sql8 = "SELECT SUM(金額) FROM transaction WHERE 收支='收' AND transaction.p_id = '".$row_result6['p_id']."' AND  transaction.日期 LIKE '".date('Y-m-%')."'";	
	$result8 = mysqli_query($conn,$sql8);
    $row_result8 = mysqli_fetch_assoc($result8);

     $sql9 = "SELECT SUM(金額) FROM transaction WHERE 收支='支' AND transaction.p_id = '".$row_result6['p_id']."' AND  transaction.日期 LIKE '".date('Y-m-%')."'";	
	$result9 = mysqli_query($conn,$sql9);
    $row_result9= mysqli_fetch_assoc($result9);
    
	 
	$str="SELECT `收類別` FROM `收class`"; 
	$result = mysqli_query($conn,$str);
	$row_result = mysqli_fetch_assoc($result); 

	$str2="SELECT `支類別` FROM `支class`"; 
	$result2 = mysqli_query($conn,$str2) ; 
	$row_result2 = mysqli_fetch_assoc($result2); 
	
	$str3="SELECT `交易方式` FROM `trade`"; 
	$result3 = mysqli_query($conn,$str3) ; 
	$row_result3 = mysqli_fetch_assoc($result3);  

	$str4="SELECT `交易方式` FROM `trade`"; 
	$result4 = mysqli_query($conn,$str4); 
	$row_result4 = mysqli_fetch_assoc($result4);  


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
	<!-- [if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif] -->
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
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
	<script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<!--彈出視窗-->
	<link rel="stylesheet" href="assets/css/reveal.css"> 
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.reveal.js"></script>
	<script type="text/javascript">
  			$.noConflict();    //让渡$给第一个实现它的库。
                                                                          
  			jQuery("#div").hide();    //使用jQuery作为jQuery库的标识符
                                                                          
　 			$("#div").hide();   // 使用另一个库的 $ 的代码
	</script>

	<script type="text/javascript">
		$(function(){
    	$('#thedate').datepicker({
   	 		dateFormat: 'yy-mm-dd'
    	});
		});
	
	</script>
	<script type="text/javascript">
		$(function(){
    	$('#thedate2').datepicker({
   	 		dateFormat: 'yy-mm-dd'
    	});
		});
	
	</script>
	



  

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
					<div class="col-md-4">
					<div class="box">
						<div align="center">
						<img src="in.png"></div>
						<div>
						<form action="in.php" name="data" method="post">
							<h4>日期:</h4>
							<input id="thedate" type="text" name="日期" required="required" />
							<h4>類別:</h4>
							<?php 	
							echo "<select";
							echo " ";
							echo "name='類別'";
							echo ">";
							do { 
								echo "<option value = ".$row_result['收類別'].">"; 
								echo $row_result['收類別']; 
								echo "</option>";} 
							while($row_result = mysqli_fetch_assoc($result)); 
								echo "</select>";  ?>
							<h4>備註</h4>
							<input type="text" name="備註">

							<h4>交易方式:</h4>
									<?php 	
							echo "<select";
							echo " ";
							echo "name='交易方式'";
							echo ">";
							do { 
								echo "<option value = ".$row_result3['交易方式'].">"; 
								echo $row_result3['交易方式']; 
								echo "</option>";} 
							while($row_result3 = mysqli_fetch_assoc($result3)); 
								echo "</select>";  ?>
							<h4>金額:</h4>
							<input type="number" name="金額" required="required">
							<br>
							<br>
							<button type="submit">確定</button>
						</form>
						</div>
					</div>
					</div>


					<div class="col-md-4" align="center">
					<div class="box" style="height: 692px">
						<img src="pig.png" style="width:140px ;height:239px ">
						<div>
						<h2 style="text-align: center;padding-top: 50px">本日收入  <?php echo $row_result5["SUM(金額)"]; ?>元</h2>
						<h2 style="text-align: center;padding-top: 30px">本日支出  <?php echo $row_result7["SUM(金額)"]; ?>元</h2>
						<h2 style="text-align: center;padding-top: 30px">本月收入  <?php echo $row_result8["SUM(金額)"]; ?>元</h2>
						<h2 style="text-align: center;padding-top: 30px">本月支出  <?php echo $row_result9["SUM(金額)"]; ?>元</h2>
						</div>

					</div></div>
					


					<div class="col-md-4">
					<div class="box">
					<div align="center">
						<img src="out.png"></div>
					<div>
						<form action="out.php" name="data2" method="post">
							<h4>日期:</h4>
							<input id="thedate2" type="text" name="日期" required="required"/>
							<h4>類別:</h4>
							<?php 	
							echo "<select";
							echo " ";
							echo "name='類別'";
							echo ">";
							do { 
								echo "<option value = ".$row_result2['支類別'].">"; 
								echo $row_result2['支類別']; 
								echo "</option>";} 
							while($row_result2 = mysqli_fetch_assoc($result2)); 
								echo "</select>";  ?>

							<h4>備註</h4>
							<input type="text" name="備註">  

							<h4>交易方式:</h4>
									<?php 	
							echo "<select";
							echo " ";
							echo "name='交易方式'";
							echo ">";
							do { 
								echo "<option value = ".$row_result4['交易方式'].">"; 
								echo $row_result4['交易方式']; 
								echo "</option>";} 
							while($row_result4 = mysqli_fetch_assoc($result4)); 
								echo "</select>";  ?>
							<h4>金額:</h4>
							<input type="number" name="金額" required="required">
							<br>
							<br>
							<button>確定</button>
							</form>
						</div></div>	
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
						<button type="submit">登出</button>
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