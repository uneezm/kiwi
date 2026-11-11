<?php
session_start();
//  szemelyes adatok
$_SESSION["fullName"]="";
$_SESSION["fullName_valid"]=false;

$_SESSION["motherName"]="";
$_SESSION["motherName_valid"]=false;

$_SESSION["birthDate"]="";
$_SESSION["birthDate_valid"]=false;

$_SESSION["birthPlace"]="";
$_SESSION["birthPlace_valid"]=false;

$_SESSION["taj"]="";
$_SESSION["taj_valid"]=false;

$_SESSION["email"]="";
$_SESSION["email_valid"]=false;

$_SESSION["phone"]="";
$_SESSION["phone_valid"]=false;

$_SESSION["address"]="";
$_SESSION["address_valid"]=false;

$_SESSION["temporaryAddress"]="";
$_SESSION["temporaryAddress_valid"]=false;

$_SESSION["taxNumber"]="";
$_SESSION["taxNumber_valid"]=false;

$_SESSION["returning"]="";
$_SESSION["returning_valid"]=false;

//  szolgaltatasok
$_SESSION["service"]="";
$_SESSION["service_valid"]=false;

$_SESSION["urgent"]="";
$_SESSION["urgent_valid"]=false;

$_SESSION["urgentDetail"]="";
$_SESSION["urgentDetail_valid"]=false;

$_SESSION["reason"]="";
$_SESSION["reason_valid"]=false;

$_SESSION["times"]=array("morning","afternoon","evening");
$_SESSION["times_valid"]=false;

$_SESSION["availability"]="";
$_SESSION["availability_valid"]=false;

//  altalanos felmeres

$_SESSION["allergy"]="";
$_SESSION["allergy_valid"]=false;

$_SESSION["allergyDetail"]="";
$_SESSION["allergyDetail_valid"]=false;

$_SESSION["medication"]="";
$_SESSION["medication_valid"]=false;

$_SESSION["medicationDetail"]="";
$_SESSION["medicationDetail_valid"]=false;

$_SESSION["sensitivity"]="";
$_SESSION["_valid"]=false;

$_SESSION["sensitivityDetail"]="";
$_SESSION["sensitivityDetail_valid"]=false;

$_SESSION["notes"]="";
$_SESSION["notes_valid"]=false;

//  fajlfeltoltes

$_SESSION["files"]="";
$_SESSION["files_valid"]=false;




 


// validacio
$_SESSION["validation_result"]=false;











?>