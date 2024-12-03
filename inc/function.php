<?php
    require('connexion.php');
    require('elementChecker.php');
    function getFile($fieldName,$path) {
        $fichier = basename($_FILES[$fieldName]['name']);
        $taille_maxi = 10000000;
        $taille = filesize($_FILES[$fieldName]['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES[$fieldName]['name'], '.');

        if(!in_array($extension, $extensions))
        {
            $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc';
        }
        if($taille>$taille_maxi)
        {
            $erreur = 'Le fichier est trop gros...';
        }
        if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if(move_uploaded_file($_FILES[$fieldName]['tmp_name'], $path . $fichier)) //Si
            {
                echo 'Upload effectué avec succès !';
            }
            else //Sinon (la fonction renvoie FALSE).
            {
                echo 'Echec de l\'upload !';
            }
        }
        else
        {
            echo $erreur;
        }
    }



    // inscription
    function inscription($nom, $date_naissance, $genre, $mail, $pwd, $bd)
    {
        $new_pwd = sha1($pwd);
        $sql = "INSERT INTO user VALUES(null,'%s','%s','%s','%s','%s')";
        $sql = sprintf($sql, $nom, $date_naissance, $genre, $mail, $new_pwd);
        $query = mysqli_query($bd, $sql);
    }

    // check si un user existe dans la base de donne .... return true/false
    function logIn($mail, $pwd, $bd)
    {
        $new_pwd = sha1($pwd);
        $sql = "SELECT id_user FROM user WHERE mot_de_passe = '%s' AND mail = '%s' ";
        $sql = sprintf($sql, $new_pwd, $mail);
        $query = mysqli_query($bd, $sql);

        if (mysqli_num_rows($query) > 0) {
            return true;
        } else {
            return false;
        }
    }

    // return l'information complete d'un user aprés login
    function getUser_info($mail, $pwd, $bd)
    {
        $new_pwd = sha1($pwd);
        $sql = "SELECT id_user,Nom_user,date_naissance,genre,mail FROM user WHERE mot_de_passe = '%s' AND mail = '%s' ";
        $sql = sprintf($sql, $new_pwd, $mail);
        $query = mysqli_query($bd, $sql);
        $result = mysqli_fetch_assoc($query);

        return $result;
    }

    function isAdmin($mail, $pwd, $bd)
    {
        $new_pwd = sha1($pwd);
        $sql = "SELECT * FROM admin WHERE mot_de_passe = '%s' AND mail = '%s' ";
        $sql = sprintf($sql, $new_pwd, $mail);
        $query = mysqli_query($bd, $sql);

        if (mysqli_num_rows($query) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getInfo_Admin($mail, $pwd, $bd)
    {
        $new_pwd = sha1($pwd);
        $sql = "SELECT id_admin,Nom_admin,date_naissance,genre,mail FROM admin WHERE mot_de_passe = '%s' AND mail = '%s' ";
        $sql = sprintf($sql, $new_pwd, $mail);
        $query = mysqli_query($bd, $sql);

        return mysqli_fetch_assoc($query);
    }



    // ++++++ FIN LOG IN +++++++++


    // ++++ MODIFIER, SUPPRIMER, ADD ++++++
    // SERIE CARTE POKEMON
    function add_new_serie($nom_serie, $nom_image, $bd)
    {
        $sql = "INSERT INTO serie_carte_pokemon VALUES(null,'%s','%s')";
        $sql = sprintf($sql, $nom_serie, $nom_image);
        $query = mysqli_query($bd, $sql);
    }

    function remove_serie($id_serie, $bd)
    {
        $sql = "DELETE FROM serie_carte_pokemon WHERE id_serie = %d ";
        $sql = sprintf($sql, $id_serie);
        $query = mysqli_query($bd, $sql);
    }

    function modify_serie($id_serie, $Nom_serie, $nom_image, $bd)
    {
        $sql = "UPDATE serie_carte_pokemon SET Nom_serie = '%s', nom_image = '%s' WHERE id_serie = %d ";
        $sql = sprintf($sql, $Nom_serie, $id_serie);
        $query = mysqli_query($bd, $sql);
    }

    // STOCK
    function add_stock($id_carte, $qte, $date_ajout, $bd)
    {
        $sql = "INSERT INTO liste_stock_cartes VALUES(null,%d,%d,%s)";
        $sql = sprintf($sql, $id_carte, $qte, $date_ajout);
        $query = mysqli_query($bd, $sql);
    }

    function remove_stock($id_stock, $bd)
    {
        $sql = "DELETE FROM liste_stock_cartes WHERE id_stock = %d ";
        $sql = sprintf($sql, $id_stock);
        $query = mysqli_query($bd, $sql);
    }

    function modify_stock($id_serie, $id_carte, $quantite, $date_ajout, $bd)
    {
        $sql = "UPDATE liste_stock_cartes SET id_carte = %d, quantite = %d, date_ajout = %s WHERE id_serie = %d";
        $sql = sprintf($sql, $id_carte, $quantite, $date_ajout, $id_serie);
        $query = mysqli_query($bd, $sql);
    }

    // CARTE POKEMON
    function add_new_pokemon($Nom_pokemon, $prix, $id_serie, $bd)
    {
        $sql = "INSERT INTO carte_pokemon VALUES(null,'%s',%f,%d)";
        $sql = sprintf($sql, $Nom_pokemon, $prix, $id_serie);
        $query = mysqli_query($bd, $sql);
    }

    function remove_pokemon($id_carte, $bd)
    {
        $sql = "DELETE FROM carte_pokemon WHERE id_carte = %d ";
        $sql = sprintf($sql, $id_carte);
        $query = mysqli_query($bd, $sql);
    }

    function modify_carte_pokemon($id_carte, $Nom_pokemon, $prix, $id_serie, $bd)
    {
        $sql = "UPDATE carte_pokemon SET Nom_pokemon = %d, prix = %f , id_serie = %d WHERE id_carte = %d ";
        $sql = sprintf($sql, $Nom_pokemon, $prix, $id_serie, $id_carte);
        $query = mysqli_query($bd, $sql);
    }

    // get liste stock carte
    function getList_stock_carte($bd)
    {
        $sql = 'SELECT * FROM liste_stock_cartes WHERE quantite > 0';
        $query = mysqli_query($bd, $sql);

        $data = array();
        while (($result = mysqli_fetch_assoc($query)) != null) {
            $data[] = $result;
        }
        return $data;
    }

    // TOP 5 POKEMON PLUS CHER
    function getPokemon_plus_cher($bd, $limit)
    {
        $sql = 'SELECT * FROM carte_pokemon ORDER BY prix DESC LIMIT %d';
        $query = mysqli_query($bd, $limit);

        $data = array();
        while (($result = mysqli_fetch_assoc($query)) != null) {
            $data[] = $result;
        }
        return $data;
    }

    // Montant total des pokemon pour chaque utilisateur
    function getMontant_Total_user($bd)
    {
        $sql_v_user_carte = 'CREATE OR REPLACE VIEW v_user_carte AS 
            SELECT id_user,Nom_pokemon, prix, id_serie, quantite, date_obtention 
            FROM user_liste_cartes JOIN carte_pokemon ON user_liste_cartes.id_carte = carte_pokemon.id_carte';
        mysqli_query($bd, $sql_v_user_carte);

        $sql_prix = 'CREATE OR REPLACE VIEW v_prix_carte AS
            SELECT (prix * quantite) AS prix, id_user FROM v_user_carte';
        mysqli_query($bd, $sql_prix);

        $sql = 'SELECT id_user,SUM(prix) as somme FROM v_prix_carte GROUP BY id_user';
        $query = mysqli_query($bd, $sql);

        $data = array();
        while (($result = mysqli_fetch_assoc($query)) != null) {
            $data[] = $result;
        }
        return $data;
    }

    function get_estimation_carte($id_user,$bd) {
        $listeEstimation = getMontant_Total_user($bd);
        for ($i = 0; $i < count($listeEstimation); $i++) {
            if ($listeEstimation[$i]['id_user'] == $id_user) {
                return $listeEstimation[$i]['somme'];
            }
        }

        return 0;
    }

//    function
    function get_solde($id_user) {

    }

    // get liste des serie;
    function getListe_serie($bd)
    {
        $sql = 'SELECT * FROM serie_carte_pokemon';
        $query = mysqli_query($bd, $sql);

        $data = array();
        while (($result = mysqli_fetch_assoc($query)) != null) {
            $data[] = $result;
        }
        return $data;
    }

    // get la liste de 4 plus recent dans le stock
    function get4_recent($bd)
    {
        $sql = 'SELECT * FROM liste_stock_cartes ORDER BY date_ajout DESC limit 4';
        $query = mysqli_query($bd, $sql);

        $data = array();
        while (($result = mysqli_fetch_assoc($query)) != null) {
            $data[] = $result;
        }
        return $data;
    }


    // RECHERCHE
function search($serie, $nom, $prix_min, $prix_max, $bd){
    $sql_v_serie = 'CREATE OR REPLACE VIEW v_curr_serie AS
        SELECT id_serie,Nom_serie,nom_image FROM serie_carte_pokemon 
        WHERE id_serie NOT IN (SELECT id_serie FROM serie_carte_pokemon_supprime)';
    $query = mysqli_query($bd,$sql_v_serie);

    $sql_view = 'CREATE OR REPLACE VIEW v_carte_pokemon AS
        SELECT id_carte,Nom_pokemon,prix,nom_image_pokemon, carte_pokemon.id_serie, Nom_serie, nom_image
        FROM  carte_pokemon JOIN v_curr_serie ON v_curr_serie.id_serie = carte_pokemon.id_serie';
    mysqli_query($bd,$sql_view);

    $sql = 'SELECT * FROM v_carte_pokemon WHERE 1 > 0 ';
    $is_empty = true;



    if (!empty($serie) and $serie != 'Toutes') {
        $sql.= "AND Nom_serie = '%s' ";
        $sql = sprintf($sql, $serie);
    }
    if (!empty($nom)) {
        $nom = '%'.$nom.'%';
        $sql.= " AND Nom_pokemon LIKE '$nom' ";
    }
    if (!empty($prix_min)) {
        $sql.= " AND prix >= $prix_min ";
    }
    if (!empty($prix_max)) {
        $sql.= " AND prix <= $prix_max ";
    }

    if (empty($serie) && !empty($nom)) {
        $nom = '%'.$nom.'%';
        $sql.= " Nom_pokemon LIKE '$nom' ";

        if (!empty($prix_min)) {
            $sql.= " AND prix >= $prix_min ";
        }
        if (!empty($prix_max)) {
            $sql.= " AND prix <= $prix_max ";
        }
    } else if(empty($serie) && empty($nom) && !empty($prix_min)){
        $sql.= " prix >= $prix_min ";

        if (!empty($prix_max)) {
            $sql.= " AND prix <= $prix_max ";
        }
    } else if(empty($serie) && empty($nom) && empty($prix_min)){
        $sql.= " prix <= $prix_max ";
    }

//    echo $sql;
    $query = mysqli_query($bd,$sql);

    $data = array();

    while (($result = mysqli_fetch_assoc($query)) != null) {
        $data[] = $result;
    }
//    var_dump($data);
    return $data;
}
    function search_by_serie($nom_serie,$bd){
        $sql_view = 'CREATE OR REPLACE VIEW v_carte_pokemon AS
            SELECT id_carte,Nom_pokemon,prix,nom_image_pokemon, carte_pokemon.id_serie, Nom_serie, nom_image
            FROM  carte_pokemon JOIN serie_carte_pokemon 
            ON serie_carte_pokemon.id_serie = carte_pokemon.id_serie';
        mysqli_query($bd,$sql_view);

        $sql = 'SELECT * FROM v_carte_pokemon WHERE Nom_serie LIKE %s ';
        $sql = sprintf($sql,'%'.$nom_serie.'%');
        $query = mysqli_query($bd,$sql);

        $data = array();
        while (($result = mysqli_fetch_assoc($query) )!= null) {
            $data[] = $result;
        }
        return $data;
    }
    function search_by_nom_pokemon($nom_pokemon,$bd){
        $sql_view = 'CREATE OR REPLACE VIEW v_carte_pokemon AS
            SELECT id_carte,Nom_pokemon,prix,nom_image_pokemon, carte_pokemon.id_serie, Nom_serie, nom_image
            FROM  carte_pokemon JOIN serie_carte_pokemon 
            ON serie_carte_pokemon.id_serie = carte_pokemon.id_serie';
        mysqli_query($bd,$sql_view);

        $sql = 'SELECT * FROM v_carte_pokemon WHERE Nom_pokemon LIKE %s';
        $sql = sprintf($sql,'%'.$nom_pokemon.'%');
        $query = mysqli_query($bd,$sql);

        $data = array();
        while (($result = mysqli_fetch_assoc($query) )!= null) {
            $data[] = $result;
        }
        return $data;
    }
    function search_by_min_price($prix_min,$bd){
        $sql_view = 'CREATE OR REPLACE VIEW v_carte_pokemon AS
            SELECT id_carte,Nom_pokemon,prix,nom_image_pokemon, carte_pokemon.id_serie, Nom_serie, nom_image
            FROM  carte_pokemon JOIN serie_carte_pokemon 
            ON serie_carte_pokemon.id_serie = carte_pokemon.id_serie';
        mysqli_query($bd,$sql_view);

        $sql = 'SELECT * FROM v_carte_pokemon WHERE prix >= %d ';
        $sql = sprintf($sql,);
        $query = mysqli_query($bd,$prix_min);

        $data = array();
        while (($result = mysqli_fetch_assoc($query) )!= null) {
            $data[] = $result;
        }
        return $data;
    }
    function search_by_max_price($prix_max,$bd){
        $sql_view = 'CREATE OR REPLACE VIEW v_carte_pokemon AS
            SELECT id_carte,Nom_pokemon,prix,nom_image_pokemon, carte_pokemon.id_serie, Nom_serie, nom_image
            FROM  carte_pokemon JOIN serie_carte_pokemon 
            ON serie_carte_pokemon.id_serie = carte_pokemon.id_serie';
        mysqli_query($bd,$sql_view);

        $sql = 'SELECT * FROM v_carte_pokemon WHERE prix <= %d ';
        $sql = sprintf($sql,);
        $query = mysqli_query($bd,$prix_max);

        $data = array();
        while (($result = mysqli_fetch_assoc($query) )!= null) {
            $data[] = $result;
        }
        return $data;
    }
    // ++++ ++++++ FIN RSEARCH +++ +++++


    // ADD MONEY DANS LE PANIER DE L'USER
    function add_money_chart($money,$id_user,$bd){
        $sql = "INSERT INTO porte_monnaie VALUES(%d, %d,DEFAULT,null)";
        $sql = sprintf($sql,$id_user,$money);
        $query = mysqli_query($bd,$sql);
    }

    // +++ ++++ +++ +++

    // function retourn liste carte pokemon d'un user donné
    function getUser_cartes($id_user,$bd){
        $sql_v_user_carte = 'CREATE OR REPLACE VIEW v_carte AS 
            SELECT carte_pokemon.id_carte,id_user, Nom_pokemon, prix, nom_image_pokemon, carte_pokemon.id_serie AS cp_id_serie,quantite, date_obtention 
            FROM user_liste_cartes JOIN carte_pokemon ON user_liste_cartes.id_carte = carte_pokemon.id_carte';
        mysqli_query($bd,$sql_v_user_carte);

        $sql_user_carte = 'CREATE OR REPLACE VIEW v_user_carte AS 
            SELECT id_carte,id_user, Nom_pokemon, prix, nom_image_pokemon,cp_id_serie,Nom_serie,nom_image, quantite, date_obtention 
            FROM v_carte JOIN serie_carte_pokemon ON cp_id_serie = serie_carte_pokemon.id_serie';
        mysqli_query($bd,$sql_user_carte);

        $sql = 'SELECT * FROM v_user_carte WHERE id_user = %d ';
        $sql = sprintf($sql,$id_user);
        $query = mysqli_query($bd,$sql);

        $data = array();
        while (($result = mysqli_fetch_assoc($query) )!= null) {
            $data[] = $result;
        }
        return $data;
    }


//    -- MARKETPLACE

    function sorted_desc_by_price($bd){
        $sql_view = 'CREATE OR REPLACE VIEW v_carte_pokemon AS
            SELECT id_carte,Nom_pokemon,prix,nom_image_pokemon, carte_pokemon.id_serie, Nom_serie, nom_image
            FROM  carte_pokemon JOIN serie_carte_pokemon 
            ON serie_carte_pokemon.id_serie = carte_pokemon.id_serie';
        mysqli_query($bd,$sql_view);

        $sql_stock = 'CREATE OR REPLACE VIEW v_stock AS
            SELECT id_stock, v_carte_pokemon.id_carte, Nom_pokemon, prix, nom_image_pokemon, quantite, v_carte_pokemon.id_serie, Nom_serie, nom_image, date_ajout
            FROM  v_carte_pokemon JOIN liste_stock_cartes ON liste_stock_cartes.id_carte = v_carte_pokemon.id_carte';
        mysqli_query($bd,$sql_stock);

        $sql = 'SELECT * FROM v_stock ORDER BY prix DESC';
        $query = mysqli_query($bd, $sql);
        $data = array();

        while (($result = mysqli_fetch_assoc($query)) != null) {
            $data[] = $result;
        }
        return $data;
    }
    function sorted_desc_by_date($bd){
        $sql_view = 'CREATE OR REPLACE VIEW v_carte_pokemon AS
            SELECT id_carte,Nom_pokemon,prix,nom_image_pokemon, carte_pokemon.id_serie, Nom_serie, nom_image
            FROM  carte_pokemon JOIN serie_carte_pokemon 
            ON serie_carte_pokemon.id_serie = carte_pokemon.id_serie';
        mysqli_query($bd,$sql_view);

        $sql_stock = 'CREATE OR REPLACE VIEW v_stock AS
            SELECT id_stock, v_carte_pokemon.id_carte, Nom_pokemon, prix, nom_image_pokemon, quantite, v_carte_pokemon.id_serie, Nom_serie, nom_image, date_ajout
            FROM  v_carte_pokemon JOIN liste_stock_cartes ON liste_stock_cartes.id_carte = v_carte_pokemon.id_carte';
        mysqli_query($bd,$sql_stock);

        $sql = 'SELECT * FROM v_stock ORDER BY date_ajout DESC';
        $query = mysqli_query($bd, $sql);
        $data = array();

        while (($result = mysqli_fetch_assoc($query)) != null) {
            $data[] = $result;
        }
        return $data;
    }
    function sorted_asc_by_name($bd){
        $sql_view = 'CREATE OR REPLACE VIEW v_carte_pokemon AS
            SELECT id_carte,Nom_pokemon,prix,nom_image_pokemon, carte_pokemon.id_serie, Nom_serie, nom_image
            FROM  carte_pokemon JOIN serie_carte_pokemon 
            ON serie_carte_pokemon.id_serie = carte_pokemon.id_serie';
        mysqli_query($bd,$sql_view);

        $sql_stock = 'CREATE OR REPLACE VIEW v_stock AS
            SELECT id_stock, v_carte_pokemon.id_carte, Nom_pokemon, prix, nom_image_pokemon, quantite, v_carte_pokemon.id_serie, Nom_serie, nom_image, date_ajout
            FROM  v_carte_pokemon JOIN liste_stock_cartes ON liste_stock_cartes.id_carte = v_carte_pokemon.id_carte';
        mysqli_query($bd,$sql_stock);

        $sql = 'SELECT * FROM v_stock ORDER BY Nom_pokemon ASC';
        $query = mysqli_query($bd, $sql);
        $data = array();

        while (($result = mysqli_fetch_assoc($query)) != null) {
            $data[] = $result;
        }
        return $data;
    }


    function getPokemon_aleatoire($bd){
        $count = 'SELECT count(*) FROM carte_pokemon';
        $query = mysqli_query($bd,$count);
        $max = mysqli_fetch_assoc($query);
        $data = array();

        for ($i=0; $i < 5; $i++) {
            $id = rand(0,$max['count(*)']);
            $sql = 'SELECT * FROM carte_pokemon WHERE id_carte = %d ';
            $sql = sprintf($sql,$id);
            $query2 = mysqli_query($bd,$sql);
            $data[] = mysqli_fetch_assoc($query2);
        }
        return $data;
    }

    // get carte pokemon par id
    function getCarte_pokemon_by_id($id_carte,$bd){
        $sql_view = 'CREATE OR REPLACE VIEW v_carte_pokemon AS
            SELECT id_carte,Nom_pokemon,prix,nom_image_pokemon, carte_pokemon.id_serie, Nom_serie, nom_image
            FROM  carte_pokemon JOIN serie_carte_pokemon 
            ON serie_carte_pokemon.id_serie = carte_pokemon.id_serie';
        mysqli_query($bd,$sql_view);

        $sql = 'SELECT * FROM v_carte_pokemon WHERE id_carte = %d ';
        $sql = sprintf($sql,$id_carte);
        $query = mysqli_query($bd,$sql);

        return mysqli_fetch_assoc($query);
    }

    // get suggestion selon le serie
    function get_suggestion($idCarte, $bd) {
        $carte = getCarte_pokemon_by_id($idCarte, $bd);
        $sql = "select * from carte_pokemon where id_serie=".$carte['id_serie']." limit 4";
        $data = mysqli_query($bd,$sql);
        $rep = [];

        while (($donnee = mysqli_fetch_assoc($data)) != null){
            $rep[] = $donnee;
        }

        return $rep;
    }

    function get_list_stock_by_idCarte($bd, $id) {
        $listStock = getList_stock_carte($bd);
        for ($i = 0; $i < count($listStock) ; $i++) {
            if ($listStock[$i]['id_carte'] == $id) {
                return $i;
            }
        }

        return -1;
    }

    function getAge( $id,$bd) {
        $sql = "select year(date_naissance) as annee from user where id_user=".$id;
        $data = mysqli_query($bd,$sql);
        $donnee = mysqli_fetch_assoc($data);
        return date('Y') - $donnee['annee'];
    }

    function sommer($tab,$nomColonne) {
        $somme = 0;
        for ($i = 0; $i < count($tab); $i++) {
            $somme += $tab[$i][$nomColonne];
        }

        return $somme;
    }

    // solde user
    function getSold_user($id_user,$db){
        $sql = 'SELECT SUM(montant) as somme FROM porte_monnaie WHERE id_user = %d AND date_acceptation IS NOT NULL';
        $sql = sprintf($sql,$id_user);
        $query = mysqli_query($db,$sql);

        return mysqli_fetch_assoc($query);
    }

    // vendre un pokemon
    function sell_pokemon($id_carte,$id_vendeur,$prix,$qte_a_vendre,$bd){
        $sql = "INSERT INTO carte_a_vendre_user VALUES(null,%d, %d, null,null,%f,%d,null)";
        $sql = sprintf($sql,$id_carte,$id_vendeur,$prix,$qte_a_vendre);
        $query = mysqli_query($bd,$sql);
    }
    // list de tous les pokemon à vendre
    function getList_pokemon_a_vendre($bd){
        $sql = 'SELECT * FROM carte_a_vendre_user WHERE qte_a_vendre > qte_vendu';
        $query = mysqli_query($bd,$sql);

        $data = array();
        while (($result = mysqli_fetch_assoc($query) )!= null) {
            $data[] = $result;
        }
        return $data;
    }

    function exist($bd, $email){
        $sql = "SELECT * FROM user WHERE mail = '%s' ";
        $sql = sprintf($sql, $email);
        $query = mysqli_query($bd, $sql);
        if (mysqli_num_rows($query) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function parrainage($bd, $email){
        $sql = "UPDATE porte_monnaie SET montant = montant + (montant * 0.1) WHERE id_user =(SELECT id_user FROM user WHERE mail = '%s')";
        $sql = sprintf($sql, $email);
        $query = mysqli_query(logBd(), $sql);
    }

    function acheterCarte($idUser, $idCarte) {
        $bd = logBd();
        $carte = getCarte_pokemon_by_id($idCarte, $bd);
        $prix = (-1)*$carte['prix'];

//        $sql = "INSERT INTO user_liste_cartes VALUES(null,%d, %d, null,null,%f,%d,null)";
//        $sql = sprintf($sql,$id_carte,$id_vendeur,$prix,$qte_a_vendre);
//        $query = mysqli_query($bd,$sql);

        $sql = "INSERT INTO porte_monnaie(id_user, montant, date_demande, date_acceptation) VALUES(%d, %d, current_date, current_date)";
        $sql = sprintf($sql,$idUser,$prix);
        $query = mysqli_query($bd,$sql);

    }

?>