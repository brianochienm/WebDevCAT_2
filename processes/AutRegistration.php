<?php
   require_once "../configs/DbConn.php";
   
   // Enable error reporting for debugging
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   
   if (isset($_POST["send_AuthorBiography"])) {
       $AuthorId = filter_var($_POST["AuthorId"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       $AuthorFullName = filter_var($_POST["AuthorFullName"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       $AuthorEmail = filter_var($_POST["AuthorEmail"], FILTER_VALIDATE_EMAIL);
       $AuthorAddress = addslashes($_POST["AuthorAddress"]);
       $AuthorBiography = addslashes($_POST["AuthorBiography"]);
       $AuthorDateOfBirth = $_POST["AuthorDateOfBirth"];
       $AuthorSuspended = $_POST["AuthorSuspended"];  // Assuming it's a boolean value
   
       // Validate the email and ID
       if (!$AuthorEmail || !filter_var($AuthorId, FILTER_VALIDATE_INT)) {
           die("Invalid email address or ID");
       }
   
       $stmt = $pdo->prepare("INSERT INTO authorstb (AuthorId, AuthorFullName, AuthorEmail, AuthorAddress, AuthorBiography, AuthorDateOfBirth, AuthorSuspended) VALUES (?, ?, ?, ?, ?, ?, ?)");
       $stmt->execute([$AuthorId, $AuthorFullName, $AuthorEmail, $AuthorAddress, $AuthorBiography, $AuthorDateOfBirth, $AuthorSuspended]);
   
       header("Location: ../ViewAuthors.php");
       
   }
   
   
   
   
   
   
   if (isset($_POST["update_AuthorBiography"])) {
       $AuthorId = filter_var($_POST["AuthorId"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       $AuthorFullName = filter_var($_POST["AuthorFullName"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       $AuthorEmail = filter_var($_POST["AuthorEmail"], FILTER_VALIDATE_EMAIL);
       $AuthorAddress = addslashes($_POST["AuthorAddress"]);
       $AuthorBiography = addslashes($_POST["AuthorBiography"]);
       $AuthorDateOfBirth = addslashes($_POST["AuthorDateOfBirth"]);
       $AuthorSuspended = addslashes($_POST["AuthorSuspended"]);
   
       // Validate the email and ID
       if (!$AuthorEmail || !$AuthorId) {
           die("Invalid email address or ID");
       }
   
       // Update the author information
       $stmt = $pdo->prepare("UPDATE authorstb SET AuthorFullName=?, AuthorEmail=?, AuthorAddress=?, AuthorBiography=?, AuthorDateOfBirth=?, AuthorSuspended=? WHERE AuthorId=? LIMIT 1");
       $stmt->execute([$AuthorFullName, $AuthorEmail, $AuthorAddress, $AuthorBiography, $AuthorDateOfBirth, $AuthorSuspended, $AuthorId]);
   
       header("Location: ../ViewAuthors.php");
       exit();
   }
   
   
   
   // Fetch existing author details for the given AuthorId
   if (isset($_GET["EditId"])) {
       $stmt = $pdo->prepare("SELECT * FROM authorstb WHERE AuthorId=? LIMIT 1");
       $stmt->execute([$_GET["EditId"]]);
       $author = $stmt->fetch();
   
       // Check if the author exists
       if (!$author) {
           die("Author not found");
       }
   } else {
       // If EditId is not set, redirect or handle accordingly
       header("Location: ../ViewAuthors.php");
       exit();
   }
   
   
   
   
   
   ?>
