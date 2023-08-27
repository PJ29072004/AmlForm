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
<form method="get" action="P.php" autocomplete='off' id="F">
    <input type="search" name="team" placeholder="team name" list="teams"><br>
    <input type="text" value="" placeholder="Password" name="Password"><br>

    <input type="text" value="" class="name" placeholder="name" name="name1" id="name1"> <input type="text" value="" class="email" placeholder="email" name="email1" id="email1"><br>
    <input type="text" value="" class="name" placeholder="name" name="name2" id="name2"> <input type="text" value="" class="email" placeholder="email" name="email2" id="email2"><br>
    <input type="text" value="" class="name" placeholder="name" name="name3" id="name3"> <input type="text" value="" class="email" placeholder="email" name="email3" id="email3"><br>
    <input type="text" value="" class="name" placeholder="name" name="name4" id="name4"> <input type="text" value="" class="email" placeholder="email" name="email4" id="email4"><br>
    <input type="text" value="" class="name" placeholder="name" name="name5" id="name5"> <input type="text" value="" class="email" placeholder="email" name="email5" id="email5"><br>

    <datalist id="teams">
        <div>
        <?php
            /*
            $max_members = 5;
            $teams = array();
            $dir = 'myDir';
            if(file_exists($dir)) {
                chmod($dir,722);
                $fileR = fopen($dir.'/dict.csv','r');
                while(($list = fgetcsv($fileR))!==FALSE){
                    $team = $list[0];
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
            */
        ?>
        </div>
    </datalist>
    <br>
    <input class="submit" type="submit" value="Edit team" class="button" name="edit" id="edit">
    <input class="submit" type="submit" value="register" class="button" name="register" id="register">
    <button id='b'></button>
</form>
<script src="appear.js"></script>
</div>
</body>
</html>
