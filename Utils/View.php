<?php
class View {

    public function __construct($action) {
        $this->fichier = "../Views/" . $action . "View.php";
        if (!file_exists($this->fichier)) {
            $this->fichier = "../Views/admin/" . $action . "View.php";
        }
        $this->titre= null;
    }

    // Génère et affiche la vue
    public function generer($donnees) {
        $announcements = new Announcements();
        $list_announcements = $announcements->getAll();
        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererFichier('../Views/template.php',
            array('titre' => $this->titre, 'contenu' => $contenu, 'list_announcements' => $list_announcements));
        // Renvoi de la vue au navigateur
        echo $vue;
    }

    public function genererAdmin($donnees) {
        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererFichier('../Views/admin/admin_template.php',
            array('titre' => $this->titre, 'contenu' => $contenu));
        // Renvoi de la vue au navigateur
        echo $vue;
    }

    // Génère un fichier vue et renvoie le résultat produit
    private function genererFichier($fichier, $donnees) {
        if (file_exists($fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            if (!empty($donnees)) {
                extract($donnees);
            }
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $fichier;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }
}
