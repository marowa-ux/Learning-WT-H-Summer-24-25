<?php

$appetizers = [
    "Spring Rolls" => ["price" => 8.99, "desc" => "Fresh vegetable rolls", "tags" => ["vegetarian"]],
    "Buffalo Wings" => ["price" => 12.99, "desc" => "Spicy chicken wings", "tags" => ["spicy"]],
    "Garlic Bread" => ["price" => 6.50, "desc" => "Toasted bread with garlic butter", "tags" => ["vegetarian"]],
];

$main_courses = [
    "Grilled Salmon" => ["price" => 18.99, "desc" => "Salmon with lemon butter sauce", "tags" => []],
    "Vegetable Curry" => ["price" => 14.50, "desc" => "Mixed veggie curry with rice", "tags" => ["vegetarian", "spicy"]],
    "Steak" => ["price" => 22.99, "desc" => "Juicy ribeye steak", "tags" => []],
];

$desserts = [
    "Cheesecake" => ["price" => 7.99, "desc" => "Classic New York cheesecake", "tags" => ["vegetarian"]],
    "Chocolate Lava Cake" => ["price" => 8.50, "desc" => "Warm cake with molten center", "tags" => ["vegetarian"]],
];

function displayCategory($title, $items) {
    echo "<h2>$title</h2><ul>";
    $totalPrice = 0; $count = 0;

    foreach ($items as $name => $details) {
        $price = $details["price"];
        $desc = $details["desc"];
        $tags = $details["tags"];

        $indicators = "";
        if (in_array("spicy", $tags)) $indicators .= " 🌶";
        if (in_array("vegetarian", $tags)) $indicators .= " 🥦";

        echo "<li><strong>$name</strong> - \$$price $indicators <br><em>$desc</em></li>";
        $totalPrice += $price; $count++;
    }

    $avg = $count > 0 ? round($totalPrice / $count, 2) : 0;
    echo "</ul><p><em>Total items: $count | Average price: \$$avg</em></p><hr>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Menu</title>
    <style>
        body { font-family: Arial; max-width: 700px; margin: 40px auto; }
        h1 { text-align: center; }
        li { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h1>🍽 Restaurant Menu</h1>
    <?php
        displayCategory("Appetizers", $appetizers);
        displayCategory("Main Courses", $main_courses);
        displayCategory("Desserts", $desserts);
    ?>
</body>
</html>
