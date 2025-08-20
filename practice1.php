<?php

$name = "Marowa Jahan";
$age = 21;
$hometown = 'Dhaka, Bangladesh';  
$hobby = "Painting";      
$dreamJob = "Software Engineer";


$currentYear = date("Y");
$birthYear = $currentYear - $age;

$daysAlive = $age * 365;

if ($age < 13) {
    $lifeStage = "You're a child U+1f476";
} elseif ($age < 21) {
    $lifeStage = "You're a teenager ";
} elseif ($age < 60) {
    $lifeStage = "You're an adult \u{1f4bc}";
} else {
    $lifeStage = "You're a senior ";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Bio</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; }
        .bio-card { background: #f0f8ff; padding: 20px; border-radius: 10px; }
        h1 { color: #2c3e50; }
    </style>
</head>
<body>
    <div class="bio-card">
        <?php
       
        echo "<h1>Welcome, $name!</h1>";

        print "<p><strong>Age:</strong> " . $age . " (Born in $birthYear)</p>";

        echo <<<BIO
            <p><strong>Hometown:</strong> $hometown</p>
            <p><strong>Hobby:</strong> $hobby</p>
            <p><strong>Dream Job:</strong> $dreamJob</p>
        BIO;

        echo "<p><em>$lifeStage</em></p>";

        echo "<p>You've been alive for approximately <strong>$daysAlive days</strong>! 🌍</p>";
        ?>
    </div>
</body>
</html>
