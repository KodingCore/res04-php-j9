<?php
class User
{
    private ?int $id;
    private string $email;
    private string $username;
    private string $password;

    private function __constructor(string $email, string $username, string $password)
    {
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->id = null;
    }
    
    
    
}

?>