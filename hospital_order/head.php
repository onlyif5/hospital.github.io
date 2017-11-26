<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>浙江省诊疗服务平台</title>
    <style type="text/css">
        <!--
        a:link {
            text-decoration: none;
        }
        a:visited {
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        a:active {
            text-decoration: none;
        }
        -->
    </style>
</head>
<style>
    .adminbutton {background:none;}
     .bbb {border:#07A1EE 1px solid;background:#3dafa7;}
</style>
<body>
<hr color="#fofofo" width="100%" style="height:3.5%;position:absolute;left:0;top:0"/>
<font color="#000000" style="position:absolute;left:20%;top:1.5%">浙江省卫生计生委官方授权</font>
<a href="home_page.php"><img src="icon.png" style="width:35%;height:13%;position:absolute;left:19.5%;top:5%" ></a>
<img src="phone_icon.png" style="width:15.6%;height:10%;position:absolute;left:65%;top:5%" >
<hr color="#02A8AF" width="100%" style="height:5.5%;position:absolute;left:0;top:17%"/>
<hr color="#B7B6B5" width="100%" style="height:0.5%;position:absolute;left:0;top:22%"/>
<input type="button" value="首页" onClick="window.location.href='home_page.php'"
       class="adminbutton" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#288370'"
       style="cursor:pointer;color:#ffffff;height:5.7%;position:absolute;left:20%;top:18%;width:7%;font-size:18px;border:none">
<input type="button" value="医院" onClick="window.location.href='getHospitalList.php'"
       class="adminbutton" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#288370'"
       style="cursor:pointer;color:#ffffff;height:5.7%;position:absolute;left:27%;top:18%;width:7%;font-size:18px;border:none">
<input type="button" value="科室" onClick="window.location.href='getHospitalList.php'"
       class="adminbutton" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#288370'"
       style="cursor:pointer;color:#ffffff;height:5.7%;position:absolute;left:34%;top:18%;width:7%;font-size:18px;border:none">
<hr color="#f5f5f5" width="100%" style="height:5.5%;position:absolute;left:0;top:22.5%"/>

<?php
    session_start();
    if(!isset($_SESSION["Uname"]) || $_SESSION["Uname"] == null){
        if(!isset($_GET["isShow"])) $isShow = false;
        else $isShow = $_GET["isShow"];
        echo "
            <a href='home_page.php?isShow=true'style=\"color:#02A8AF;height:150%;position:absolute;left:73%;top:2%;font-size:15px;\">登录</a>
            <font style=\"color:#02A8AF;position:absolute;left:69%;top:2%;font-size:15px;\">您好！请</font>
            <hr color=\"#02A8AF\" width=\"0.001%\" style=\"height:1.8%;position:absolute;left:75.8%;top:1%\"/>
            <a href='register.php'style=\"color:#02A8AF;position:absolute;left:77%;top:2%;font-size:15px;\">注册</a>
        ";
        if($isShow == true){
            echo"
                <img src=\"bg.jpg\" style=\"width:15%;height:50%;position:absolute;left:65%;top:30%\" >
                <input type=\"button\" value=\"X\" onClick=\"window . location . href = 'home_page.php'\"
                class=\"bbb\" onMouseOut=\"this.style.backgroundColor=''\"
                                                          onMouseOver=\"this.style.backgroundColor='#729CE3'\"
                style=\"height:3.6%;width:1.8%;position:absolute;left:79%;top:28.5%;cursor:pointer;color:#ffffff;
                font-size:15px;border-style:dashed;border-width:0;border-radius:150px;background:#02A8AF;\"
                >
                <font style=\"color:#02A8AF;position:absolute;left:66.8%;top:35%;font-size:18px;\">用户登录</font>
                <hr color=\"#02A8AF\" style=\"border:1px dashed #dbdbdb;width:11.5%;height:0.001%;position:absolute;left:66.8%;top:72%\"/>
                <a href='register.php'style=\"color:#02A8AF;position:absolute;left:75.5%;top:75%;font-size:15px;\">注册>></a>
            ";
            if(!isset($_SESSION["mess"]) || $_SESSION["mess"] == null) $mess = "";
            else $mess = $_SESSION["mess"];
            echo"
               <div style='position:absolute;left:65%;top:37%'>
               <form method='post' action='loginDo.php'>
                   <table cellspacing=\"30\">
                       <tr><td><input type='text' name='username' value='请输入用户名'></td></tr>
                       <tr><td><input type='password' name='password' value='请输入密码'></td></tr><tr></tr>
                       <tr><td align='right'><font color='red'style='font-size:15px'>$mess</font><td></tr>
                       <tr><td align=\"right\"><input style=\"cursor:pointer;height:180%;width:50%;color:#ffffff\"
                                                       class=\"bbb\" onMouseOut=\"this.style.backgroundColor=''\"
                                                          onMouseOver=\"this.style.backgroundColor='#729CE3'\" type=\"submit\"  name=\"submit\" value=\"提交\"></td></tr>
                   </table>
               </form>
               </div>
           ";
        }
    }else{
        $Uname = $_SESSION["Uname"];
        echo "<font style=\"color:#02A8AF;height:150%;position:absolute;left:69%;top:2%;font-size:15px;\">欢迎你，$Uname</font>";
    }
?>

</body>
</html>