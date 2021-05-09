<?php
    Class UserGS{
        private $id;
        private $nome;
        private $login;
        private $senha;
        private $email;
        private $status;

        public function SetId(String $id)
        {
            $this->id = $id;
        }

        public function GetId()
        {
            return $this->id;
        }

        public function Setnome(String $nome)
        {
            $this->nome = $nome;
        }

        public function Getnome()
        {
            return $this->nome;
        }
    
        public function Setlogin(String $login)
        {
            $this->login = $login;
        }

        public function GetLogin()
        {
            return $this->login;
        }

        public function Setsenha(String $senha)
        {
            $this->senha = $senha;
        }

        public function Getsenha()
        {
            return $this->senha;
        }

        public function Setemail(String $email)
        {
            $this->email = $email;
        }

        public function Getemail()
        {
            return $this->email;
        }

        public function Setstatus(String $status)
        {
            $this->status = $status;
        }

        public function Getstatus()
        {
           return $this->status;
        }
}


?>