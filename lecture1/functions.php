<?php


function employee_Massive_Filter($array){

    $filtered_array = array(        
        "Name"          => $array["name"],
        "LastName"      => $array["lname"],
        "Position"      => $array["position"],
        "Salary"        => $array["salary"],
        "TaxAmmount"    => $array["taxammount"],
        "SalaryAmmount" => 0
    );
    if(!empty($array) && $array["taxtype"] === "precentage" ){
        $filtered_array["SalaryAmmount"] = intval($array["salary"]) - ((intval($array["salary"]) * intval($array["taxammount"])) / 100);
        $filtered_array["TaxAmmount"] = (intval($array["salary"]) * intval($array["taxammount"])) / 100;
    }
    else{
        $filtered_array["SalaryAmmount"] = intval($array["salary"]) - intval($array["taxammount"]);
    }
    return $filtered_array;

}

function student_Massive_Filter($array){
    $filtered_array = array(
        "name"      => $array["name"],
        "lname"     => $array["lname"],
        "course"  => $array["course"],
        "semsetri"    => $array["semsetri"],
        "grade" => '',
        "lec" => $array["lec"],
        "dec"  => $array["dec"],
    );
    if($array['grade'] >= 97 && $array['grade'] <= 100){
        $filtered_array['grade'] = "A+";
    }
    else if($array['grade'] >= 93 && $array['grade'] <= 96){
        $filtered_array['grade'] = "A";
    }
    else if($array['grade'] >= 90 && $array['grade'] <= 92){
        $filtered_array['grade'] = "A-";
    }
    else if($array['grade'] >= 87 && $array['grade'] <= 89){
        $filtered_array['grade'] = "B+";
    }
    else if($array['grade'] >= 83 && $array['grade'] <= 86){
        $filtered_array['grade'] = "B";
    }
    else if($array['grade'] >= 80 && $array['grade'] <= 82){
        $filtered_array['grade'] = "B-";
    }
    else if($array['grade'] >= 77 && $array['grade'] <= 79){
        $filtered_array['grade'] = "C+";
    }
    else if($array['grade'] >= 73 && $array['grade'] <= 76){
        $filtered_array['grade'] = "C";
    }
    else if($array['grade'] >= 70 && $array['grade'] <= 82){
        $filtered_array['grade'] = "C-";
    }
    else if($array['grade'] >= 67 && $array['grade'] <= 69){
        $filtered_array['grade'] = "D+";
    }
    else if($array['grade'] >= 63 && $array['grade'] <= 66){
        $filtered_array['grade'] = "D";
    }
    else if($array['grade'] >= 60 && $array['grade'] <= 62){
        $filtered_array['grade'] = "D-";
    }
    else if($array['grade'] >= 0 && $array['grade'] <= 59){
        $filtered_array['grade'] = "F";
    }
    else{
        $filtered_array['grade'] = "ERROR";
    }
    return $filtered_array;
}
?>