<?php
include_once("Model/Template.class.php");
include_once("Model/DB.class.php");
include_once("Controller/Member.controller.php");

$member = new MemberController();

if (isset($_GET['id'])) {
    $member->delete($_GET);
}