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

namespace NxsFram\component;
use \NxsFram\http\httpRequest;
use \NxsFram\component\Model;
use \NxsFram\form\Form;
use \NxsFram\form\formHandler;
use \NxsFram\http\AjaxRequest;
use \NxsFram\service\ServiceForm;
use \NxsFram\service\ServiceEvent;
use \NxsFram\service\ServiceFilter;

class Service{
	protected $_httpRequest;
	protected $_form;
	protected $_model;
	protected $_modelTemplate;
	protected $_part;
	protected $_payback;
	protected $_ajax;
	protected $_attribute;
	protected $_formView;
	protected $_template;
	protected $_module;

	public function __construct($part){
		$this->_httpRequest = new httpRequest;
		$this->_ajax = new AjaxRequest;		
		$this->_part = $part;
	}

	Public function process(Form $form, Model $model, Model $modelTemplate, $module, $attribute){
		$this->_form = $form;
		$this->_model = $model;
		$this->_modelTemplate = $modelTemplate;
		$this->_module = $module;
		$this->_attribute = $attribute;
		
		$this->_ajax->checkRequest();
		$this->_ajax->ajaxRequestHandler($this->_form, $this->_model, $this->_module);
		
		$this->ajaxRoute();
	}

	Public function eventProcess(Model $model, Model $modelTemplate, $module){
		$this->_model = $model;
		$this->_modelTemplate = $modelTemplate;
		$this->_module = $module;
		
		$this->_ajax->eventRequestHandler($this->_model);
		$this->_ajax->checkRequest();

		$this->ajaxRoute();
	}

	public function ajaxRoute(){
		switch ($this->_ajax->requestType()) {
			case 'form':
				ServiceForm::core();
				break;
			case 'event':
				ServiceEvent::core();
				break;
			case 'filter':
				ServiceFilter::core();
				break;	
		}		
	}

	public function payback($content){
		$this->_payback = $content;
		return;
	}

	public function getPayback(){
		return $this->_payback;
	}

	public function JSONEncode($content){
		return json_encode($content);
	}

	public function setFormView($content){
		if (!empty($content)) {
			$this->_formView = $content;
		}
	}

	public function setTemplate($content){
		if (!empty($content)) {
			$this->_template = $content;
		}
	}
}

