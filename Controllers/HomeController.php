<?php
    //Classe que leva o usuário a telo home, sobre, login e uma roupa talvez ou traz informações simples
    class HomeController{

        public function index(){
            //Leva até o home
            $home = file_get_contents('view/home.html');
            echo $home;
        
        }


        public function areadeLogin()
        {
            $login = file_get_contents('view/login.html');

            echo $login;
            
        }
    }

?>