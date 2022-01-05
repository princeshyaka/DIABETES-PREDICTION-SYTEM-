<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['age','pregnancies','glucose','bloodPressure',  'skinThickness', 'insulin','BMI','diabetesPedigreeFunction','outcome','user_id','patient_id'];
    public function patient(){
        return $this->belongsTo('App\Patient','patient_id');
   }
   public function doctor(){
    return $this->belongsTo('App\User','user_id');
   } 
    public function getResult(){
    if($this->outcome==1){
        return "positive";
    }else
    return "negative";

}
public function getGlucose()
{
    if($this->glucose>=200){
        return "high risk or type 2 diabetes";
    }
    else if($this->glucose>=140 && $this->glucose<=199){
        return "prediabetes at risk";
    }
    else if($this->glucose<=139){
        return "normal";
    }
}
public function getGlucoseSuggestion(){
    if($this->glucose>139){
        return collect(["Cut Sugar and Refined Carbs From Your Diet", "Work Out Regularly", "Drink Water as Your Primary Beverage","Lose Weight If You're Overweight or Obese","Quit Smoking","Follow a Very-Low-Carb Diet"]);
    }
}
public function getBMI()
{
    if($this->BMI>=40){
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
public function getBMISuggestion(){
    if($this->BMI>=25){
        return collect(["Incorporate fun and exciting physical activity","Consume less bad fat and more good fat","Consume less processed and sugary foods","Eat plenty of dietary fiber","Engage in regular aerobic activity","Focus on reducing daily stress"]);
    }else if($this->BMI<18.5){
        return collect(["Eat nutrient-rich food","Include smoothies and shakes to your diet","
        Eat smaller meals, more frequently","Avoid caffeinated drinks"]);
    }
}

}