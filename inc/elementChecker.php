<?php
    function checker_email($email) {
        $rep = strpos($email,"@");
        if ($rep == null) {
            return false;
        }
        else {
            $minuscule = strtolower($email);
            if ($minuscule != $email) {
                return false;
            }
        }

        return true;
    }

    function checker_date($date) {
        $tabDate = explode('/',$date);
        if (count($tabDate) != 3) {
            return false;
        }
        else{
            if ($tabDate[0] > 32 || $tabDate[1] > 13) {
                return false;
            }
        }

        return true;
    }

    function checker_vide($element) {
        if ($element == '') {
            return true;
        }
        return false;
    }

    function checker_genre($genre) {
        $listGenre = ['Homme','Femme'];
        for ($i = 0; $i <count($listGenre) ; $i++) {
            if ($listGenre[$i] == $genre ) {
                return true;
            }
        }

        return false;
    }

    // FUNCTION POUR LA PAGE LOGIN USER
    function checkAge($age)
    {
        $date = explode('-', $age);
        $year = $date[0];
        $curr_date = date('Y');
        if ($curr_date - $year >= 12) {
            return true;
        }
        return false;
    }

    function is_email_valid($mail)
    {
        return filter_var($mail, FILTER_VALIDATE_EMAIL);
    }

    function erreur_finder($erreur) {
    //    $typeErreur = ['']
    }

//    -- PAGE : RECHERCHE

    function checker_serie($bd, $element) {
        $sql = 'SELECT * FROM serie_carte_pokemon';
        $query = mysqli_query($bd, $sql);

        $data = array();
        while (($result = mysqli_fetch_assoc($query)) != null) {
            $data[] = $result;
        }

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i] == $element) {
                return true;
            }
        }

        return false;
    }

    function among($tab, $element) {
        for ($i = 0; $i < count($tab); $i++) {
            if ($element == $tab[$i]) {
                return true;
            }
        }

        return false;
    }

?>