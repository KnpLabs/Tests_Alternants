<?php

class User
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $mailAddress;

    public function __construct(string $firstName, string $lastName, string $mailAddress)
    {
        $this->firstName    = $firstName;
        $this->lastName     = $lastName;
        $this->mailAddress  = $mailAddress;
    }

    function getId(): int
    {
        return $this->id;
    }

    function getFirstName(): string
    {
        return $this->firstName;
    }

    function getLastName(){
        return $this->lastName;
    }

    function getMailAddress()
    {
        return $this->mailAddress;
    }

    function getFullName(){

        return $this->firstName . " " . $this->lastName;

    }
}