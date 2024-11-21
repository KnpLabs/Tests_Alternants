<?php

class DrinkExpense
{
    private float $amount;

    private $description;

    private \DateTime $happenedAt;

    private User $lePayeur;

    /**
     * @var array<User>
     */
    private array $participants;

    /**
     * @param array <string, User> $participants
     */
    public function __construct(float $amount, string $description, DateTime $happenedAt, User $lePayeur, array $participants)
    {
        $this->amount = $amount;
        $this->description = $description;
        $this->happenedAt = $happenedAt;
        $this->lePayeur = $lePayeur;
        $this->participants = $participants;
    }


    /**
     * @return array<string, User> $participants
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getHappenedAt(): \DateTime
    {
        return $this->happenedAt;
    }

    public function getLePayeur(): User
    {
        return $this->lePayeur;
    }

    function getType() {
        return 'DRINK';
    }

    function getUnitaryShared(){
    return $this->amount / count($this->participants);

    }

    function getUserShare($user){


    }
}