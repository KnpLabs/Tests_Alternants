<?php
require_once("Expense.php");
class DrinkExpense extends Expense
{
    public function getType(): string
    {
        return 'TYPE_DRINK';
    }
}