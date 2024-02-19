<?php

class DrinkExpense 
{

    private float $amount;

    private $description;

    private \DateTime $happenedAt;

    private User $le_payeur;

    /**
     * @var array<User>
     */
    private array $participants;

    /**
     * @param array <string, User> $participants
     */
    public function __construct(float $amount, string $description, DateTime $happenedAt, User $le_payeur, array $participants)
    {
        $this->amount = $amount;
        $this->description = $description;
        $this->happenedAt = $happenedAt;
        $this->le_payeur = $le_payeur;
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

    public function getPayer(): User
    {
        return $this->le_payeur;
    }

    public function getType(): string
    {
        return 'TYPE_DRINK';
    }

    public function getUnitaryShared(): float
    {
        return round($this->getAmount() / count($this->getParticipants()),2);
    }

    public function getUserShare(User $user): float
    {
        $payer = $this->getPayer();
        $participants = $this->getParticipants();
        $sharedAmount = $this->amount / count($this->participants);

        // Return 0 if the user is the payer or if he is not a participant
        if($user === $payer || !in_array($user, $participants)){
            return 0;
        } 
        // If the user is not the payer and he is a participant
        else{
            return $sharedAmount;
        }
    }
}