<?php
/**
 * Created by PhpStorm.
 * User: Kinice
 * Date: 2015/5/19
 * Time: 10:33
 */
$con = mysql_connect("localhost","root","chunxia130608");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("renwen", $con);
?>