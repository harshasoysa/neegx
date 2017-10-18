<?php
namespace Neegx\Foundation\Db;

use Neegx\Foundation\Contracts\DbInterface;

class Db implements DbInterface
{
    private $connection;

    private $database;

    private $username;

    private $password;

    private $host;

    private $port;

    private $prefix;

    private $collation;

    private function create_connection($name){
        $this->database=(config($name.'.database') && config($name.'.database')!='')?config($name.'.database'):NULL;
        $this->username=(config($name.'.username') && config($name.'.username')!='')?config($name.'.username'):NULL;
        $this->password=(config($name.'.password'))?config($name.'.password'):'';
        $this->host=(config($name.'.host') && config($name.'.host')!='')?config($name.'.host'):NULL;
        $this->port=(config($name.'.port') && config($name.'.port')!='')?config($name.'.port'):NULL;
        $this->prefix=(config($name.'.prefix') && config($name.'.prefix')!='')?config($name.'.prefix'):NULL;
        $this->collation=(config($name.'.collation') && config($name.'.collation')!='')?config($name.'.collation'):NULL;
        if($this->database && $this->host && $this->username){
            $this->connection = new \PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password);
            $this->connection->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
        }

        $this->create();
        
    }

    public function __construct($db_name='default'){
        $name='database.'.$db_name;
        if(config($name)){
            $this->create_connection($name);
        }
        
    }

    public function create(){
        try {
            $sql ="CREATE table abcd(
                ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
                Prename VARCHAR( 50 ) NOT NULL, 
                Name VARCHAR( 250 ) NOT NULL,
                StreetA VARCHAR( 150 ) NOT NULL, 
                StreetB VARCHAR( 150 ) NOT NULL, 
                StreetC VARCHAR( 150 ) NOT NULL, 
                County VARCHAR( 100 ) NOT NULL,
                Postcode VARCHAR( 50 ) NOT NULL,
                Country VARCHAR( 50 ) NOT NULL);" ;
            $this->connection->exec($sql);
            print("Created abcd Table.\n");
        } catch(PDOException $e) {
            echo $e->getMessage();//Remove or change message in production code
        }
    }
    
}