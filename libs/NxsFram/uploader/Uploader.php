<?PHP
/*
	Template:       Noxus
	Theme URL:      https://noxus.fr
	Author:         Sebastien P.
	Author URL:     https://noxus.fr/creator
	Description:    Noxus engine production ©
	Contact:        contact@noxus.fr
	Version:        1.0
	License:        GNU General Public License v3 or later
	License URI:    http://www.gnu.org/licenses/gpl-3.0.html
	Text Domain:    Noxus ©
	Mention légale: Textes codés et utilisés par Noxus engine © ayant droit d'auteur sur le contenu suivant.
*/

namespace NxsFram\uploader;
use NxsFram\component\Model;

class Uploader{
	
	private $_targetDir;
	private $_targetFile;
	private $_uploadOk;
	private $_imageFileType;
	private $_msg;

	public function __construct(){
		$this->_targetDir = "uploads/";
		$this->_msg = "";

	}

	public function initUpload(){
		$this->_targetFile = $this->_targetDir . basename($_FILES["uploadCase"]["name"]);
		$this->_uploadOk = 1;
		$this->_imageFileType = strtolower(pathinfo($this->_targetFile,PATHINFO_EXTENSION));	
	}

	public function isValid(){	 
		if(isset($_POST["submit"])) { // Check if image file is a actual image or fake image
		    $check = getimagesize($_FILES["uploadCase"]["tmp_name"]);
		    
		    if($check !== false) {
		        $this->_uploadOk = 1;
		    } else {
		        $this->_msg = "Le fichier n'est pas une image.</br>";
		        $this->_uploadOk = 0;
		    }
		}
		
		if (file_exists($this->_targetFile)) { // Check if file already exists
		    $this->_msg = "Désolé le fichier existe déjà.</br>";
		    $this->_uploadOk = 0;
		}
		
		if ($_FILES["uploadCase"]["size"] > 5000000) { // Check file size
		    $this->_msg = "Désolé le fichier est trop volumineux</br>.";
		    $this->_uploadOk = 0;
		}
		// Allow certain file formats
		if($this->_imageFileType != "jpg" && $this->_imageFileType != "png" && $this->_imageFileType != "jpeg" && $this->_imageFileType != "gif" ) {
		    $this->_msg = "Désolé, seulement les fichiers de format JPG, JPEG, PNG & GIF sont autorisés.</br>";
		    $this->_uploadOk = 0;
		}
	}

	public function execute(){
		if ($this->_uploadOk == 0) {
		    return "false";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["uploadCase"]["tmp_name"], $this->_targetFile)) {
				$this->_msg  += "Fichier enregistré avec succès !</br>";
				return "true";
			}else{
				$this->_msg += "Une erreur est survenu durant l'upload du fichier.</br>";
				return "false";
			}				
		}
	}

	public function getMsg(){
		return $this->_msg;
	}


}