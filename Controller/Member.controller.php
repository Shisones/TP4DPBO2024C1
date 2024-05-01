<?php
include_once("config.php");
include_once("Model/Member.class.php");
include_once("Model/Position.class.php");
include_once("View/Member.view.php");

class MemberController {
    private $member;  

    function __construct(){
        $this->member = new Member(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    }

    public function index() {
        $this->member->open();
        $this->member->getMember();
        $data = array();
        while($row = $this->member->getResult()){
            array_push($data, $row);
        }

        $this->member->close();

        $view = new MemberView();
        $view->render($data);
    }

    public function createPage() {
        $view = new MemberCreateView();
        $view->render();
    }
    
    function create($data) {
        $this->member->open();
        $this->member->createMember($data);
        $this->member->close();
        
        header("location:index.php");
    }
    
    public function updatePage($data) {
        $this->member->open();
        $this->member->getMemberByID($data['id']);
        $this->member->close();
        
        $record = $this->member->getResult();

        $view = new MemberEditView();
        $view->render($record);
    }

    function update($id){
        $this->member->open();
        $this->member->updateMember($id);
        $this->member->close();
        
        header("location:index.php");
    }

    function delete($data){
        print_r($data);
        $this->member->open();
        $this->member->deleteMember($data);
        $this->member->close();
        
        header("location:index.php");
    }


}