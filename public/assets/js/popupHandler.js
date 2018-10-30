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


	
	function popup(size,path,file){
		if (typeof(path) != 'undefined' && typeof(file) != 'undefined' ) {
			path = '<script>$(".popup-content").load("../src/site/'+path+'/view/popup/'+file+'.php");</script>';
		}else{
			path = '';
		}

		modal({
			type: 'primary', //Type of Modal Box (alert | confirm | prompt | success | warning | error | info | inverted | primary)
			text: '<div class="popup-content"></div><div class="formContentPage"></div><div class="reviewContent"></div>'+path, //Modal HTML Content
			size: size, //Modal Size (normal | large | small)
			center: true, //Center Modal Box?
			autoclose: false, //Auto Close Modal Box?
			callback: null, //Callback Function after close Modal (ex: function(result){alert(result); return true;})
			onShow: function(r) {}, //After show Modal function
			closeClick: true, //Close Modal on click near the box
			closable: true, //If Modal is closable
			theme: 'atlant', //Modal Custom Theme (xenon | atlant | reseted)
			animate: false, //Slide animation
			background: 'rgba(0,0,0,0.35)', //Background Color, it can be null
			zIndex: 1050, //z-index
			buttonText: {
				ok: 'OK',
				yes: 'Yes',
				cancel: 'Cancel'
			},
			template: '<div class="modal-box"><div class="modal-inner"><div class="modal-title"><a class="modal-close-btn"></a></div><div class="modal-text"></div><div class="modal-buttons"></div></div></div>',
			_classes: {
				box: '.modal-box',
				boxInner: ".modal-inner",
				content: '.modal-text',
				closebtn: '.modal-close-btn'
			}
		});
	}


