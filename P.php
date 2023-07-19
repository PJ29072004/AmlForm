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
if(isset($_GET['login'])){
    $num = isset($_GET['number']) ? $_GET['number'] : '';
    $Pass = isset($_GET['Password']) ? $_GET['Password'] : '';
    $team = isset($_GET['team']) ? $_GET['team'] : '';
    if(($num!=='')&&($Pass!=='')){
        if ( !file_exists($dir) ) {
            echo('You are not registered..in fact, noone is.');
        } else {
            chmod($dir,722);
            $fileR = fopen($dir.'/dict.csv','r');
            //echo "<table>\n";
            while(($list = fgetcsv($fileR))!==FALSE){
                //echo "<tr>";
                for($i = 0; $i < count($list); $i++) {
                    //echo "<td>".$list[$i]."</td>";
                }
                //echo "</tr>\n";
                if($list[0]==$num){
                    $found=TRUE;
                    //echo "</table>\n <br>\n";
                    if($list[1]==$Pass){
                        echo('Welocome back!');
                    }
                    else{
                        echo('Incorrect password');
                    }
                    break;
                }
            }
            if(!$found){
                //echo "</table>\n";
                echo "<br> You are not registerd";
            }
            fclose($fileR);
            chmod($dir,222);
        }
    } else {
        echo('Invalid number or password!');
    }
}
if(isset($_GET['register'])){
    $num = isset($_GET['number']) ? $_GET['number'] : '';
    $Pass = isset($_GET['Password']) ? $_GET['Password'] : '';
    $team = isset($_GET['team']) ? $_GET['team'] : '';
    if($num!==''){
        if ( !file_exists($dir) ) {
            mkdir ($dir, 0722);
        } else {
            chmod($dir,722);
            $fileR = fopen($dir.'/dict.csv','r');
            //echo "<table>\n";
            while(($list = fgetcsv($fileR))!==FALSE){
                //echo "<tr>";
                for($i = 0; $i < count($list); $i++) {
                    //echo "<td>".$list[$i]."</td>";
                }
                //echo "</tr>\n";
                if($list[0]==$num){$found=TRUE;}
                if($list[2]==$team){$count++;}
            }
            //echo "</table>\n";
            fclose($fileR);
        }
        if($found){echo("Someone has already registered with this number.");}
        else if($count >= $max_members){echo("Sorry, this team is full");}
        else{
            echo("Thank you!");
            $fileW = fopen($dir.'/dict.csv','a');
            fwrite($fileW,$num.",".$Pass.",".$team."\n");
            fclose($fileW);
            echo("<br> Now, you are a part of team <code>".$team."</code>");
        }
        chmod($dir,222);
    } else {
        echo('Please type a valid number');
    }
}
?>
<br><br>
<a href="http://localhost/Form/">Back</a>
</div>
</body>
</html>