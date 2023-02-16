<?php
session_start();

require_once __DIR__."/../repository/ScheduleRepository.php";
require_once __DIR__."/../models/User.php";

class ScheduleController extends AppController
{
    private $repository;

    public function createNewSchedule(){
        if($this->isPost()){
            $repository = new ScheduleRepository();

            $start = $_POST['start'];
            $end = $_POST['end'];

            $startTime = $_POST['start-time'];
            $endTime = $_POST['end-time'];

            $repository->createNewSchedule($_POST['text'], $start, $end, $startTime, $endTime);
        }

        header("Location: /../../index.php");
        exit();
    }

    public function removeSchedule(int $id){
        $repository = new ScheduleRepository();
        $repository->removeSchedule($id);

        header("Location: /../../index.php");
        exit();
    }

    public function __construct(){
        parent::__construct();
        $this->repository = new ScheduleRepository();
    }

    public function getAllSchedules(){
        if(isset($_SESSION['user_session'])){
            $user = unserialize($_SESSION['user_session']);

            return $this->repository->getAllSchedule($user->getID());
        }
        return null;
    }
}