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
                $record = new stdClass();
                $record->timeslot = (string)$time['type'];
                $record->course = (string) $time->course['course'];
                $record->room = (string) $time->course->room;
                $record->instructor = (string) $time->course->instructor ;
                $record->classtype = (string) $time->course->classtype['type'] ;
                $record->day = (string) $time->course->day['type'] ;
            
                $this->timeslots[$record->timeslot][$record->course] = $record;
            }
        }
        
        //build a full list using courses
        foreach($this->xml->courses as $course)
        {
            $record = new stdClass();
            $record->timeslot = (string)$course->timeslot['type'];
            $record->course = (string)$course['course'];
            $record->day = (string)$course->day['type'];
            $record->room = (string)$course->room;
            $record->instructor = (string)$course->instructor;
            $record->classstype = (string)$course->classtype['type'];
            
            $this->courses[$record->course] = $record;
        }
        
        //build a fulllist using days
        foreach($this->xml->days as $days)
        {
            foreach($days->timeslots as $timeslots)
            {
                $record = new stdClass();
                $record->timeslot = (string)$days->timeslots['type'];
                $record->course = (string)$timeslots->course['course'];
                $record->room = (string)$timeslots->course->room;
                $record->instructor = (string)$timeslots->course->instructor;
                $record->classtype = (string)$timeslots->course->classtype['type'];
                $record->day =(string)$timeslots->course->day['type'];
                
                $this->days[$record->day][$record->timeslot] = $record;
            }
        }
        
    }
    
    function getTimeslots($timeslot, $course)
    {
        if(isset($this->timeslots[$timeslot][$course]))
            return $this->timeslots[$timeslot][$course];       
        else
            return null;
    }
    
    function getCourses($course)
    {
        if(isset($this->courses[$course]))
            return $this->course[$course];
        else 
            return null;
    }
    
    function getDays($day,$timeslot)
    {
        if(isset($this->days[$day][$timeslot]))
            return $this->days[$day][$timeslot];
        else
            return null;
    }
         
}