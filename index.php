<?php
ini_set('display_errors', 1);
error_reporting(~0);

include_once("Model/Template.class.php");
include_once("Model/DB.class.php");
include_once("Controller/Member.controller.php");

$member = new MemberController();

if (isset($_POST['add'])) {
    $member->add($_POST);
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $member->delete($id);
} else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $member->edit($id);
} else{
    $member->index();
}
