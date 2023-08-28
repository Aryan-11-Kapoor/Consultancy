<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Bionic Reading Generator</title>
</head>
<center>

    <body bgcolor="#f2e090">

        <body background="../img/foc3.png">
            <background backgro></background>
            <h1>Bionic Reading Generator</h1>
            <textarea id="input" rows="20" cols="40"></textarea>
            <br />
            <div class="btn-group" role="group" aria-label="Basic example">
                <button id="generate" class="btn btn-success">Generate</button>
                <button id="clear" class="btn btn-danger">Clear</button>
                <button id="home" href="../index.php" class="btn btn-primary">Home</button>
                <footer>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body" class="col-md-5 order-md-5">
                    <h5 class="card-title">Output</h5>
                    <p style="text-align:justify " id="output"></p>
                </div>
            </div>
            </footer>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

            <script>
                var input = document.getElementById('input');
                var result = document.getElementById('output');
                var generate = document.getElementById('generate');
                var clear = document.getElementById('clear');
                var home = document.getElementById('home');

                clear.addEventListener('click', function() {
                    input.value = '';
                    result.innerHTML = '';
                });

                generate.addEventListener('click', function() {
                    var words = input.value.split(' ');
                    var output = '';
                    for (var i = 0; i < words.length; i++) {
                        output += '<b>' + words[i].slice(0, words[i].length / 2) + '</b>' + words[i].slice(words[i].length / 2, words[i].length) + ' ';
                    }
                    result.innerHTML = output;



                });
                home.addEventListener('click', function() {
                    document.location.href = "../patient/index.php"
                })
            </script>
            <style>
                body {
                    background-repeat: no-repeat;
                    background-size: cover;

                }
            </style>
        </body>
</center>

</html>
<?php

//learn from w3schools.com

session_start();

if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'p') {
        header("location: ../login.php");
    } else {
        $useremail = $_SESSION["user"];
    }
} else {
    header("location: ../login.php");
}


//import database
include("../connection.php");


?>