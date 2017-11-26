<?php
    $name = trim($_POST['username']);
    $password = trim($_POST['password']);
    $sex = trim($_POST['sex']);
    $phone = trim($_POST['phone']);

    @ $db = new mysqli("localhost","root","1235869470","hospital");

    if(mysqli_connect_errno()){
        echo'Error: could not connect database, please try again later! ';
        exit;
    }
    $query = "insert into user(Uname,Upassword,Usex,Uphone) values(?,?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssss",$name,$password,$sex,$phone);
    $stmt->execute();
    $stmt->close();
    $db->close();
    $url  =  "home_page.php";
    session_start();
    $_SESSION["Uname"] = $name;
?>
<html>
<head>
    <meta http-equiv = "refresh"   content ="5;url=<?php echo $url;  ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div align="center"><?php echo $name ?>,恭喜你注册成功！<br><br>5秒后自动跳转到主界面。。。</div>
</body>
</html>