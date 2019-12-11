<?PHP 
include "../config.php";
class produitC
{
	function afficherProduit()
	{
		$sql = "SElECT * From produit";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	//Pour executer une requete on a trois possibilites
	//$db->exec($sql) execute la requete et ne renvoie pas le resultat renvoie juste le
	//nombre de ligne affecte ==> a utilise dans le cas d'un insert ou update
	//$db->query($sql) execute une requete et renvoie le resultat
	//dans un PDOStatement(C'est un objet qui permet de representer une requete et le resultat )
	//$db->prepare($sql) execute une requete prepare

	function afficherReclamation($Reclamation)
	{
		echo "idreclam: " . $Reclamation->getIdreclam() . "<br>";
		echo "datereclam: " . $Reclamation->getDatereclam() . "<br>";
		echo "sujet: " . $Reclamation->getSujet() . "<br>";
		echo "etat: " . $Reclamation->getEtat() . "<br>";
	}
	
	function ajouterProduit($produit)
	{
		$sql = "insert into produit (codeprod,libelle,couleur,seuillesec,qtdispo,pvpublic,description,image,familleprod,sousfamilleprod) values (:idreclam, :datereclam,:sujet,:etat)";
		$db = config::getConnexion();
		try {
			$req = $db->prepare($sql);

			$codeprod = $produit->getCodeprod();
			$libelle = $produit->getLibelle();
			$couleur = $produit->getCouleur();
            $seuillesec = $produit->getSeuillesec();
            $qtdispo = $produit->getQtdispo();
			$pvpublic= $produit->getPvpublic();
			$description = $produit->getDescription();
            $image = $produit->getImage();
            $familleprod = $produit->getFamilleprod();
            $sousfamilleprod = $produit->getSousfamilleprod();
			$req->bindValue(':codeprod', $codeprod);
			$req->bindValue(':libelle ', $libelle );
			$req->bindValue(':couleur', $couleur);
            $req->bindValue(':seuillesec', $seuillesec);
            $req->bindValue(':qtdispo', $qtdispo);
			$req->bindValue(':pvpublic', $pvpublic);
			$req->bindValue(':description', $description);
            $req->bindValue(':image', $image);
            $req->bindValue(':familleprod', $familleprod);
			$req->bindValue(':sousfamilleprod', $sousfamilleprod);
			

			$req->execute();
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}


	function supprimerProduit($codeprod)
	{
		$sql = "DELETE FROM produit where codeprod= :codeprod";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':codeprod', $codeprod);
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	function modifierProduit($produit, $codeprod)
	{
		$sql = "UPDATE produit SET codeprod=:codeprod, libelle=:libelle,couleur=:couleur,seuillesec=:seuillesec,qtdispo=:qtdispo,pvpublic=:pvpublic,description=:description,image=:image,familleprod=:familleprod,sousfamilleprod=:sousfamilleprod WHERE codeprod=:codeprod";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		try {
			$req = $db->prepare($sql);
			$codeprod = $produit->getCodeprod();
			$libelle = $produit->getLibelle();
			$couleur = $produit->getCouleur();
            $seuillesec = $produit->getSeuillesec();
            $qtdispo = $produit->getQtdispo();
			$pvpublic= $produit->getPvpublic();
			$description = $produit->getDescription();
            $image = $produit->getImage();
            $familleprod = $produit->getFamilleprod();
            $sousfamilleprod = $produit->getSousfamilleprod();
			
			$datas = array(':codeprodd' => $codeprodd, ':idreclam' => $idreclam, ':libelle' => $libelle, ':seuillesec' => $seuillesec, ':qtdispo' => $qtdispo,':pvpublic' => $pvpublic,':description' => $description,':image' => $image,':familleprod' => $familleprod,':sousfamilleprod' => $sousfamilleprod);
			$req->bindValue(':codeprodd', $codeprodd);
			$req->bindValue(':codeprod', $codeprod);
			$req->bindValue(':libelle', $libelle);
			$req->bindValue(':couleur', $couleur);
            $req->bindValue(':seuillesec', $seuillesec);
            $req->bindValue(':qtdispo', $qtdispo);
            $req->bindValue(':pvpublic', $pvpublic);
            $req->bindValue(':description', $description);
            $req->bindValue(':image', $image);
            $req->bindValue(':familleprod', $familleprod);
            $req->bindValue(':sousfamilleprod', $sousfamilleprod);

		


			$s = $req->execute();

			// header('Location: index.php');
		} catch (Exception $e) {
			echo " Erreur ! " . $e->getMessage();
			echo " Les datas : ";
			print_r($datas);
		}
	}
	function trouverReclamation($idreclam)
 {
 $sql="SELECT * from produit where codeprod=$codeprod";
 $db= config::getConnection();
 try{
     $liste=$db->query($sql);
     return $liste;
     }
 catch (Exception $e){
     die('Erreur: '.$e->getMessage());
     }
 }


	
}
