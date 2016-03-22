<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Timetable extends CI_Model
{
    protected $xml = null;
    protected $timeslot_times = array();
    protected $timeslots = array();
    
    protected $courses = array();
    protected $days = array();


// Constructor
    public function __construct()
    {
        parent::__construct();
        $this->xml = simplexml_load_file((DATAPATH . 'schedule.xml'));
        
        //build a full list using timeslots
        foreach($this->xml->timeslots as $time)
        {
            foreach($time->course as $course)
            {
                $record = new Booking();
                $record->setSlot((string)$time['type']);
                $record->setCourse((string) $course['course']);
                $record->setRoom((string) $course->room);
                $record->setInstructor((string) $course->instructor );
                $record->setClasstype((string) $course->classtype['type'] ) ;
                $record->setDay((string) $course->day['type']);
            
                $this->timeslots[] = $record;
            }
        }
        
        //build a full list using courses
        foreach($this->xml->courses as $course)
        {
            $record = new Booking();
            $record->setSlot((string)$course->timeslot['type']);
            $record->setDay((string)$course->day['type']);
            $record->setRoom((string)$course->room);
            $record->setInstructor((string)$course->instructor);
            $record->setClassType((string)$course->classtype['type']);
            
            $this->courses[] = $record;
        }
        
        //build a fulllist using days
        foreach($this->xml->days as $days)
        {
            foreach($days->timeslots as $timeslots)
            {
                $record = new Booking();
                $record->setSlot((string)$timeslots['type']);
                $record->setCourse((string)$timeslots->course['course']);
                $record->setRoom((string)$timeslots->course->room);
                $record->setInstructor((string)$timeslots->course->instructor);
                $record->setClassType((string)$timeslots->course->classtype['type']);
                $record->setDay((string)$timeslots->course->day['type']);
                
                $this->days[] = $record;
            }
        }
        
    }
    
    function getTimeslots()
    {
        return $this->timeslots;
    }
    
    function getCourses()
    {
        return $this->courses;
    }
    
    function getDays()
    {
        return $this->days;
    }
    
    function getDayCodes()
    {
        $days = array(array('day'=>'Monday'), array('day'=>'Tuesday'), array('day'=>'Wednesday'), array('day'=>'Thursday'), array('day'=>'Friday'));
        return $days;
        
    }
    
    function getTimeslotCode()
    {
        $timeslot = array(array('slot'=>'1'),array('slot'=>'2'),array('slot'=>'3'),array('slot'=>'4'),array('slot'=>'5'),array('slot'=>'6'),array('slot'=>'7'),array('slot'=>'8'),array('slot'=>'9'));
        return $timeslot;
    }
    
    public function findBookingTimeSlot($day,$slot)
    {
        $result = array();
        foreach ($this->timeslots as $time)
        {
            if($time->getDay() == $day && $time->getSlot() == $slot){
                $result[] = $time;       
            }
        }
        return $result;
    }
    
    public function findBookingCourse($day,$slot)
    {
        $result = array();
        foreach ($this->courses as $course)
        {
            if($course->getDay() == $day && $course->getSlot() == $slot){
                $result[] = $course;       
            }
        }
        return $result;
    
    }
    
    public function findBookingDay($day,$slot)
    {
        $result = array();
        foreach ($this->days as $dayCheck)
        {
            if($dayCheck->getDay() == $day && $dayCheck->getSlot() == $slot){
                $result[] = $dayCheck;       
            }
        }
        return $result;
    
    }
}

class Booking extends CI_Model 
{
    protected $day;
    protected $slot;
    protected $course;
    protected $instructor;
    protected $room;
    
    public function __construct() 
    {
        parent::__construct();
        $this->slot = '';
        $this->course = '';
        $this->day = '';
        $this->instructor = '';
        $this->room = '';
        $this->classtype = '';
        
     
    }
    
    public function setCourse($course)
    {
        $this->course = $course;
    }
    public function setSlot($slot)
    {
        $this->slot = $slot;
    }
    public function setDay($day)
    {
        $this->day = $day;
    }
    public function setInstructor($instructor)
    {
        $this->instructor = $instructor;
    }
    public function setRoom($room)
    {
        $this->room = $room;
    }
    public function setClassType($classType)
    {
        $this->classtype = $classType;
    }
    public function getCourse()
    {
        return $this->course;
    }
    public function getDay()
    {
        return $this->day;
    }
    public function getSlot()
    {
        return $this->slot;
    }
    public function getInstructor()
    {
        return $this->instructor;
    }
    public function getRoom()
    {
        return $this->room;
    }
    public function getClassType()
    {
        return $this->classtype;
    }
}