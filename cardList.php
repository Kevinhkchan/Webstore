<!DOCTYPE html>

<html>

<head>
<link rel="stylesheet" type="text/css" href="stylesheets/stylesheet.css"
</head>

<body>
    <img src="images/Design.jpeg" alt="PathtoTCGs Logo" height="250" width="100%">
    <! Navigation Bar -->
    <ul>
        <li><a href="index.php"> Home Screen </a> </li>
        <li><a href="cardList.php"> Cards Available </a> </li>
        <li><a href="about.php">About Page </a> </li>
    </ul>

    <h1> Cards for Sale </h1>

    <h2> How to Order Cards </h2>
        If you would like to purchase any cards, please email me the amount of each card you would like to purchase. <br> <br>

        <b>Email: </b> PathtoTCGs@gmail.com

    <br>
    <br>
    
    <! Conects to database -->
    <?php include '../private/database.php' ?>

    <?php

        // Loads the information into table
        $sql = "SELECT cardName, setName, rarity, cardNumber, artistName, cardCondition, price, quantity FROM cardData";
        
        $cardList = mysqli_query($conn, $sql);
        // Creates the table with table headers
        echo "<table border = 1>

            <tr>
                <th> Card Name </th>
                <th> Set Name </th>
                <th> Rarity </th>
                <th> Card Number </th>
                <th> Artist Name </th>
                <th> Card Condition </th>
                <th> Price </th>
                <th> Quantity </th>
            </tr>";

            // Grabs the "records" from database
            while($record = mysqli_fetch_array($cardList)){
                echo "<tr>";
                    echo "<td>" . $record['cardName'] . "</td>";
                    echo "<td>" . $record['setName'] . "</td>";
                    echo "<td>" . $record['rarity'] . "</td>";
                    echo "<td>" . $record['cardNumber'] . "</td>";
                    echo "<td>" . $record['artistName'] . "</td>";
                    echo "<td>" . $record['cardCondition'] . "</td>";
                    echo "<td>" . "$" . $record['price'] . "</td>";
                    echo "<td>" . $record['quantity'] . "</td>";
                echo "</tr>";
            }
                echo "</table>";

        mysqli_close($conn);
    ?>

</body>

</html>