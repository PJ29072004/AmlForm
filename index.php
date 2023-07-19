<html>
<head>
<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
<title>Registeration Page</title>
</head>
<body>
<canvas id="C"></canvas>
<script src="script.js"></script>
<div>
<p>Hello!</p>
<form method="get" action="P.php" autocomplete='off'>
    <input type="text" value="" placeholder="Roll no." name="number"><br>
    <input type="text" value="" placeholder="Password" name="Password">
    <input type="search" name="team" placeholder="team name" list="teams">
    <datalist id="teams">
        <div>
        <?php
            $max_members = 2;
            $teams = array();
            $dir = 'myDir';
            if(file_exists($dir)) {
                chmod($dir,722);
                $fileR = fopen($dir.'/dict.csv','r');
                while(($list = fgetcsv($fileR))!==FALSE){
                    $team = $list[2];
                    if(array_key_exists($team,$teams)){
                        $teams[$team] = $teams[$team] + 1;
                    }else{
                        $teams[$team] = 1;
                    }
                }
                foreach ($teams as $team => $count) {
                    if($count<$max_members){
                        echo("<option>".$team."</option>");
                    }
                }
                fclose($fileR);
                chmod($dir,222);
            }
        ?>
        </div>
    </datalist>
    <input class="submit" type="submit" value="login" class="button" name="login">
    <input class="submit" type="submit" value="register" class="button" name="register">
</form>
</div>
</body>
</html>