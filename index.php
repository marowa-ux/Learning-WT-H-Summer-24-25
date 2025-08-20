<html>
    <body>
        <div class="container">
           <?php
           // Try changing these variables!
           $name = "Your Name Here";
           $course = "Web Technologies";
           $current_time = date("H:i:s");

           echo "<h1>Welcome, $name!</h1>";
           echo "<p>You're learning: <strong>$course</strong></p>";
           echo "<p>Current time: $current_time</p>";

           // Fun fact display
           $php_birthday = "June 8, 1995";
           echo "<hr>";
           echo "<p><em>Fun Fact: PHP was officially released on $php_birthday - it's older than Google!</em></p>";
           ?>
        </div>
    </body>
</html>