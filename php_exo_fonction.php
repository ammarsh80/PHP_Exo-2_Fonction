<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Exo 2 - Fonction</title>
</head>

<body>
    <main>
        <?php
        function coucou($name = "Maxime")
        {
            echo "Hey $name!\n";
        }
        coucou();
        echo "<br>";
        coucou("Morgan");
        echo "<br>";
        coucou("Enzo");
        echo "<hr>";


        // affiche la somme de deux nombres. Les deux nombres sont donnés en paramètre.
        /**
         * Undocumented function
         *
         * @param integer $a nombr  int
         * @param integer $b nombr  int
         * @return void adition les deux nombres 
         */
        function addition1(int $a, int $b)
        {
            return $a + $b;
        }
        echo addition1(10, 15);
        echo "<hr>";
        ?>
        <!-- affiche la date d’aujourd’hui, dans une phrase “Aujourd’hui, nous sommes le …”. La date est en gras.  -->
        <p>Aujourd’hui, nous sommes le: <?php $date = date('d-m-y h:i:s');
                                        echo "<b>" . $date . "</b>"; ?></p>
        <hr>

        <!-- affiche le prix TTC. Le prix HT et le taux sont donné en paramètre. Si le taux n’est pas renseigné il vaut  20% -->
        <?php
        $taux = 0.20;
        /**
         * Undocumented function
         *
         * @param float $HT prix hors taxe
         * @param float $taux taux de taxe
         * @return void prix avec taxe TTC
         */
        function tva(float $HT, float $taux)
        {
            return $HT + ($HT * $taux);
        }

        ?>
        <p>Le prix TTC est : <?php echo "<b>" . tva(100, 0.055) . "</b>"; ?> €</p>
        <hr>
        <p>Le prix TTC est : <?php echo "<b>" . tva(100, $taux) . "</b>"; ?> €</p>
        <hr>

        <!-- affiche l'âge d’une personne. La date de naissance est donnée en paramètre. -->
        <?php
        $dateToday = date('Y');


        function age($dateToday, $naissance)
        {
            return $dateToday - $naissance;
        }

        echo age($dateToday, 1985);
        echo "<hr>";

        $dateNaissance = "12-08-1985";
        $aujourdhui = date("Y-m-d");
        $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
        echo 'Votre age est ' . $diff->format('%y');
        ?>


        <?php

        function timeDiff($firstTime, $lastTime)
        {
            // convert to unix timestamps
            $firstTime = strtotime($firstTime);
            $lastTime = strtotime($lastTime);

            // perform subtraction to get the difference (in seconds) between times
            $timeDiff = $lastTime - $firstTime;

            // return the difference
            return $timeDiff;
        }

        //Usage :
        $difference = timeDiff("1988-12-04 19:00:05", date("Y-m-d H:i:s"));
        $years = abs(floor($difference / 31536000));
        $days = abs(floor(($difference - ($years * 31536000)) / 86400));
        $hours = abs(floor(($difference - ($years * 31536000) - ($days * 86400)) / 3600));
        $mins = abs(floor(($difference - ($years * 31536000) - ($days * 86400) - ($hours * 3600)) / 60)); #floor($difference / 60);
        echo "<p>Time Passed: " . $years . " Years, " . $days . " Days, " . $hours . " Hours, " . $mins . " Minutes.</p>";
        ?>
        <hr>
        <!-- afficher le nombre de minutes avant la fin du cours. -->
        <span>le nombre de heures, minutes et secondes avant la fin du cours:</span>
        <?php $restFinCours = timeDiff(date('h:i:s'), ("17:00:00"));
        $restheure = abs(floor(($restFinCours / 3600)));
        $restMinutes = abs(floor(($restFinCours - ($restheure*3600))/60));
        $restSecondes = abs(floor(($restFinCours - ($restheure*3600)-($restMinutes*60))));
        // $restSecondes = abs(floor(($restFinCours - ($restMinutes * 60))));

        echo "<b>". $restheure." Heures et " . $restMinutes . " Minutes et " . $restSecondes . " Secondes " . "</b>"; 
       ?>
        <hr>

        <!-- affiche le nombre de jours avant le week-end. -->
        <span>le nombre de jours avant le week-end: </span>
        <?php $restJoursWeek = timeDiff(date('Y-m-d h:i:s'), ("2023-01-06 17:00:00"));
        $restJours = abs(floor(($restJoursWeek / 86400)));
        $restH = abs(floor(($restJoursWeek - ($restJours * 86400)) / 3600));
        $restM = abs(floor(($restJoursWeek - ($restJours * 86400) - ($restH * 3600)) / 60));
        $restS = abs(floor(($restJoursWeek - ($restJours * 86400) - ($restH * 3600) - ($restM * 60))));
        echo "<b>" . $restJours . " jours et " . $restH . " heures " . $restM . " minutes " . $restS . " secondes " . "</b>"; ?>
        <!-- Pour chaque fonction, créer au moins trois appels de fonctions différents pour tester la fonction -->
        <hr>
        <?php
        // Fonction avec un retour, pour afficher le résultat, il faut utiliser “echo”
        function returnCoucou($name = "Maxime")
        {
            return "Hey $name!\n";
        }
        returnCoucou();
        echo returnCoucou("Pauline");
        echo "<h1>" . returnCoucou() . "</h1>";
        echo "<p>Et le voisin lui répondit : " . returnCoucou("Kevin")."</p>";
        echo '<p>Et le voisin lui répondit : "' . returnCoucou("Kevin").'"</p>';
        ?>
        <hr>
        <!-- Exercice : Sur le même principe, créez une fonction avec un retour qui : -->
        <!-- supprimer les espaces contenus dans une phrase. La phrase est donnée en paramètre. -->

        <?php
        $phrase = "Bonjour, comment allez-vous ?";
        echo str_replace(' ', '', $phrase);
        ?>
        <hr>
        <!-- donne le signe astrologique d’une personne. La date anniversaire est donnée en paramètre. -->
        <?php
        function signe_astrologique($date_anniversaire)
        {
            $mois = date('m', strtotime($date_anniversaire));
            $jour = date('d', strtotime($date_anniversaire));

            switch ($mois) {
                case 1:
                    $signe = ($jour <= 20) ? 'Capricorne' : 'Verseau';
                    break;
                case 2:
                    $signe = ($jour <= 19) ? 'Verseau' : 'Poisson';
                    break;
                case 3:
                    $signe = ($jour <= 20) ? 'Poisson' : 'Bélier';
                    break;
                case 4:
                    $signe = ($jour <= 20) ? 'Bélier' : 'Taureau';
                    break;
                case 5:
                    $signe = ($jour <= 21) ? 'Taureau' : 'Gémeaux';
                    break;
                case 6:
                    $signe = ($jour <= 21) ? 'Gémeaux' : 'Cancer';
                    break;
                case 7:
                    $signe = ($jour <= 22) ? 'Cancer' : 'Lion';
                    break;
                case 8:
                    $signe = ($jour <= 21) ? 'Lion' : 'Vierge';
                    break;
                case 9:
                    $signe = ($jour <= 23) ? 'Vierge' : 'Balance';
                    break;
                case 10:
                    $signe = ($jour <= 23) ? 'Balance' : 'Scorpion';
                    break;
                case 11:
                    $signe = ($jour <= 22) ? 'Scorpion' : 'Sagittaire';
                    break;
                case 12:
                    $signe = ($jour <= 22) ? 'Sagittaire' : 'Capricorne';
                    break;
                default:
                    break;
            }

            return $signe;
        }
        echo signe_astrologique('12-08-1985');
        ?>
<hr>
<!-- donne le plus grand nombre entre deux expressions numérique. -->
<?php
function plus_grand($a, $b)
{
  if ($a > $b) {
    return $a;
  } else {
    return $b;
  }
}
echo plus_grand(13, 2);
echo "<hr>";
echo plus_grand(19, -20);
echo "<hr>";
echo plus_grand(-10, -50);
?>
<hr>
<!-- retourne vrai si le nombre est pair. Faux sinon. Le nombre est donné en paramètre. -->
<?php
function estPair($nombre) {
    if($nombre % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

echo estPair(5) ?  'Vrai' :  'Faux';
echo "<hr>";
echo estPair(122) ?  'Vrai' : 'Faux'; 
echo "<hr>";
echo estPair(19) ?  'Vrai' :  'Faux';
?>
<hr>


</main>
</body>

</html>