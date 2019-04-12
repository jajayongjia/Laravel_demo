<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['name','phoneNumber','email'];
    private $name;
    private $phoneNumber;
    private $email;

    public function setName($name){
      $this->name = $name;
    }

    public function getName(){
      return $this->name;
    }
    public function setPhoneNumber($phoneNumber){
      $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber(){
      return $this->phoneNumber;
    }

    public function setEmail($email){
      $this->email = $email;
    }

    public function getEmail(){
      return $this->email;
    }
}
