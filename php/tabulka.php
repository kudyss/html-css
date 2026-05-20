<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Tabulka v PHP</title>
</head>
<body>

    <table border="1" style="border-collapse: collapse; text-align: center; font-family: Arial, sans-serif; font-weight: bold;">
        <?php
        $cislo = 1;
        $sloupce = 13;
        $radky = 8;

        for ($r = 0; $r < $radky; $r++) {
            echo "<tr>";
            for ($s = 0; $s < $sloupce; $s++) {
                
                // Pokud jsme už vypsali čísla do 100
                if ($cislo <= 100) {
                    
                    // Logika barev: liché (černá), sudé (zelená)
                    if ($cislo % 2 !== 0) {
                        $bg = "black";
                        $color = "#00FF00";
                    } else {
                        $bg = "#00FF00";
                        $color = "black";
                    }

                    echo "<td style='width: 40px; height: 40px; background-color: $bg; color: $color;'>";
                    echo $cislo;
                    echo "</td>";
                } else {
                    // Buňky nad 100 (do počtu 104, aby seděla tabulka 13x8)
                    echo "<td style='width: 40px; height: 40px;'></td>";
                }
                
                $cislo++;
            }
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>