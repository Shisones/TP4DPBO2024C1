<?php
ini_set('display_errors', 1);
error_reporting(~0);

include_once("Model/Template.class.php");
include_once("Model/DB.class.php");
include_once("Controller/Member.controller.php");
include_once("Controller/Position.controller.php");

$member = new MemberController();
$position = new PositionController();

if (isset($_GET['position'])) {
    if (isset($_POST['update'])) {
        $position->update($_POST);
    } else if ($_GET['id']){
        $position->updatePage($_GET);
    } 
} else {
    if (isset($_POST['update'])) {
        $member->update($_POST);
    } else if ($_GET['id']){
        $member->updatePage($_GET);
    } 
}