<?php

use App\Http\interfaces\MessageInterface;
use App\Http\Services\Message\SMS\MeliPayamakService;

class SmsService implements MessageInterface
{
    private $from;
    private $text;
    private $to;
    private $isFlash = true;

    public function fire()
    {
        // TODO: Implement fire() method.
        $meliPayamak =  new MeliPayamakService();
    }

    public function getFrom(){
        return $this->from;
    }
    public function setFrom($from){
        $this->from = $from;
    }

    public function getText(){
        return $this->text;
    }
    public function setText($text){
        $this->text = $text;
    }
    public function getTo(){
        return $this->to;
    }
    public function setTo($to){
        $this->to = $to;
    }
    public function isFlash(){
        return $this->isFlash;
    }
    public function setIsFlash($isFlash){
        $this->isFlash = $isFlash;
    }
}