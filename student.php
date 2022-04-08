<?php

require 'vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.php" media="screen">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Grape+Nuts&display=swap');
        .class-details{
            margin: 0 auto;
    padding-top: 20px;
    padding-bottom: 17px;
    width: 39%;
        }
        .class-details form input{
            background-color: #9dab68;
            padding: 10px;
            outline: none;
            border: none;
            border-radius: 6px;
            margin-right: 12px;
        }
        .class-details form input:hover{
            color: #9dab68;
            background-color: white;
            /* border-bottom: 5px solid #75cde1; */
        }
        .main-form form input{
            padding: 5px;
    /* color: black; */
    border: none;
    background: transparent;
    border-bottom: 1px solid #111170;
    margin-left: 10px;
}
        }
        .main-form form select{
            padding: 6px;
            margin-left: 10px;
        }
        .main-form{
            margin: 0px auto;
            padding-top: 53px;
             width: 50%;
        }
        .main-form form input#submit{
            border-radius: 6px;
    padding: 7px;
    border: none;
    margin-left: 10px;
    background-color: #9dab68;
           
        }
        .main-form form input#submit:hover{
            color: #9dab68;
            background-color: white;
        }
        .main-class{
            background-color: khaki;
        }
        p.please{
            font-size: 56px;
            font-family: 'Grape Nuts', cursive;
    margin: 51px auto;
    width: 44%;
    animation:blinking 1.5s infinite;
        }
        @keyframes blinking{
0%{   color: red;   }
47%{   color: green; }
62%{   color: orange; }
97%{   color:transparent; }
100%{  color: #000;   }
}
.name p{
    margin: 17px auto;
    width: 34%;
    font-size: 33px;
    font-family: 'Grape Nuts', cursive;
}
}
    </style>
<head>
</head>
<body>
    <nav>
        <div class="name">
            <p>Welcome To Sacred Heart Academy</p>
        </div>
    </nav>
    <main class="main-class">
    <div class="main-form">
        <form action="" method="post">
            <input name="name" type="text" placeholder="enter your name">
            <input name="age" type="number" placeholder="enter your age">
            <select name="class" id="color">
	<option value="">--- Choose a class ---</option>
	<option value="1">One</option>
	<option value="2">Two</option>
	<option value="3">Three</option>
</select>
            <input id="submit" name="submit" type="submit" value="submit">
        </form>
        

    </div>
    <div class="class-details">
        <br>
        <form action="" method="post">
            <input type="submit" value="class 1 details" name="class1">
            <input type="submit" value="class 2 details" name="class2">
            <input type="submit" value="class 3 details" name="class3">
            <input type="submit" value="Clear all" name="clear">
        </form>
    </div>
    </main>

</body>
</html>

<?php
//...............................CONNECTING TO DATABASE.....................................
$client = new MongoDB\Client("mongodb://localhost:27017");
//...............................CREATING DATABASE CALLED SCHOLL........................
$db = $client->school;
//..............................CREATING COLLECTIONS.................................
$collection1 = $db->class1;
$collection2 = $db->class2;
$collection3 = $db->class3;

// ................................FORM POST DETAILS..................................
$name= $_POST['name'];
$class = $_POST['class'];
$age = $_POST['age'];

//.................................FORM SUBMIT ACTIONS.....................................
if(isset($_POST['submit'])){
    switch ($class) {
        case '1':
            $resultOne = $collection1->insertOne(['Name'=> $name, 'Class' => $class, 'Age' => $age]);
            break;
        case '2':
            $resultTwo = $collection2->insertOne(['Name'=> $name, 'Class' => $class, 'Age' => $age]);
            break;
        case '3':
            $resultTwo = $collection3->insertOne(['Name'=> $name, 'Class' => $class, 'Age' => $age]);
            break;
        default:
            ?><p class="please"><?php 
            echo "please select your class";
           ?> <p><?php
            break;
    }

}

// ....................................CLASS ONE DETAILS.......................................... 

if(isset($_POST['class1'])){
    
    $result1 = $collection1->find();
            echo "<table>";
            echo "<tr>";
            echo "<th>name of the students</th>";
            echo "<th>Age</th>";
            echo "<th>class</th>";
            echo "</tr>";
            
    foreach($result1 as $show){
            echo "<tr>";
            echo "<td>" .  $show['Name'] . "</td>";
            echo "<td>" .  $show['Age'] . "</td>";
            echo "<td>" .  $show['Class'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
}

// ...............................class two details........................................

if(isset($_POST['class2'])){
    
    $result1 = $collection2->find();
            echo "<table>";
            echo "<tr>";
            echo "<th>name of the students</th>";
            echo "<th>Age</th>";
            echo "<th>class</th>";
            echo "</tr>";
            
    foreach($result1 as $show){
            echo "<tr>";
            echo "<td>" .  $show['Name'] . "</td>";
            echo "<td>" .  $show['Age'] . "</td>";
            echo "<td>" .  $show['Class'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
}

// ..................................   class three details.................................

if(isset($_POST['class3'])){
    
    $result1 = $collection3->find();
            echo "<table>";
            echo "<tr>";
            echo "<th>name of the students</th>";
            echo "<th>Age</th>";
            echo "<th>class</th>";
            echo "</tr>";
            
    foreach($result1 as $show){
            echo "<tr>";
            echo "<td>" .  $show['Name'] . "</td>";
            echo "<td>" .  $show['Age'] . "</td>";
            echo "<td>" .  $show['Class'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
}

// ........................clear everything......................................

if(isset($_POST['clear'])){

    $result= $client->dropDatabase('school');
    ?><p class="please"><?php 
            echo "Data has been cleared successfully";
           ?> <p><?php
}


    





























?>