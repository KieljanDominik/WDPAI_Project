<?php

session_start();

require_once __DIR__."/../models/User.php";
require_once __DIR__."/../models/Schedule.php";

class ScheduleRepository extends Repository
{
    public function createNewSchedule(string $text, string $start, string $end, string $startTime, string $endTime){
        if(!isset($_SESSION['user_session'])){
            header("Location: /views/singIn.php");
        }
        $user = unserialize($_SESSION['user_session']);

        $dbh = $this->database->connect();

        $stmt = $this->database->connect()->prepare('
            INSERT INTO "Schedule"(id, text, "startH", "endH", "startTime", "endTime") VALUES (default, ?, ?, ?, ?, ?);
        ');

        try{
            $dbh->beginTransaction();

            $stmt->execute([$text, $start, $end, $startTime, $endTime]);

            $lastID = $this->getLastID();

            $stmt = $this->database->connect()->prepare('
                INSERT INTO "UserSchedule"(id, "User_ID", "Schedule_ID") VALUES (default, ?, ?);
            ');

            $stmt->execute([$user->getID(), $lastID]);

            $dbh->commit();
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public function getAllSchedule(int $user_id){
        $stmt = $this->database->connect()->prepare('
            SELECT "Schedule".id, "Schedule".text, "Schedule"."startH", "Schedule"."endH", "Schedule"."startTime", "Schedule"."endTime" FROM "Schedule" INNER JOIN "UserSchedule" US on "Schedule".id = US."Schedule_ID" INNER JOIN "User" U on U.id = US."User_ID" WHERE U.id = ?
        ');

        $stmt->execute([$user_id]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $array = array();

        foreach ($result as $r){
            $array[] = new Schedule($r["id"], $r["text"], $r["startH"], $r["endH"], $r["startTime"], $r["endTime"]);
        }

        return $array;
    }

    public function removeSchedule(int $id){
        if($this->checkAccess($id)){
            $stmt = $this->database->connect()->prepare('
                DELETE FROM "Schedule" WHERE ID = ?
            ');

            $stmt->execute([$id]);
        }
    }

    private function getLastID(): int{
        $stmt = $this->database->connect()->prepare('
            SELECT max(ID) lastID FROM public."Schedule";
        ');

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['lastid'];
    }

    private function checkAccess(int $id){
        if(isset($_SESSION['user_session'])){
            $user = unserialize($_SESSION['user_session']);

            $stmt = $this->database->connect()->prepare('
                SELECT count(*) amount FROM "UserSchedule" WHERE "Schedule_ID" = ? AND "User_ID" = ?
            ');

            $stmt->execute([$id, $user->getID()]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['amount'] > 0;
        }

        return false;
    }
}