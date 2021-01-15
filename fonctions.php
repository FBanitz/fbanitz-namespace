<?php
    /*
        - créer un namespace (première lettre du prénom + nom | ex.: dhurtrel)
        - créer une fonction checkPassword permettant de vérifier la composition d'un mot de passe :
            - 8 caractères
            - 1 caractère spécial
            - 1 minuscule
            - 1 majuscule
            - 1 chiffre
        - afficher un message 
    */
    namespace fbanitz;
    


    function checkmaj($string){
        return(bool) preg_match('/[A-Z]/', $string);
    }

    function checkmin($string){
        return(bool) preg_match('/[a-z]/', $string);
    }    

    function checknum($string){
        return(bool) preg_match('/[1-9]/', $string);
    }

    function checkspe($string){
        return(bool) preg_match('/[\'^£$%&*()}{@#~?<>,|=_+-]/', $string);
    }

    function checklon($string){
        return(string) strlen($string);
    }

    function checkPassword($string){
        $maj = checkmaj($string);
        $min = checkmin($string);
        $num = checknum($string);
        $spe = checkspe($string);
        $lon = checklon($string);
        $minlon = 8; //longeur minimale

        if($maj == true && $min == true && $num == true && $spe == true && $lon >= $minlon){
            echo "<h3>Mot de passe enregistré !</h3>";
        }
        else{
            echo "<h3>Votre mot de passe n'est pas correct :</h3>";

            if ($maj == false){
                echo '<p>Il manque une majuscule</p>';
            }

            if ($min == false){
                echo '<p>Il manque une minuscule</p>';
            }

            if ($num == false){
                echo '<p>Il manque un chiffre</p>';
            }

            if ($spe == false){
                echo '<p>Il manque un caractère spécial</p>';
            }

            if ($lon < $minlon){
                echo '<p>Votre mot de passe fait moins de '.$minlon.' caractères</p>';
            }
        }
    }



?>