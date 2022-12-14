<?php
namespace Model;

use Classes\Database;
use PDO;

class User extends Database
{
    public function fetch($id)
    {
        try {
            $this->setSql("SELECT * FROM usuarios WHERE id = ?");

            
            $this->stmt = $this->conn->prepare($this->getSql());
            $this->stmt->bindParam(1, $id);

            $this->stmt->execute();

            if ($this->stmt->rowCount() > 0) {
                return $this->stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                return [];
            }
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
            //throw $th;
        }
    }
    
    public function login($email, $password)
    {
        try {
            $this->setSql("SELECT * FROM usuarios WHERE email = ? AND senha = ?");

            $this->stmt = $this->conn->prepare($this->getSql());
            $this->stmt->bindParam(1, $email);
            $this->stmt->bindParam(2, $password);

            if ($this->stmt->execute()) {
                return $this->stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                throw "Erro ao realizar login";
            }
        } catch (\Throwable $exception) {
            echo $exception->getMessage();
        }
    }
}