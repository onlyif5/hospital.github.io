<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>浙江省诊疗服务平台</title>
</head>
<body>
<?php
  require_once("head.php");
  require_once("HospitalDAO.php");
  require_once("H_KDAO.php");
  require_once("KeshiDAO.php");
  require_once("UserDAO.php");
  require_once("DoctorDAO.php");
  require_once("OrderDAO.php");
  if(!isset($_SESSION["Uname"]) || $_SESSION["Uname"] == null) $uname = ""; else $uname = $_SESSION["Uname"];
  $udao = new UserDAO();
  $odao = new OrderDAO();
  $ddao = new DoctorDAO();
  $hdao = new HospitalDAO();
  $usex = $udao->getUsexByUname($uname);
  $uphone = $udao->getUphoneByUname($uname);
  $uid = $udao->getUidByUname($uname);
  $num_or = $odao->getOrderNumsByUid($uid);
  $areas = array("杭州","宁波","温州","嘉兴","湖州","绍兴","金华","衢州","舟山","台州","丽水","义乌","省直");
  $grades = array("三级甲等","三级乙等","二级甲等","二级乙等");
  if(!isset($_GET["opt"])) $opt = 1;
  else $opt = $_GET["opt"];
  if(!isset($_GET["area"])) $area = "杭州";
  else $area = $_GET["area"];
  if(!isset($_GET["grade"])) $grade = "三级甲等";
  else $grade = $_GET["grade"];
?>
  <input type="button" value="&#13;&#10;按&#13;&#10;地&#13;&#10;区&#13;&#10;选&#13;&#10;择&#13;&#10;医&#13;&#10;院&#13;&#10;&#13;&#10;" onClick="window.location.href='home_page.php?opt=1'"
          style="width:3%;height:29.3%;position:absolute;left:20%;top:30%;cursor:pointer;color:#ffffff;font-size:18px;border:none;<?php if($opt == 1) echo "background:#02A8AF"; else echo"background:#92dad6"; ?>">
  <input type="button" value="&#13;&#10;按&#13;&#10;等&#13;&#10;级&#13;&#10;选&#13;&#10;择&#13;&#10;医&#13;&#10;院&#13;&#10;&#13;&#10;" onClick="window.location.href='home_page.php?opt=2'"
          style="width:3%;height:29%;position:absolute;left:20%;top:59.5%;cursor:pointer;color:#ffffff;font-size:18px;border:none;<?php if($opt == 2) echo "background:#02A8AF"; else echo"background:#92dad6" ?>">
  <?php
      echo "<hr color=\"#92dad6\" style=\"width:0.001%;height:50%;position:absolute;left:44.5%;top:31.5%\"/>";
      echo "<a href='getHospitalList.php'style=\"color:#02A8AF;position:absolute;left:53%;top:83%;font-size:15px;\">查看全部医院>></a>";
      if($opt == 1){
        for($i = 0;$i < 13;$i++) {
          $position = 30 + $i * 4.5;
          if($area == $areas[$i]){
            echo "<input type=\"button\" value=\"$areas[$i]\" onClick=\"window.location.href='home_page.php?opt=1&area=$areas[$i]'\"
               style=\"width:6%;height:4.5%;position:absolute;left:23.03%;top:$position%;cursor:pointer;color:#000000;font-size:15px;border:none;background:none;\"
               >";
          }else{
            echo "<input type=\"button\" value=\"$areas[$i]\" onClick=\"window.location.href='home_page.php?opt=1&area=$areas[$i]'\"
               style=\"width:6%;height:4.5%;position:absolute;left:23.03%;top:$position%;cursor:pointer;color:#000000;font-size:15px;border:#92dad6 1px solid;background:#f5f5f5;\"
               >";
          }
        }
        echo "<hr color=\"#92dad6\" style=\"width:38%;height:0.001%;position:absolute;left:23%;top:29%\"/>
        <hr color=\"#92dad6\" style=\"width:38%;height:0.001%;position:absolute;left:23%;top:87.2%\"/>
        <hr color=\"#92dad6\" style=\"width:0.001%;height:58%;position:absolute;left:61%;top:29%\"/>";
      }else{
        for($i = 0;$i < 4;$i++) {
          $position = 30 + $i * 4.5;
          if($grade == $grades[$i]){
            echo "<input type=\"button\" value=\"$grades[$i]\" onClick=\"window.location.href='home_page.php?opt=2&grade=$grades[$i]'\"
               style=\"width:6%;height:4.5%;position:absolute;left:23.03%;top:$position%;cursor:pointer;color:#000000;font-size:15px;border:none;background:none;\"
               >";
          }else{
            echo "<input type=\"button\" value=\"$grades[$i]\" onClick=\"window.location.href='home_page.php?opt=2&grade=$grades[$i]'\"
               style=\"width:6%;height:4.5%;position:absolute;left:23.03%;top:$position%;cursor:pointer;color:#000000;font-size:15px;border:#92dad6 1px solid;background:#f5f5f5;\"
               >";
          }
        }
        echo "<hr color=\"#92dad6\" style=\"width:38%;height:0.001%;position:absolute;left:23%;top:29%\"/>
        <hr color=\"#92dad6\" style=\"width:32%;height:0.001%;position:absolute;left:29%;top:87.2%\"/>
        <hr color=\"#92dad6\" style=\"width:0.001%;height:58%;position:absolute;left:61%;top:29%\"/>
        <hr color=\"#92dad6\" style=\"width:5.9%;height:0.001%;position:absolute;left:23%;top:46.72%\"/>
        <hr color=\"#92dad6\" style=\"width:0.001%;height:40.5%;position:absolute;left:28.92%;top:46.8%\"/>";
      }
  ?>
  <?php
      require_once("HospitalDAO.php");
      $hdao = new HospitalDAO();
      $nums = $hdao->getHospitalNumsByHarea($area);
      $nums2 = $hdao->getHospitalNumsByHgrade($grade);
      if($opt == 1){
          if($nums == 0) echo "<font style=\"color:#000000;position:absolute;left:30%;top:34%;font-size:15px;\">暂时无该地区的医院！</font>";
          else{
              for($i = 0;$i < $nums;$i++){
                  $Hname = $hdao->getHnameByIndexAndHarea($i,$area);
                  if($i < 3) {
                      $ps = 34 + $i*4;
                      echo "<a href='hospitalPage.php?Hname=$Hname'style=\"color:#000000;position:absolute;left:30%;top:$ps%;font-size:15px;\">$Hname</a>";
                  }else if($i >= 3 && $i < 20){
                      $ps = 34 + ($i-3)*4;
                      echo "<a href='hospitalPage.php?Hname=$Hname'style=\"color:#000000;position:absolute;left:45.8%;top:$ps%;font-size:15px;\">$Hname</a>";
                  }
              }
          }
      }else{
          if($nums2 == 0) echo "<font style=\"color:#000000;position:absolute;left:30%;top:34%;font-size:15px;\">暂时无该等级的医院！</font>";
          else{
              for($i = 0;$i < $nums2;$i++){
                  $Hname = $hdao->getHnameByIndexAndHgrade($i,$grade);
                  if($i < 3) {
                      $ps = 34 + $i*4;
                      echo "<a href='hospitalPage.php?Hname=$Hname'style=\"color:#000000;position:absolute;left:30%;top:$ps%;font-size:15px;\">$Hname</a>";
                  }else if($i >= 3 && $i < 20){
                      $ps = 34 + ($i-3)*4;
                      echo "<a href='hospitalPage.php?Hname=$Hname'style=\"color:#000000;position:absolute;left:45.8%;top:$ps%;font-size:15px;\">$Hname</a>";
                  }
              }
          }
      }
  ?>
<img src="web_bottom.png" style="width:100%;height:40%;position:absolute;left:0;top:93%">
</body>
</html>