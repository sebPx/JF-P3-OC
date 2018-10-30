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

$(document).ready(function() {
	flag = true;	
	$("#form").submit(function(){
    	content =  $(this).serialize();
		const ajax = new ajaxRequest("form",content);
		ajax.request();
		flag = false;
		return false;
    });

	$("#filter").submit(function(){
    	content =  $(this).serialize();
		const ajax = new ajaxRequest("filter",content);
		ajax.request();
		flag = false;
		return false;
    });
	
	$("button").click(function() {	
	    if (flag == true) {
		    divID =  $(this).attr("id");
		    methode =  $(this).val();

		    var tab = divID.split("-");

			content = "event="+methode+"&action="+tab['0']+"&target="+tab['1'];
			const ajax = new ajaxRequest("event",content);
			ajax.request();
			return flag = false;
		}
	});

	$(".commentResponses").click(function() {	
		divID =  $(this).attr("id");
		divID = divID.replace(/\D/g,'');// enleve les lettres
		divID = divID.replace(/\W/g, "");//enleve les autre caracteres
		
		if (flag == 1) {
			document.getElementById("responseSection-"+divID).style.display = "none";
			document.getElementById("commentResponses-"+divID).style.backgroundColor = "#fbb233";
			flag = 0;
		}else{
			document.getElementById("responseSection-"+divID).style.display = "flex";
			document.getElementById("commentResponses-"+divID).style.backgroundColor = "#c4c4c4";
			flag = 1;
		}
	});
});
