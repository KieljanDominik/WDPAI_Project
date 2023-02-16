<?php

class Schedule
{
    private $id;
    private $text;
    private $start;
    private $end;

    private $startTime;
    private $endTime;

    public function __construct(int $id, string $text, string $start, string $end, string $startTime, string $endTime){
        $this->id = $id;
        $this->start = $start;
        $this->end = $end;
        $this->text = $text;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    public function getID() : int
    {
        return $this->id;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function getStartTime()
    {
        return $this->startTime;
    }

    public function getEndTime()
    {
        return $this->endTime;
    }
}