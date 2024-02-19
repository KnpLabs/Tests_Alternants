<?php

class FoodExpense 
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

    public function getType() {
        return 'TYPE_FOOD';
    }

    public function getUnitaryShared()
    {
        return round($this->getAmount() / count($this->getParticipants()),2);
    }

    public function getUserShare(User $user)
    {
        // get the payer
        $payer = $this->getPayer();
        $participants = $this->getParticipants();
        
        $sharedAmount = $this->amount / count($this->participants);

        if($user === $payer){
            return 0;
        } else if (!in_array($user, $participants)){
            return 0;
        }
        else{
            return $sharedAmount;
        }
        
    }
}