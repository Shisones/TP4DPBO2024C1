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
    if (isset($_GET['id'])) {
        $position->delete($_GET);
    }
} else {
    if (isset($_GET['id'])) {
        $member->delete($_GET);
    }
}