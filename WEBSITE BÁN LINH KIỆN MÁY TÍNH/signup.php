<?php 
session_start();

	include("class/class.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$user_email = $_POST['user_email'];
		$user_address = $_POST['user_address'];
		$user_phone = $_POST['user_phone'];
		$role_id = 0;
		
	    $user = new classAll();
	    $query = $user -> show_user();
	    $show_user = mysqli_num_rows($query);
		 

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($user_address))
		{
            if($show_user > 0){
                echo '<script language="javascript">alert("Trùng email hoặc số điện thoại"); window.location="signup.php";</script>';
            }else{
			//save to database
			// $user_id = random_num(20);
			
			    $result = $user -> insert_user($user_name,$password,$user_email,$user_address,$user_phone,$role_id);
				$show_user = $user -> get_user($user_name);
				$id = mysqli_fetch_assoc($show_user);
				$_SESSION['user_id'] = $id['user_id'];
				$_SESSION['user_email'] = $user_email;
// 			echo "<script>window.location.href='login.php'</script>";
            echo "<div style='
     display: flex;
     justify-content: center;
     align-items: center;
      height: 100vh;'>
                <h1 style='color:blue;'>Chúc mừng bạn đã đăng ký thành công</h1>
                <button style='border: 2px solid pink;border-radius: 12px;'>
                <a style='text-decoration: none;
                color:black;
        font-size: 30px;' 
        href='login.php'>Đăng nhập tại đây</a></button>
        <span style='font-size:20px;'>hoặc</span>
              <button style='border: 2px solid pink;border-radius: 12px;'>
                <a style='text-decoration: none;
                color:black;
        font-size: 30px;' 
        href='index.php'>Quay lại</a></button>
                </div>";
			die;}
		
		}else
		{
			echo '<script language="javascript">alert("Thông tin đăng nhập bị sai"); window.location="signup.php";</script>';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký</title>
</head>
<body>

	<style type="text/css">
	
	.text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
	form #showEye {
  display: block;
  fill: black;
  transition: all 0;
}
form #hideEye {
  display: none;
  fill: black;
  transition: all 0;
}
form input {
  outline: none;
  display: block;
  border: 1px solid transparent;
  margin: auto;
  border-radius: 2px;
  padding: 5px;
  width: 220px;
  transition: all 0.2s ease-in-out;
}

form input:focus {
  box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.5);
}
form svg {
  width: 18px;
  height: 18px;
  cursor: pointer;
  float: right;
  margin-top: -23px;
  margin-right: 80px;
  z-index: 4;
  position: relative;
}
a {
    text-decoration: none;
}
	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Đăng ký tài khoản</div>
			<label for="">Tên đăng nhập</label>
			<input class="text" type="text" name="user_name"><br><br>
			<label for="">Mật khẩu</label>
			<input class="text" id="password" type="password" name="password" onfocus="black()" onblur="white()">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999" xml:space="preserve" onclick="passwordShow()" id="showEye">
        <g>
          <path d="M508.745,246.041c-4.574-6.257-113.557-153.206-252.748-153.206S7.818,239.784,3.249,246.035    c-4.332,5.936-4.332,13.987,0,19.923c4.569,6.257,113.557,153.206,252.748,153.206s248.174-146.95,252.748-153.201    C513.083,260.028,513.083,251.971,508.745,246.041z M255.997,385.406c-102.529,0-191.33-97.533-217.617-129.418    c26.253-31.913,114.868-129.395,217.617-129.395c102.524,0,191.319,97.516,217.617,129.418    C447.361,287.923,358.746,385.406,255.997,385.406z"/>
        </g>
        <g>
          <path d="M255.997,154.725c-55.842,0-101.275,45.433-101.275,101.275s45.433,101.275,101.275,101.275    s101.275-45.433,101.275-101.275S311.839,154.725,255.997,154.725z M255.997,323.516c-37.23,0-67.516-30.287-67.516-67.516    s30.287-67.516,67.516-67.516s67.516,30.287,67.516,67.516S293.227,323.516,255.997,323.516z"/>
        </g>
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 59.049 59.049" xml:space="preserve" onclick="passwordHide()" id="hideEye">
        <g>
          <path d="M11.285,41.39c0.184,0.146,0.404,0.218,0.623,0.218c0.294,0,0.585-0.129,0.783-0.377c0.344-0.432,0.273-1.061-0.159-1.405   c-0.801-0.638-1.577-1.331-2.305-2.06l-7.398-7.398l7.629-7.629c7.334-7.333,18.003-9.836,27.839-6.534   c0.523,0.173,1.09-0.107,1.267-0.63c0.175-0.523-0.106-1.091-0.63-1.267c-10.562-3.545-22.016-0.857-29.89,7.016L0,30.368   l8.812,8.812C9.593,39.962,10.426,40.705,11.285,41.39z"/>
          <path d="M50.237,21.325c-1.348-1.348-2.826-2.564-4.394-3.616c-0.458-0.307-1.081-0.185-1.388,0.273   c-0.308,0.458-0.185,1.08,0.273,1.388c1.46,0.979,2.838,2.113,4.094,3.369l7.398,7.398l-7.629,7.629   c-7.385,7.385-18.513,9.882-28.352,6.356c-0.52-0.187-1.093,0.084-1.279,0.604c-0.186,0.52,0.084,1.092,0.604,1.279   c3.182,1.14,6.49,1.693,9.776,1.693c7.621,0,15.124-2.977,20.665-8.518l9.043-9.043L50.237,21.325z"/>
          <path d="M30.539,41.774c-2.153,0-4.251-0.598-6.07-1.73c-0.467-0.29-1.084-0.148-1.377,0.321c-0.292,0.469-0.148,1.085,0.321,1.377   c2.135,1.33,4.6,2.032,7.126,2.032c7.444,0,13.5-6.056,13.5-13.5c0-2.685-0.787-5.279-2.275-7.502   c-0.308-0.459-0.93-0.582-1.387-0.275c-0.459,0.308-0.582,0.929-0.275,1.387c1.267,1.893,1.937,4.102,1.937,6.39   C42.039,36.616,36.88,41.774,30.539,41.774z"/>
          <path d="M30.539,18.774c2.065,0,4.089,0.553,5.855,1.6c0.474,0.281,1.088,0.125,1.37-0.351c0.281-0.475,0.125-1.088-0.351-1.37   c-2.074-1.229-4.451-1.879-6.875-1.879c-7.444,0-13.5,6.056-13.5,13.5c0,2.084,0.462,4.083,1.374,5.941   c0.174,0.354,0.529,0.56,0.899,0.56c0.147,0,0.298-0.033,0.439-0.102c0.496-0.244,0.701-0.843,0.458-1.338   c-0.776-1.582-1.17-3.284-1.17-5.06C19.039,23.933,24.198,18.774,30.539,18.774z"/>
          <path d="M54.621,5.567c-0.391-0.391-1.023-0.391-1.414,0l-46.5,46.5c-0.391,0.391-0.391,1.023,0,1.414   c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293l46.5-46.5C55.012,6.591,55.012,5.958,54.621,5.567z"/>
        </g>
      </svg>
			<br><br>
			<label for="">Email</label>
			<input class="text"  type="text" name="user_email"><br><br>
			<label for="">Địa chỉ</label>
			<input class="text"  type="text" name="user_address"><br><br>
			<label for="">Số điện thoại</label>
			<input class="text"  type="text" name="user_phone"><br><br>
			<input id="button" type="submit" value="Đăng ký"><br><br>

			Đã có tài khoản nhấn vào<a href="login.php"><b> Đây</b></a><br><br>
			<a href='index.php'>Quay lại</a>
		</form>
	</div>
</body>
</html>

<script type="text/javascript">
let password = document.getElementById('password');
let showEye = document.getElementById('showEye');
let hideEye = document.getElementById('hideEye');

function black(){
  showEye.style.fill = "#000000";
  hideEye.style.fill = "#000000";
}
function white(){
  showEye.style.fill = "#fff";
  hideEye.style.fill = "#fff";
}

function passwordShow(){
  password.type = 'text';
  showEye.style.display= "none";
  hideEye.style.display= "inline";
  password.focus();
}
function passwordHide(){
  password.type = 'password';
  showEye.style.display= "inline";
  hideEye.style.display= "none";
  password.focus();
}    
</script>  