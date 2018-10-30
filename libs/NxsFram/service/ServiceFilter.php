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

namespace NxsFram\service;
use \src\site\backend\form\FormBuilderFilterReview;
use \NxsFram\form\formHandler;
use \NxsFram\component\Service;

class ServiceFilter extends Service{

	public function core(){	
		$filter = new FormBuilderFilterReview;
		$filter->build();
		$handler = new formHandler($filter->form());

		if ($handler->process($this->_httpRequest->postContent())) {
			$objects = $handler->getEntity();		
			
			switch ($this->_httpRequest->postData('action')) {				
				case 'trash':
					if ($objects['0']['getter'] == 'all') {
						$list = $this->_model->getAllTrash($this->_attribute);
					}else{
						$list = $this->_model->getTrashBy($objects['0']['getter'], $objects['0']['value'],$this->_attribute);
					}	
				break;
				case 'archive':
					if ($objects['0']['getter'] == 'all') {
						$list = $this->_model->getAllArchive($this->_attribute);
					}else{
						$list = $this->_model->getArchiveBy($objects['0']['getter'], $objects['0']['value'],$this->_attribute);
					}	
				break;
				case 'users':
					if ($objects['0']['getter'] == 'all') {
						$list = $this->_model->getAllUsers($this->_attribute);
					}else{
						$list = $this->_model->getBy($objects['0']['getter'], $objects['0']['value'],$this->_attribute);
					}	
				break;
				default:
					if ($objects['0']['getter'] == 'all') {
						$list = $this->_model->getAll($this->_attribute);
					}else{
						$list = $this->_model->getBy($objects['0']['getter'], $objects['0']['value'],$this->_attribute);
					}	
				break;
			}
			$entity = $list->getEntities();
			$result = [];

			if (isset($objects['0']['since']) && isset($objects['0']['to'])) {
				foreach ($entity as $key => $value) {			
					$dateExploded = explode(' ',$entity[$key]['date']);
					$date1 = new \DateTime($objects['0']['since']);
					$date2 = new \DateTime($objects['0']['to']);
					$date3 = new \DateTime($dateExploded['0']);
					if (($date1 < $date3 || $date3 == $date2 ) && ($date3 < $date2 || $date3 == $date2)) {
						$result[$key] = $entity[$key];
					}
				}				
			}else{
				$result = $entity;
			}
			
			if (isset($objects['0']['display'])) {
				switch ($objects['0']['display']) {				
					case 'asc':
						$result = array_reverse($result);
					break;
					case 'desc':
						$result = $result;
					break;				
				}				
			}
			
			return $this->payback (array( 
				"return" 	=> "filtered",
				"part" 		=> $this->_part,
				"view"		=> $this->_httpRequest->postData('action'),				
				"post"		=> $result,
				"module"	=> $this->_template,
				"filter"	=> $filter->form()->createView(),
				"form"		=> $this->_form->createView()
			));		

		}else{

		}
	}

}

