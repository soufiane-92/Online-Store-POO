<?php
include './utils/functions.php';
class DashboardController extends Controller
{
    public function index()
    {
        $isIdentified = $_SESSION['auth'] ?? false;
        if (!$isIdentified) {
            return header('location:home');
        }
        if (isset($_POST) && !empty($_POST)) {

            foreach ($_POST as $key => $action) {
                if (isset($_POST[$key])) {
                    if (method_exists(DashboardController::class, $key)) {
                        return $this->$key();
                    }
                }
            }

        }
        $this->getModel('Client');
        $this->getModel('Categorie');
        $this->getModel('Produit');

        $Clients = $this->Client->getAll();
        $Categories = $this->Categorie->getAll();
        $Produits = $this->Produit->getAll();

        $arrayOfData['Clients'] = $Clients;
        $arrayOfData['Categories'] = $Categories;
        $arrayOfData['Produits'] = $Produits;

        $this->getViewDash('dashboard', $arrayOfData);
    }
    public function ajouter()
    {
        $this->getModel('Categorie');
        $Categories = $this->Categorie->getAll();
        $arrayOfData['Categories'] = $Categories;
        $this->getViewDash('dashboardAjouter', $arrayOfData);

    }
    public function modifierClient()
    {

        $idCLient = $_POST['modifierClient'];
        $this->getModel('Client');
        $client = $this->Client->getOne('id', $idCLient);

        $this->getViewDash('dashModifieClient', $client);
    }
    public function validateModifClient()
    {
        // get the client first
        // On instancie le model "Client"
        $idCLient = $_POST['validateModifClient'];
        $this->getModel('Client');
        $client = $this->Client->getOne('id', $idCLient);

        $erreurs = array();
        $name = isset($_POST['nom']) ? secureData($_POST['nom'], "text") : null;
        $firstName = isset($_POST['prenom']) ? secureData($_POST['prenom'], "text") : null;
        $email = isset($_POST['email']) ? secureData($_POST['email'], "text") : null;
        $adresse = isset($_POST['adresse']) ? secureData($_POST['adresse'], "text") : null;
        $ville = isset($_POST['ville']) ? secureData($_POST['ville'], "text") : null;
        $codePostal = isset($_POST['codePostal']) ? secureData($_POST['codePostal'], "text") : null;

        if (!isset($name) || empty($name)) {
            array_push($erreurs, "Champ Nom obligatoire.");
        }

        if (!isset($firstName) || empty($firstName)) {
            array_push($erreurs, "Champ Prénom obligatoire.");
        }

        if (!isset($email) || empty($email)) {
            array_push($erreurs, "Champ Email obligatoire.");
        } else {
            if (!valid_email($email)) {
                array_push($erreurs, "Format d'Email invalide");
            }
        }

        if (count($erreurs) > 0) {
            Session::set("flash", $erreurs);
            $this->getViewDash('dashModifieClient', $client);
            exit();

        } else {
            if (!isTheSameValue($client['email'], $email)) {
                $clientEmailFound = $this->Client->getOne("email", $email);
                if ($clientEmailFound) {
                    array_push($erreurs, "Cette email existe déjà.");
                    if (count($erreurs) > 0) {
                        Session::set("flash", $erreurs);
                        $this->getViewDash('dashModifieClient', $clientEmailFound);
                        exit();
                    }
                } else {
                    $data = array(
                        'nom' => $name,
                        'prenom' => $firstName,
                        'email' => $email,
                    );
                    if (!is_null($adresse)) {
                        if (!isTheSameValue($client['adresse'], $adresse)) {
                            $data['adresse'] = $adresse;
                        }
                    }
                    if (!is_null($ville)) {
                        if (!isTheSameValue($client['ville'], $ville)) {
                            $data['ville'] = $ville;
                        }
                    }
                    if (!is_null($codePostal)) {
                        if (!isTheSameValue($client['codePostal'], $codePostal)) {
                            $data['codePostal'] = $codePostal;
                        }
                    }
                    $id = $_POST['validateModifClient'];
                    $this->Client->update($id, $data);

                }

            } else {
                $data = array(
                    'nom' => $name,
                    'prenom' => $firstName,
                );

                if (!is_null($adresse)) {
                    if (!isTheSameValue($client['adresse'], $adresse)) {
                        $data['adresse'] = $adresse;
                    }
                }
                if (!is_null($ville)) {
                    if (!isTheSameValue($client['ville'], $ville)) {
                        $data['ville'] = $ville;
                    }
                }
                if (!is_null($codePostal)) {
                    if (!isTheSameValue($client['codePostal'], $codePostal)) {
                        $data['codePostal'] = $codePostal;
                    }
                }

                $id = $_POST['validateModifClient'];
                $this->Client->update($id, $data);

            }
            header('location:dashboard');
        }
    }
    public function deleteClient()
    {
        $idCLient = $_POST['deleteClient'];
        $this->getModel('Client');
        $client = $this->Client->getOne('id', $idCLient);
        if (!$client) {
            header('location:dashboard');
            exit();
        }
        $this->Client->deleteOne('id', $idCLient);
        header('location:dashboard');
    }
    public function modifierCategorie()
    {
        $idCat = $_POST['modifierCategorie'];
        $this->getModel('Categorie');
        $cat = $this->Categorie->getOne('id', $idCat);

        $this->getViewDash('dashModifieCat', $cat);
    }
    public function validateModifCategorie()
    {
        $idCat = $_POST['validateModifCategorie'];
        $this->getModel('Categorie');
        $cat = $this->Categorie->getOne('id', $idCat);

        $erreurs = array();
        $libelle = isset($_POST['libelle']) ? secureData($_POST['libelle'], "text") : null;

        if (!isset($libelle) || empty($libelle)) {
            array_push($erreurs, "Champ libelle obligatoire.");
        }

        if (count($erreurs) > 0) {
            Session::set("flash", $erreurs);
            $this->getViewDash('dashModifieCat', $cat);
            exit();
        } else {
            $data = array();

            if (!is_null($libelle)) {
                if (!isTheSameValue($cat['libelle'], $libelle)) {
                    $data['libelle'] = $libelle;
                }
            }

            $this->Categorie->update($idCat, $data);

        }
        header('location:dashboard');
    }
    public function modifierProduit()
    {
        $idProduit = $_POST['modifierProduit'];
        $this->getModel('Produit');
        $produit = $this->Produit->getOne('id', $idProduit);

        $this->getViewDash('dashModifieProduit', $produit);
    }
    public function validateModifProduit()
    {
        $idProduit = $_POST['validateModifProduit'];
        $this->getModel('Produit');
        $produit = $this->Produit->getOne('id', $idProduit);

        $erreurs = array();
        $name = isset($_POST['nom']) ? secureData($_POST['nom'], "text") : null;
        $prix = isset($_POST['prix']) ? secureData($_POST['prix'], "text") : null;
        $imgUrl = isset($_POST['imageUrl']) ? secureData($_POST['imageUrl'], "text") : null;
        $idCategorie = isset($_POST['idCategorie']) ? secureData($_POST['idCategorie'], "text") : null;
        $description = isset($_POST['description']) ? secureData($_POST['description'], "text") : null;

        if (!isset($name) || empty($name)) {
            array_push($erreurs, "Champ Nom obligatoire.");
        }

        if (!isset($prix) || empty($prix)) {
            array_push($erreurs, "Champ prix obligatoire.");
        }
        if (!isset($idCategorie) || empty($idCategorie)) {
            array_push($erreurs, "Champ id Categorie obligatoire.");
        }

        if (count($erreurs) > 0) {
            Session::set("flash", $erreurs);
            $this->getViewDash('dashModifieProduit', $produit);
            exit();

        } else {
            $data = array(
                'nom' => $name,
                'prix' => $prix,
                'idCategorie' => $idCategorie,
            );

            if (!is_null($imgUrl)) {
                if (!isTheSameValue($produit['imageUrl'], $imgUrl)) {
                    $data['imageUrl'] = $imgUrl;
                }
            }
            if (!is_null($description)) {
                if (!isTheSameValue($produit['description'], $description)) {
                    $data['description'] = $description;
                }
            }

            $this->Produit->update($idProduit, $data);

        }
        header('location:dashboard');
    }
    public function ajouterCategorie()
    {

        $erreurs = array();
        $libelle = isset($_POST['libelle']) ? secureData($_POST['libelle'], "text") : null;
        $idCategorie = isset($_POST['idCategorie']) ? secureData($_POST['idCategorie'], "text") : null;

        if (!isset($libelle) || empty($libelle)) {
            array_push($erreurs, "Champ libelle obligatoire.");
        }
        if (!isset($idCategorie) || empty($idCategorie)) {
            array_push($erreurs, "Champ id catégorie obligatoire.");
        }

        if (count($erreurs) > 0) {
            Session::set("flash", $erreurs);
            $this->getModel('Categorie');
            $categories = $this->Categorie->getAll();
            $arrayOfData['Categories'] = $categories;
            $this->getViewDash('dashboardAjouter', $arrayOfData);
            exit();
        } else {
            $this->getModel('Categorie');
            $categorieFound = $this->Categorie->getOne('id', $idCategorie);
            $libelleFound = $this->Categorie->getOne('libelle', $libelle);

            if ($categorieFound || $libelleFound) {
                $msr_errors = $categorieFound ? 'Cette id catégorie existe déjà' : '';
                $msr_errors .= $libelleFound ? ' Ce libelle existe déjà' : '';
                array_push($erreurs, $msr_errors);
                if (count($erreurs) > 0) {
                    Session::set("flash", $erreurs);
                    $categories = $this->Categorie->getAll();
                    $arrayOfData['Categories'] = $categories;
                    $this->getViewDash('dashboardAjouter', $arrayOfData);
                    exit();
                }
            } else {
                $data = array(
                    'id' => $idCategorie,
                    'libelle' => $libelle,
                );
                $this->Categorie->create($data);

            }
            header('location:dashboard');
        }

    }
    public function ajouterProduit()
    {

        $erreurs = array();
        $id = isset($_POST['id']) ? secureData($_POST['id'], "text") : null;
        $nom = isset($_POST['nom']) ? secureData($_POST['nom'], "text") : null;
        $prix = isset($_POST['prix']) ? secureData($_POST['prix'], "text") : null;
        $imageUrl = isset($_POST['imageUrl']) ? secureData($_POST['imageUrl'], "text") : null;
        $idCategorie = isset($_POST['idCategorie']) ? secureData($_POST['idCategorie'], "text") : null;
        $description = isset($_POST['description']) ? secureData($_POST['description'], "text") : null;

        if (!isset($id) || empty($id)) {
            array_push($erreurs, "Champ id obligatoire.");
        }
        if (!isset($nom) || empty($nom)) {
            array_push($erreurs, "Champ Nom obligatoire.");
        }
        if (!isset($idCategorie) || empty($idCategorie)) {
            array_push($erreurs, "Champ id catégorie obligatoire.");
        }
        if (!isset($prix) || empty($prix)) {
            array_push($erreurs, "Champ prix obligatoire.");
        }
        if (!isset($imageUrl) || empty($imageUrl)) {
            array_push($erreurs, "Champ image url catégorie obligatoire.");
        }

        if (count($erreurs) > 0) {
            Session::set("flash", $erreurs);
            $this->getModel('Categorie');
            $categories = $this->Categorie->getAll();
            $arrayOfData['Categories'] = $categories;
            $this->getViewDash('dashboardAjouter', $arrayOfData);
            exit();
        } else {
            $this->getModel('Produit');
            $idFound = $this->Produit->getOne('id', $id);
            $nomFound = $this->Produit->getOne('nom', $nom);

            if ($idFound || $nomFound) {
                $msr_errors = $idFound ? 'Cette id existe déjà' : '';
                $msr_errors .= $nomFound ? ' Ce nom existe déjà' : '';
                array_push($erreurs, $msr_errors);
                if (count($erreurs) > 0) {
                    Session::set("flash", $erreurs);
                    $this->getModel('Categorie');
                    $categories = $this->Categorie->getAll();
                    $arrayOfData['Categories'] = $categories;
                    $this->getViewDash('dashboardAjouter', $arrayOfData);
                    exit();
                }
            } else {
                $data = array(
                    'id' => $id,
                    'nom' => $nom,
                    'prix' => $prix,
                    'imageUrl' => $imageUrl,
                    'idCategorie' => $idCategorie,
                );
                if (!empty($description)) {
                    $data['description'] = $description;
                }
                $this->getModel('Produit');
                $this->Produit->create($data);

            }
            header('location:dashboard');
        }

    }
}
