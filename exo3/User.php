<?php

class User
{
    private int $id;
    private string $firstName;
    private string $lastName;

    private string $mailAddress;

    public function __construct(string $firstname, string $lastName, string $mailAddress)
    {
        $this->firstName = $firstname;
        $this->lastName = $lastName;
        $this->mailAddress = $mailAddress;
    }

    function getId(): int
    {
        return $this->id;
    }

    function getFirstName(): string
    {
        return $this->firstName;
    }

    function getLastName(): string
    {
        return $this->lastName;
    }

    function getMailAddress(): string
    {
        return $this->mailAddress;
    }

    // get full name function needed
    public function getFullName(): string
    {
        return $this->getFirstName() . ' ' . strtoupper($this->getLastName());
    }
}