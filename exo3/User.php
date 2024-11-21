<?php

class User
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $mailAddress;
    private float $balance;

    public function __construct(string $firstName, string $lastName, string $mailAddress, float $balance)
    {
        $this->firstName    = $firstName;
        $this->lastName     = $lastName;
        $this->mailAddress  = $mailAddress;
        $this->balance      = $balance;
    }

    function getId(): int
    {
        return $this->id;
    }

    function getFirstName(): string
    {
        return $this->firstName;
    }

    function getLastName()
    {
        return $this->lastName;
    }

    function getMailAddress()
    {
        return $this->mailAddress;
    }

    function getFullName()
    {
        return $this->firstName . " " . $this->lastName;
    }

    /**
     * Get the value of balance
     */ 
    public function getBalance()
    {
            return $this->balance;
    }

    /**
     * Set the value of balance
     *
     * @return  self
     */ 
    public function setBalance($balance)
    {
        return $this->balance = $balance;
    }
}