<?php
include('config.php');
session_start();
$myusername = $_SESSION['myusername'];
$mypassword = $_SESSION['mypassword'];
$myuser_id = $_SESSION['myuser_id'];

$sql = "SELECT * FROM Company WHERE user_id = $myuser_id";
$result = mysqli_query($db,$sql);
$row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);
$myuser_name = $row1["company_name"];
echo "<div class='bucenter'><div id='first-div' style='text-align:left;width:50%'><h1><a href='company_home.php'>RecruiDB</a></h1></div>";
echo "<div id='second-div' style='text-align:right;width:50%'><a href=company_info.php?compid={$myuser_id}><img src='./dev_profile.png' style='height:64;width:64'></a><a href=dev_stats.php><img src='./dev_stats.png' style='height:64;width:64'></a><a href=messages.php?userid={$myuser_id}><img src='./messages.png' style='height:64;width:64'></a></div></div>";

echo "<h1>Welcome, {$myuser_name}!</h1>";

echo "<h2>New Challenge</h2><hr/>";

if($_SERVER["REQUEST_METHOD"] == "POST") {

  $questiontitle = mysqli_real_escape_string($db,$_POST['questiontitle']);
  $difficulty = mysqli_real_escape_string($db,$_POST['difficulty']);
  $challengequest = mysqli_real_escape_string($db,$_POST['challengequest']);
  $insertQuestionQuery = "INSERT INTO Question VALUES (NULL, '$difficulty', '$challengequest', '$questiontitle')";
  $insertquestionesult = mysqli_query($db, $insertQuestionQuery);


  if($insertquestionesult == TRUE) echo "Question inserted successfully!";
  else "Error! Question cannot be inserted";


}
?>

<html>
<style>
body
{
  font-family: Helvetica;
}

.myp
{
 text-align: right;
}

.bucenter {
  display: flex;
  justify-content: center; /* center items vertically, in this case */
  align-items: center;
}

.bucont {
  display: flex;
}

.busag {
  display: flex;
  justify-content: right; /* center items vertically, in this case */
  align-items: right;
}

.busol {
  display: flex;
  justify-content: left; /* center items vertically, in this case */
  align-items: left;
}

.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #006699; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #0070A8; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #00557F; border-left: 1px solid #E1EEF4;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #E1EEf4; color: #00557F; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #006699;background: #E1EEf4;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #FFFFFF;border: 1px solid #006699;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #00557F; color: #FFFFFF; background: none; background-color:#006699;}div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }
</style>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<div align = "left">
  <div style = "border: solid 1px #333333; " align = "left">

    <div style = "margin:30px">

      <form onsubmit="return validateForm()" action = "" method = "post" name="Form" id="Form">
        <label class = "myp" >Question Title: </label><input type = "text" name = "questiontitle" class = "box"/><br /><br />
        <label class = "myp" >Difficulty: </label><input type = "text" name = "difficulty" class = "box" /><br/><br />
        <label class = "myp" >Challenge of Question: </label><input type = "text" name = "challengequest" class = "box" /><br/><br />
        <label class = "myp" >Question Definition: </label><input type = "text" name = "definition" class = "box" /><br/><br />
        <label class = "myp" >Question Answer: </label><input type = "text" name = "answer" class = "box" /><br/><br />


        <input type = "submit" value = " Create Question "/><br />
      </form>

      <script type="text/javascript">
      function validateForm(){
        var qt=document.forms["Form"]["questiontitle"].value;
        var dif=document.forms["Form"]["difficulty"].value;
        var cq=document.forms["Form"]["challengequest"].value;
        var def=document.forms["Form"]["definition"].value;
        var ans=document.forms["Form"]["answer"].value;

        if ( (qt==null || qt=="") || (dif==null || dif=="") || (cq==null || cq=="") || (def==null || def=="") || (ans==null || ans=="")){
          alert("Please fill the required fields!");
          return false;
        }
      }
      </script>

    </div>
  </div>

</div>

<form style="text-align: center;" action="./company_home.php">
<p><span style="font-family: Arial;"><span style="font-size: 13.3333px;"><br /></span></span> <input type="submit" value="Go back" /></p>
<a href='index.php'><button type="button">Logout</button></a>
<p>&nbsp;</p>
<hr />
<p>&nbsp;</p>
</form>
</html>
