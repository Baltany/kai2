<?php
class Usuario{
    private $id_usuario;
    private $username;
    private $password;
    private $telf;
    private $rol;


    public function __construct($id_usuario="",$password="",$username="",$telf="",$rol="mecanico") {
        $this->id_usuario=$id_usuario;
        $this->password=$password;
        $this->username=$username;
        $this->telf=$telf;
        $this->rol=$rol;

    }

    public function __get(string $name): mixed {
        return $this->$name;
    }
    
    public function __set(string $name, mixed $value): void {
        $this->$name=$value;
    }
    
    public function esAdmin(): bool {
        return $this->rol === 'admin';
    }
    
    public function esMecanico(): bool {
        return $this->rol === 'mecanico';
    }
    



}

?>