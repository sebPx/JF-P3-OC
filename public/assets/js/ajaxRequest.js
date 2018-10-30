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

class  ajaxRequest {
	
	constructor (way, content){
		this.way = way;
		this.content = content; 
	}

	request(){
		$.ajax({
        	type:"POST", 
        	data: "requestType="+this.way+"&"+this.content,
        	dataType : 'JSON',
            
            success: function(data){
            	response(data);
            },
            error: function(data){
            	console.log(data);
            },
            complete: function(data){
            	console.log(data);
            }
        });
		
		function response(data){
		    if (data != "") {
			    switch (data.return) {
			    	 case 'success':
						document.location.href="#_Success";
			    		$('.modal-close-btn').click();
						
						if (typeof data.response != "undefined") {
				    		document.getElementById("infoArea").style.display = "inline";
				    		document.getElementById("infoArea").innerHTML = "";
				    		$('#infoArea').append(data.response+" <button style='height: 30px;color:white;float:right; margin: auto 10px auto 10px; border: none; background:transparent'> Fermer </button>");
			    		}
			    		if (data.part == "backend") {
			    			$('#admin-content-section').load('../src/site/backend/view/template/'+data.view+'.php',data);
			    		}else{
			    			$('#response-content').load('../src/site/frontend/view/'+data.view+'/'+data.view+'.php',data);
			    		}
			    		
			    		break;

			  		 case 'filtered':
						$('.reviewContent').load('../src/site/'+data.part+'/view/review/'+data.view+'.php',data);
						break;
					 break;
			    	 
			    	 case 'error':
						document.location.href="#_Error";
			    		document.getElementById("errorArea").innerHTML = "";
			    		document.getElementById("errorArea").innerHTML = "ⓘ "+data.content;
			    		document.getElementById("errorArea").style.display = "inline";
			    		break;			

			    	 case 'load':
						$('#admin-content-section').load('../src/site/backend/view/template/'+data.view+'.php',data);
						$('#admin-content-nav').load('../src/site/backend/view/jacket/nav/nav.php',data);
						break;

			    	 case 'review':
						$('.reviewContent').load('../src/site/'+data.part+'/view/review/'+data.view+'.php',data);
						break;
			    	 
			    	 case 'form':
						$('.formContentPage').load('../src/site/'+data.part+'/view/form/'+data.view+'.php',data);
						break;
			    	 
			    	 case 'formReturn':
						$('.formContent').innerHTML = "";
						$('.formContent').load('../src/site/'+data.part+'/view/form/'+data.view+'.php',data);
						break;

			    	case 'user':
						$('.formContent').innerHTML = "";
						$('.formContent').load('../src/user/view/form/'+data.view+'.php',data);
						break;

					case 'update':
						document.getElementById(data.target).innerHTML=data.content;
						break;

					case 'redirect':
						document.location.href=data.link;
						break;
			    }
			}
		}
	}


}
