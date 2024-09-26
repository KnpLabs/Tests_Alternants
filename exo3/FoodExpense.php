<?php
require_once("Expense.php");
class FoodExpense extends Expense
{
    public function getType(): string
    {
        return 'TYPE_FOOD';
    }
}
