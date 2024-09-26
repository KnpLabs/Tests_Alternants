<?php 

class Expense 
{
    protected float $amount;
    protected string $description;
    protected DateTime $happenedAt;
    protected User $thePayer;
    protected array $participants;


    public function __construct(float $amount, string $description, DateTime $happenedAt, User $thePayer, array $participants) 
    {
        $this->amount = $amount;
        $this->description = $description;
        $this->happenedAt = $happenedAt;
        $this->thePayer = $thePayer;
        $this->participants = $participants;
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
        return $this->thePayer;
    }

    public function getParticipants(): array
    {
        return $this->participants;
    }

    public function getType(): string
    {
        return "TYPE_EXPENSE";
    }

    // create method getUnityShared
    // problem with the float it needs to be rounded 
    public function getUnitaryShared(): float
    {
        // calculate the share that each person should pay
        $numberOfParticipants = count($this->participants);

        return round($this->amount / $numberOfParticipants, 2);
    }

    // create method getUserShare depending on a specific user
   public function getUserShare(User $user): float
    {
        $userShare = $this->getUnitaryShared();

        // if the user is the one that paid
        if ($user === $this->thePayer) {
            // if the user is also a participant
            if (in_array($user, $this->participants)) {
                return $this->amount - ($userShare * count($this->participants));
            }
            // if the user is no participant he should be reimbursed
            return $this->amount;
        }

        // if the user is a participant
        if (in_array($user, $this->participants)) {
            return -$userShare; 
        }

        // if the user is not part of the expense
        return 0;
    }
}
