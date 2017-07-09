<?php
 class Alarm
 {
     protected $alarm;
     protected $id;
     protected $param;
     protected $date;
     protected $data;

     public function getAlarm()
     {
         return $this->alarm;
     }

     public function setAlarm($alarm)
     {
         $this->alarm = $alarm;
     }

     public function getId()
     {
         return $this->id;
     }

     public function setId($id)
     {
         $this->id = $id;
     }

     public function getDate()
     {
         return $this->date;
     }

     public function setDate($date)
     {
         $this->date = $date;
     }

     public function getParam()
     {
         return $this->param;
     }

     public function setParam($param)
     {
         $this->param = $param;
     }

     public function getData()
     {
         return $this->data;
     }

     public function setData($data)
     {
         $this->data = $data;
     }

     public function __construct($alarm)
     {
        $param = array_keys($alarm);
             $this->id = isset($alarm['node']) ? $alarm['node'] : null;
             $this->param = isset($param[1]) ? $param[1] : null;
             $this->date = isset($alarm[$param[1]]['date']) ? $alarm[$param[1]]['date'] : null;
             $this->data = isset($alarm[$param[1]]['data']) ? $alarm[$param[1]]['data'] : null;
     }

     public function validate()
     {
         return !empty($this->getId()) && !empty($this->getParam()) && !empty($this->getDate()) && !empty($this->getData());
     }

 }