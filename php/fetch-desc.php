<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require "config.php";
if (!is_int($_SESSION['id']))
        fail('Input Error');
else
$user_id = $_SESSION['id'];
$log_id = clean_id('log_id');

$query = "SELECT `details`, `timeStarted` FROM `recordedLogs` WHERE `ID` = ?";
($stmt = $db->prepare($query))
        || fail("query error".$db->errno);
$stmt->bind_param("i", $log_id)
        || fail("bind_param:".$db->errno);
$stmt->execute()
        ||fail("execute:".$db->errno);   
$result = $stmt->get_result();
$description = $result->fetch_assoc();
echo($description['details']);
?>