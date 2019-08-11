<?php
    function view_menu() {

        $tab_link_menu = array("index", "chapitres", "contact", "profil");
        $tab_text_menu = array("Accueil", "Chapitres", "Contact", "Connexion");

        if ($_SESSION['id'] != 0) {
            $tab_link_menu = array("index", "chapitres", "contact", "profil");
            $tab_text_menu = array("Accueil", "Chapitres", "Contact", "Profil");

            if($_SESSION['admin'] == true) {
                $tab_link_menu = array("index", "chapitres", "contact", "profil", "administration");
                $tab_text_menu = array("Accueil", "Chapitres", "Contact", "Profil", "Administration");
            }
        }

        $info = pathinfo($_SERVER['PHP_SELF']);

        $menu = "\n<div id=\"menu\">\n      <ul id=\"tabs\">\n";
        
            //boucle sur les deux tableaux
            foreach($tab_link_menu as $cle=>$link) {
                $menu .="<li";

                    if($info['basename'] == $link)
                        $menu .="class=\"active\"";

                    $menu .= "><a href=\"" . $_POST['URL_PATH'] . $link . "\">" . $tab_text_menu[$cle] . "</a></li>\n";
            }
        
            $menu .= "</ul>\n</div>";

            return $menu;
    }
?>