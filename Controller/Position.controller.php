<?php
include_once("config.php");
include_once("Model/Position.class.php");
include_once("View/Position.view.php");

class PositionController {
    private $position;  

    function __construct(){
        $this->position = new Position(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    }

    public function index() {
        $this->position->open();
        $this->position->getPosition();
        $data = array();
        while($row = $this->position->getResult()){
            array_push($data, $row);
        }

        $this->position->close();

        $view = new PositionView();
        $view->render($data);
    }

    public function createPage() {
        $view = new PositionCreateView();
        $view->render();
    }
    
    function create($data) {
        $this->position->open();
        $this->position->createPosition($data);
        $this->position->close();
        
        header("location:position.php");
    }
    
    public function updatePage($data) {
        $this->position->open();
        $this->position->getPositionByID($data['id']);
        $this->position->close();
        
        $record = $this->position->getResult();

        $view = new PositionEditView();
        $view->render($record);
    }

    function update($id){
        $this->position->open();
        $this->position->updatePosition($id);
        $this->position->close();
        
        header("location:position.php");
    }

    function delete($data){
        print_r($data);
        $this->position->open();
        $this->position->deletePosition($data);
        $this->position->close();
        
        header("location:position.php");
    }


}