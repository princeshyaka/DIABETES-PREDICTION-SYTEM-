<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $dates = [
        'DOB',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    public function test(){
        return $this->hasMany('App\Test','patient_id');
    }
    public function getSex(){
        if($this->gender==1)
             return "Male";
        else 
            return "Female";
       
    }
    public function getBMI()
{
    if($this->BMI==null)
    {
        return "";
    }
    else if($this->BMI>=40){
       return "Obesity Class III";
    }
    else if($this->BMI>=35 && $this->BMI<=39.9){
        return "Obesity Class II";
    }
    else if($this->BMI>=30 && $this->BMI<=34.9){
        return "Obesity Class I";

    }
    else if($this->BMI>=25 && $this->BMI<=29.9){
        return "Overweight";
    }
    else if($this->BMI>=18.5 && $this->BMI<=24.9){
        return "Normal or Healthy Weight";
    }
    else if($this->BMI<18.5){
        return "underweight";
    }
    
}
    public function getResult(){
        if(isset($this->diabete))
        {
            if($this->diabete==1){
                return "Positive";
            }
            else{
                return "Negative";
            }
        }
        else
        return "";
        
    
    }
    public function getGlucose()
    {
         if($this->glucose==null)
        {
            return "";
        }
        else if($this->glucose>=200){
            return "high risk or type 2 diabetes";
        }
        else if($this->glucose>=140 && $this->glucose<=199){
            return "prediabetes at risk";
        }
        else if($this->glucose<=139){
            return "normal";
        }
        
        }
    


   

}