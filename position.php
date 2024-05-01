<?php
ini_set('display_errors', 1);
error_reporting(~0);

include_once("Model/Template.class.php");
include_once("Model/DB.class.php");
include_once("Controller/Position.controller.php");

$position = new PositionController();

$position->index();
