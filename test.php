<?php

$myfile = fopen($_GET['fileName'], "r") or die("Unable to open file!");
if($myfile) {
    while (($data = fgetcsv($myfile, 1000, " ")) !== FALSE) {
        foreach($data as $num)
            $numbers[] = $num;
    }
    fclose($myfile);
}

for($i=0; $i<count($numbers); $i++){
    if($_GET['operation']=='/'){
        $sum[]=$numbers[$i]/$numbers[$i+1];
    }
    else if($_GET['operation']=='*'){
        $sum[]=$numbers[$i]*$numbers[$i+1];
    }
    else if($_GET['operation']=='+'){
        $sum[]=$numbers[$i]+$numbers[$i+1];
    }
    else if($_GET['operation']=='-'){
        $sum[]=$numbers[$i]-$numbers[$i+1];
    }
    $i++;

}

$positiveFile=fopen("positive.txt", "w") or die("Unable to open positive file!");
$negativeFile=fopen("negative.txt","w") or die("Unable to open negative file!");
for($j=0; $j<count($sum); $j++){
    if($sum[$j]>=0){
        fwrite($positiveFile,$sum[$j].PHP_EOL);

    }
    else{
        fwrite($negativeFile,$sum[$j].PHP_EOL);
    }
}
fclose($positiveFile);
fclose($negativeFile);
echo "DONE";

