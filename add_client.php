<?php
	header("Content-Type: text/html; charset=UTF-8");
	$con = mysqli_connect("localhost", "root", "root", "restorania");
	if (mysqli_connect_errno()) {
    	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$phone = mysqli_real_escape_string($con, $_POST['phoneClient']);
	$name = mysqli_real_escape_string($con, $_POST['nameClient']);
	$password1 = mysqli_real_escape_string($con, $_POST['passwordClient1']);
	$password2 = mysqli_real_escape_string($con, $_POST['passwordClient2']);
	$antibot = mysqli_real_escape_string($con, $_POST['antiBot']);

if(empty($antibot)){
	if($password1 == $password2){
		if($phone==" " or $name==" "){
			$sql = "INSERT INTO client (phone_client, name_client, password_client)
					VALUES ('$phone','$name','$password1')";
			if (!mysqli_query($con, $sql)) {
    			die('Error: ' . mysqli_error($con));
			}
			else {
				echo "Добавлен новый пользователь с телефоном ".$phone;
			}
		}
		else {
			echo "Номер телефона и имя должны быть заполнены";
		} 
	}
	else {
		echo "Пароли не совпадают";
	}
}
else {
	echo "Сработал антибот";
}

mysqli_close($con);
?>