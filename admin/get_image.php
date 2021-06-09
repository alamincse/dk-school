<?php
/**
 * Image template 
 * get image/ video from database
 * @author AL-AMIN
 * @access public
 */
    $id = $_GET['id'];

    $link = mysql_connect("localhost", "root", "");
    mysql_select_db("dk_school_admission");
    $sql = "SELECT s_photo FROM adminssion_info WHERE id=$id";
    $result = mysql_query("$sql");

    while($row = mysql_fetch_assoc($result)){
      $row = $row['s_photo'];
      echo $row;
    }
?>