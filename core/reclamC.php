<?PHP 
include "../config.php";
class ReclamC
{
	function afficherReclam()
	{
		$sql = "SELECT * From reclamation order by daterelam desc";
		$db = config:: getConnexion();
		try {
			$liste = $db->query($sql);
			var_dump($liste);
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
		echo "email: " . $Reclamation->getEmail() . "<br>";
		echo "first_name: " . $Reclamation->getFirst_name() . "<br>";
		echo "last_name: " . $Reclamation->getLast_name() . "<br>";
		echo "libprod: " . $Reclamation->getLibprod() . "<br>";
		echo "sujet: " . $Reclamation->getSujet() . "<br>";
		echo "etat: " . $Reclamation->getEtat() . "<br>";
		
		
	}
	
	function ajouterReclamation($Reclamation)
	{
		$sql = "insert into Reclamation (idreclam,daterelam,sujet,etat) values (:idreclam, :datereclam,:sujet,:etat)";
		$db = config::getConnexion();
		try {
			$req = $db->prepare($sql);

			$idreclam = $Reclamation->getIdreclam();
			$nom = $Reclamation->getDatereclam();
			$prenom = $Reclamation->getSujet();
			$nb = $Reclamation->getEtat();
			$req->bindValue(':idreclam', $idreclam);
			$req->bindValue(':daterelam', $daterelam);
			$req->bindValue(':sujet', $sujet);
			$req->bindValue(':etat', $etat);

			$req->execute();
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}


	function supprimerEmploye($cin)
	{
		$sql = "DELETE FROM Reclamation where idreclam= :idreclam";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':idreclam', $idreclam);
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	function modifierReclamation($Reclamation, $idreclam)
	{
		$sql = "UPDATE Reclamation SET idreclam=:idreclamm, daterelam=:daterelam,sujet=:sujet,etat=:etat,first_name=:first_name,last_name=:last_name,libprod=:libprod WHERE idreclam=:idreclam";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		try {
			$req = $db->prepare($sql);
			$idreclam = $Reclamation->getIdreclam();
			$datereclam = $Reclamation->getDaterelam();
			$sujet = $Reclamation->getSujet();
			$etat = $Reclamation->getEtat();
			$libprod = $Reclamation->getLibprod();
			$firstname = $Reclamation->getFirst_name();
			$lastname = $Reclamation->getLast_name();
			
			$datas = array(':idreclamm' => $idreclamm, ':idreclam' => $idreclam, ':daterelam' => $daterelam, ':sujet' => $sujet, ':etat' => $etat, ':libprod' => $libprod, ':first_name' => $first_name, ':Last_name' => $Last_name);
			$req->bindValue(':idreclamm', $idreclamm);
			$req->bindValue(':idreclam', $idreclam);
			$req->bindValue(':daterelam', $daterelam);
			$req->bindValue(':sujet', $sujet);
			$req->bindValue(':etat', $etat);
			$req->bindValue(':libprod', $libprod);
			$req->bindValue(':first_name', $first_name);
			$req->bindValue(':last_name', $last_name);
		
		
		


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
 $sql="SELECT * from Reclamation where idreclam=$idreclam";
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
