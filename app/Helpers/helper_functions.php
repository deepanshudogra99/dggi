<?php

use App\Models\StateMaster;
use App\Models\DistMaster;


    function getCurrentDateTime()
    {
        return now();
    }
    function formatDateTime($datetime)
    {
        $date = \Carbon\Carbon::parse($datetime->timezone('Asia/Kolkata'))->format('d-M-Y g:i A');
        return $date;
    }
    function formatStringToDate($dtstring)
    {
        $date = \Carbon\Carbon::parse($dtstring);
        $date->timezone('Asia/Kolkata'); 
        return $date->format('d-M-Y');
    }
    function formatStringToDateTime($dtstring)
    {
        $date = \Carbon\Carbon::parse($dtstring);
        $date->timezone('Asia/Kolkata'); 
        return $date->format('d-M-Y g:i A');
    }
    function formatStringToTime($timestring)
    {
        $date = \Carbon\Carbon::parse($timestring->timezone('Asia/Kolkata'))->format('g:i A');
        return $date;
    }
 function replaceEmailPattern($email)
    {
        $modifiedEmail = str_replace(['@'], '[at]', $email);
        $modifiedEmail = str_replace(['.'], '[dot]', $modifiedEmail);
        return $modifiedEmail;
    }

  function getdesignation($distcode,$desigcode)
    {
    
        $desig=DesignationMaster::where('distcode',$distcode)->where('DesigCode',$desigcode)->first();
        if($desig)
        {
            return $desig->Designation;
        }
        else{
               return " ";
        }
        
    }
  
    function getstatename($statecode){
        $state = StateMaster::where('stcode',$statecode)->first();
        if($state){
            return $state->stname;
        }
        else{
            return " ";
        }
    }
    function getdistrictname($statecode,$distcode){
        $district = DistMaster::where('stcode',$statecode)->where('dtcode',$distcode)->first();
        if($district){
            return $district->dtname;
        }
        else{
            return " ";
        }
    }
?>