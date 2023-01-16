<?php

class Connection
{
    private $serv = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $bd = 'e.lyrics';


    private function pdoConnection()
    {
        $con = new PDO('mysql:host=' . $this->serv . ';dbname=' . $this->bd, $this->user, $this->pass);
        $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        try {
            return $con;
        } catch (PDOException $er) {
            echo 'Database Error: ' . $er->getMessage();
        }
    }
    public function connect()
    {
        return $this->pdoConnection();
    }
}
