<?php

class User
{
    private ?int $id=null;
    private ?string $firstName=null;
    private ?string $lastname=null;
    private string $mailAddress;

    public function __construct(string $firstname, string $lastname, string $mailAddress)
    {
        $this->firstname    = $firstname;
        $this->lastname     = $lastname;
        $this->mailAddress  = $mailAddress;
    }

    function getId()
    {
        return $this->id;
    }

    function getFirstName()
    {
        return $this->firstName;
    }

    function getLastname(): string{
        return $this->lastname;
    }

    function getMailAddress(): string
    {
        return $this->mailAddress;
    }
   function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastname;
    }
   
}