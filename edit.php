<?php
include_once("Model/Template.class.php");
include_once("Model/DB.class.php");
include_once("Controller/Member.controller.php");

$member = new MemberController();

if (isset($_POST['update'])) {
    $member->update($_POST);
} else if ($_GET['id']){
    $member->updatePage($_GET);
} 