<?php

class User
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $mailaddress;

    public function __construct(string $firstname, string $lastname, string $mailaddress)
    {
        $this->firstname    = $firstname;
        $this->lastname     = $lastname;
        $this->mailaddress  = $mailaddress;
    }

    function getId(): int
    {
        return $this->id;
    }

    function getFirstname(): string
    {
        return $this->firstname;
    }

    function getLastname(): string 
    {
        return $this->lastname;
    }

    function getMailAddress(): string
    {
        return $mailaddress;
    }

    function getFullname(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}