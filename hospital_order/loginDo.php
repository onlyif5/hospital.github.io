<?php
    require_once("UserDAO.php");
    $udao = new UserDAO();
    $name = trim($_POST['username']);
    $password = trim($_POST['password']);
    $password2 = $udao->getUpasswordByUname($name);
    $mess = "";
    if($password == $password2){
        session_start();
        $_SESSION["Uname"] = $name;
        $url  =  "home_page.php";
    }else{
        $mess = "用户名或密码错误！";
        session_start();
        $_SESSION["mess"] = $mess;
        $url  =  "home_page.php?isShow=true";
    }
?>
<html>
<head>
    <meta http-equiv = "refresh"   content ="0.1;url=<?php echo $url;  ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
</body>
</html>
