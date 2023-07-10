<?php
class User
{
    private ?int $id;
    private string $email;
    private string $username;
    private string $password;

    public function __construct(string $email, string $username, string $password)
    {
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->id = null;
    }
    
    public function getId() : int
    {
        return $this->id;
    }
    
    public function getUsername() : string
    {
        return $this->username;
    }
    
    public function getEmail() : string
    {
        return $this->email;
    }
    
    public function getPassword() : string
    {
        return $this->password;
    }
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }
    
    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }
    
    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }
}

?>