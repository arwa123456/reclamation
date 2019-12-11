<?PHP
class Reclamation{
	private $idreclam;
	private $email;
	private $first_name;
	private $last_name;
	private $libprod;
	private $sujet;
	private $etat;
	private $daterelam;
	function __construct($idreclam,$email,$first_name,$last_name,$libprod,$sujet,$etat,$daterelam){
		$this->idreclam=$idreclam;
		$this->email=$email;
		$this->first_name=$first_name;
		$this->$last_name=$$last_name;
		$this->libprod=$libprod;
		$this->sujet=$sujet;
		$this->etat=$etat;
		$this->daterelam=$daterelam;
		
	}
	
	function getIdreclam(){
		return $this->idreclam;
	}
	function getEmail(){
		return $this->email;
	}
	function getFirst_name(){
		return $this->first_name;
	}
	function getLast_name(){
		return $this->last_name;
	}
	function getLibprod(){
		return $this->libprod;
	}

	function getSujet(){
		return $this->sujet;
	}
	function getEtat(){
		return $this->etat;
	}
	function getDaterelam(){
		return $this->daterelam;
	}

	function setEmail($email){
		$this->email=$email;
	}
	function setFirst_name($first_name){
		$this->first_name=$first_name;
	}
	function setLast_name($last_name){
		$this->last_name=$last_name;
	}
	function setLibprod($libprod){
		$this->libprod=$libprod;
	}
	function setSujet($sujet){
		$this->sujet;
	}
	function setEtat($etat){
		$this->etat=$etat;
	}
	function setDaterelam($daterelam){
		$this->daterelam=$daterelam;
	}
	
	
}

?>