<html>
    <head>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    </head>
<body>
<canvas id="C"></canvas>
<script src="script.js"></script>
<div>
<?php
$dir = 'myDir';
$found = FALSE;
$max_members = 2;
$count = 0;
if(isset($_GET['edit'])){
    $line = 0;
    $name = array('','','','','');
    $email = array('','','','','');
    $Pass = isset($_GET['Password']) ? $_GET['Password'] : '';
    $team = isset($_GET['team']) ? $_GET['team'] : '';
    for($i=0;$i<5;$i++){
        $name[$i] = isset($_GET['name'.strval($i+1)]) ? $_GET['name'.strval($i+1)] : '';
        $email[$i] = isset($_GET['email'.strval($i+1)]) ? $_GET['email'.strval($i+1)] : '';
    }
    $good = true;
    $good = $good && ($team!='') && ($Pass!='');
    if(!$good){
        echo("Don't leave the team and password entries empty");
        $broken = true;
    }
    if($good){
        for($i=0;$i<3;$i++){
            $good = $good && ($name[$i]!='') && ($email[$i]!='');
        }
        if(!$good){
            echo("Please fill out at least the first three members' names and email ids.");
        }
    }

    if($good){
        for($i=1;$i<5;$i++){
            for($j=0;$j<$i;$j++){
                if($name[$i]==$name[$j] && $name[$i]!=""){
                    $good = false;
                }
            }
        }
    }
    if(!$good){echo("You have put the same person's name multiple times. Not cool.");}
    
    if($good && !file_exists($dir)){
        $good = false;
        echo('You are not registered..in fact, noone is.');
    }
    if($good){
        chmod($dir,722);
        $fileR = fopen($dir.'/dict.csv','r');    
        while(($list = fgetcsv($fileR))!==FALSE){
            if($list[0]==$team){
                $found=TRUE;
                if($list[1]==$Pass){
                    echo('Edited!');
                }
                else{
                    echo('Incorrect password');
                    $good = false;
                }
                break;
            } else {
                $line += 1;
            }
        }
        if(!$found){
            echo "<br> You are not registerd";
        }
        fclose($fileR);
        chmod($dir,222);
    }
    if($found && $good){
        chmod($dir,722);
        $fileR = fopen($dir.'/dict.csv','r');
        $fileW = fopen($dir.'/dic.csv','a');  
        while(($entry = fgets($fileR))!==FALSE){
            if($line==0){
                fwrite($fileW,$team.",".$Pass);
                for($i=0;$i<5;$i++){
                    fwrite($fileW,", ,".$name[$i].",".$email[$i]);
                }
            } else {
                fwrite($fileW,$entry);
            }
            if($line !=1){
                fwrite($fileW,"\n");
            }
            $line = $line - 1;
        }
        fclose($fileW);
        fclose($fileR);
        rename($dir.'/dic.csv',$dir.'/dict.csv');
        chmod($dir,222);
    }
}
if(isset($_GET['register'])){
    $name = array('','','','','');
    $email = array('','','','','');
    $Pass = isset($_GET['Password']) ? $_GET['Password'] : '';
    $team = isset($_GET['team']) ? $_GET['team'] : '';
    for($i=0;$i<5;$i++){
        $name[$i] = isset($_GET['name'.strval($i+1)]) ? $_GET['name'.strval($i+1)] : '';
        $email[$i] = isset($_GET['email'.strval($i+1)]) ? $_GET['email'.strval($i+1)] : '';
    }
    $good = true;
    $good = $good && ($team!='') && ($Pass!='');
    if(!$good){
        echo("Don't leave the team and password entries empty");
        $broken = true;
    }
    if($good){
        for($i=0;$i<3;$i++){
            $good = $good && ($name[$i]!='') && ($email[$i]!='');
        }
        if(!$good){
            echo("Please fill out at least the first three members' names and email ids.");
        }
    }
    if($good){
        for($i=1;$i<5;$i++){
            for($j=0;$j<$i;$j++){
                if($name[$i]==$name[$j] && $name[$i]!=""){
                    $good = false;
                }
            }
        }
        if(!$good){echo("You have put the same person's name multiple times. Not cool.");}
    }
    if($good){
        if(!file_exists($dir)){
            mkdir($dir,0722);
        } else {
            chmod($dir,722);
            $fileR = fopen($dir.'/dict.csv','r');
            while(($list = fgetcsv($fileR))!==FALSE){
                if($list[0]==$team){
                    $found=TRUE;
                    break;
                }
                for($i=0;$i<5;$i++){
                    for($j=0;$j<5;$j++){
                        if($list[$i]==$name[$j] && $name[$j]!=""){
                            $good = false;
                        }
                    }
                    if(!$good){break;}
                }
            }
            fclose($fileR);
        }
        if($found){echo("There is already an entry with the team name <code>".$team."</code> <br> If it's your team, and you want to edit your members, use the edit option on the last page");}
        elseif(!$good){echo("Some of your teammates are already registered in other teams. Please discuss this issue with them and contact us if required.");}
        else{
            echo("Thank you for registering! Team <code>".$team."</code> is now a part of Robowars! <br> Use the password that you have submited to edit your team in the future.");
            $fileW = fopen($dir.'/dict.csv','a');
            fwrite($fileW,$team.",".$Pass);
            for($i=0;$i<5;$i++){
                fwrite($fileW,", ,".$name[$i].",".$email[$i]);
            }
            fwrite($fileW,"\n");
            fclose($fileW);
        }
        chmod($dir,222);
    }
}
?>
<br><br>
<a href="http://localhost/Form/">Back</a>
</div>
</body>
</html>
