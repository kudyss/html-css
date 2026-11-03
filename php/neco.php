<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<form method='post'>";
    echo "<div>";
    echo "zadej počet vstupů:";
    echo "<input min='0' max='20' type='number' name='visit'>";
    echo "<button type= 'submit'>OK</button>";
    echo "</div>";
    echo "<hr>";

    if(isset($_POST["visit"])){
        $pocet = $_POST["visit"];
        echo "<form method='post'>";
        
        for($i = 0; $i < $pocet; $i++){ 
            echo "<input type='number' name='pole[]' value=''><br>";
        }
        echo "<button type='submit' name='odeslat'>Vyhodnotit</button>";
        echo "</form>";
    }

    if(isset($_POST['pole']) && isset($_POST['odeslat'])){
        $min = min($_POST['pole']);
        $max = max($_POST['pole']);
        $licha = 0;
        $suda = 0;
        $sum = 0;
        echo "<hr>";
        echo "zadané hodnoty: ";
        
        for($i = 0; $i < count($_POST['pole']); $i++){
            if($_POST['pole'][$i] % 2 == 0) $suda++;
            else $licha++;
            $sum += $_POST['pole'][$i];
            echo $_POST['pole'][$i] . " ";
        }
        
        $prumer = round(($sum / count($_POST['pole'])), 1);
        
        echo "<br>Nejmenší číslo: $min";
        echo "<br>Největší číslo: $max";
        echo "<br>Průměr: $prumer";
    }
    ?>
</body>
</html>