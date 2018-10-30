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

namespace app;
use \PDO;

class DBFactory {

  // connection au serveur                                        //
    public static function connexionPDO(){
      $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
      $connect = new PDO($dsn,DB_USER,DB_PASS);
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      return $connect; 
    }
}