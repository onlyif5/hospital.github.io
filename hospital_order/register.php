<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>浙江省诊疗服务平台</title>
    <script language="JavaScript" type="text/javascript">
        function check() {
            var username=document.all.item("username").value;
            var password=document.all.item("password").value;
            var phone=document.all.item("phone").value;
            var str=/^[0-9]{11,11}$/;
            var str2=/^(?![^a-zA-Z]+$)(?!\D+$).{6,12}$/;
            var val=str.test(phone);
            var val2=str2.test(username);
            if (username == "") {
                alert("姓名不能为空！");
                return false;
            } else if(!val2){
                alert("名字必须由字符和数字组成，并且长度大于6小于12！");
                return false;
            } else if (password == "") {
                alert("密码不能为空！");
                return false;
            } else if (phone == "") {
                alert("手机号不能为空！");
                return false;
            } else if(!val){
                alert("请输入11位手机号！");
                return false;
            }
        }
    </script>
</head>
<style>
    .aaa {border:#07A1EE 1px solid;background:#3dafa7;}
</style>
<?php
    require_once("head.php");
?>
<body>
    <img src="bg.jpg" style="width:100%;height:79.7%;position:absolute;left:0;top:29.3%" >
    <img src="bgw.jpg" style="width:42%;height:60%;position:absolute;left:29%;top:35%" >
    <img src="web_bottom.png" style="width:100%;height:40%;position:absolute;left:0;top:109%">
    <?php
        echo "<a href='home_page.php' style=\"color:#aeaeae;position:absolute;left:29%;top:31.5%;font-size:15px;\">首页&nbsp;></a>";
        echo "<font style=\"color:#aeaeae;position:absolute;left:33.5%;top:31%;font-size:16px;\">用户注册</font>";
    ?>
    <div style="position:absolute;left:38%;top:37%">
        <form method="post" action="registerDo.php" onSubmit="return check()">
            <table cellspacing="50">
                <tr><td>用户名：</td><td><input type="text" name="username"></td></tr>
                <tr><td>密&nbsp;码：</td><td><input type="text" name="password"></td></tr>
                <tr>
                    <td colspan="2">
                        性&nbsp;别： &nbsp;&nbsp;<input type="radio" name="sex" value="男" checked>男
                                      <input type="radio" name="sex" value="女">女
                    </td>
                </tr>
                <tr><td>手机号：</td><td><input type="text" name="phone"></td></tr>
                <tr><td colspan="2" align="center"><input style="cursor:pointer;height:210%;width:70%;color:#ffffff" class="aaa" onMouseOut="this.style.backgroundColor=''"
                                                          onMouseOver="this.style.backgroundColor='#729CE3'" type="submit"  name="submit" value="提交"></td></tr>
            </table>
        </form>
    </div>
</body>
</html>