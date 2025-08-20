<?php

class BankAccount {
    private $accountNumber;
    private $accountHolderName;
    private $balance;
    private $accountType;
    private $transactionHistory;

    public function __construct($accountNumber, $accountHolderName, $initialBalance, $accountType) {
        $this->accountNumber = $accountNumber;
        $this->accountHolderName = $accountHolderName;
        $this->balance = $initialBalance;
        $this->accountType = $accountType;
        $this->transactionHistory = [];

        echo "Account Created: {$this->accountNumber} - {$this->accountHolderName}<br>";
        echo "Initial Balance: $" . number_format($this->balance, 2) . "<br><br>";
    }

    public function deposit($amount) {
        if ($amount <= 0) {
            echo "Deposit failed: Invalid amount.<br>";
            $this->addTransaction("Deposit", $amount, false);
            return false;
        }

        $this->balance += $amount;
        $this->addTransaction("Deposit", $amount, true);

        echo "Deposit of $" . number_format($amount, 2) . " successful. New balance: $" . number_format($this->balance, 2) . "<br>";
        return true;
    }

    public function withdraw($amount) {
        if ($amount <= 0) {
            echo "Withdrawal failed: Invalid amount.<br>";
            $this->addTransaction("Withdraw", $amount, false);
            return false;
        }

        if ($amount > $this->balance) {
            echo "Withdrawal of $" . number_format($amount, 2) . " failed: Insufficient funds.<br>";
            $this->addTransaction("Withdraw", $amount, false);
            return false;
        }

        $this->balance -= $amount;
        $this->addTransaction("Withdraw", $amount, true);

        echo "Withdrawal of $" . number_format($amount, 2) . " successful. New balance: $" . number_format($this->balance, 2) . "<br>";
        return true;
    }

    public function checkBalance() {
        echo "Current Balance: $" . number_format($this->balance, 2) . "<br>";
        return $this->balance;
    }

    public function getAccountInfo() {
        echo "<br>=== Account Information ===<br>";
        echo "Account Number: {$this->accountNumber}<br>";
        echo "Account Holder: {$this->accountHolderName}<br>";
        echo "Account Type: {$this->accountType}<br>";
        echo "Current Balance: $" . number_format($this->balance, 2) . "<br>";
    }

    public function getTransactionHistory() {
        echo "<br>=== Transaction History for {$this->accountHolderName} ===<br>";
        if (empty($this->transactionHistory)) {
            echo "No transactions yet.<br>";
            return;
        }

        foreach ($this->transactionHistory as $index => $txn) {
            $num = $index + 1;
            $type = $txn["type"];
            $amount = number_format($txn["amount"], 2);
            $balanceAfter = number_format($txn["balance_after"], 2);
            $status = $txn["success"] ? "YES" : "NO";
            $sign = ($type == "Deposit") ? "+" : "-";
            echo "{$num}. {$type}: {$sign}\${$amount} (Balance: \${$balanceAfter}) {$status} @ {$txn['timestamp']}<br>";
        }
    }

    private function addTransaction($type, $amount, $success) {
        $this->transactionHistory[] = [
            "type" => $type,
            "amount" => $amount,
            "balance_after" => $this->balance,
            "timestamp" => date("Y-m-d H:i:s"),
            "success" => $success
        ];
    }
}


$account1 = new BankAccount("ACC001", "Alice Johnson", 1500.75, "Savings");
$account2 = new BankAccount("ACC002", "Bob Wilson", 800.00, "Checking");

$depositAmounts = [200.50, 150.00, -50, 75.25];
foreach ($depositAmounts as $amt) {
    $account1->deposit($amt);
}


$withdrawAmounts = [100.00, 50.00, 3000.00, -20];
foreach ($withdrawAmounts as $amt) {
    $account1->withdraw($amt);
}

$account1->getAccountInfo();
$account1->getTransactionHistory();

echo "<hr>";

$account2->deposit(500.00);
$account2->withdraw(200.00);
$account2->withdraw(1200.00); 
$account2->getAccountInfo();
$account2->getTransactionHistory();

?>


    