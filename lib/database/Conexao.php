<?php
    abstract Class Conexao{

        private static $con;
        public static function getConexao()
        { 
                if(self::$con == null):
                    self::$con = new PDO("mysql:dbname=crudindependente;host=localhost;","root",""); 
                endif;        
              
                if(self::$con == null)
                {
                    throw new Exception("Error Processing Request", 1);
                    
                }
            return self::$con;
        }

        public static function fechaConexao()
        {
            
        }

    }

?>