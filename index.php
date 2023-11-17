<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat2</title>
    <link rel="stylesheet" href="CSS/style.css" />
    
    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px;
    }

    main {
        max-width: 800px;
        margin: 20px auto;
        padding: 10px; /* Adjusted padding for a cleaner look */
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        text-align: center; /* Align text to the center within the main container */
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        margin-left: 20px;
    }

    /* Style for email and text input fields */
    input[type="email"],
    input[type="text"],
    textarea {
        width: 65%;
        padding: 10px;
        margin-bottom: 10px;
        border: 2px solid #ccc;
        border-radius: 10px;
        font-size: 16px;
        box-sizing: border-box;
        margin-left: 20px;
    }

    /* Style for the message input field - making it a bit bigger */
    textarea {
        height: 150px;
    }

    input[type="submit"] {
        background-color: #007BFF;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
        margin-left: 20px;
    }

    /* Adjust button style on hover */
    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    footer {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>
</head>
<body>
 <!-- top navigation starts here -->
 <?php require "navigation.php"; ?>
    <!-- top navigation ends here -->
<div class="header">
    <h1>Register here</h1>
</div>
<!-- the main content section starts here -->
<div class="row">
    <div class="content">
<h3 >Main content</h3>



<form action="processes/AutRegistration.php" method="POST">
    <label for="AuthorId">Author Id:</label><br>
    <input type="text" name="AuthorId" id="AuthorId" placeholder="Enter your Id" maxlength="60" required /><br><br>

    <label for="AuthorFullName">Author Full Name:</label><br>
    <input type="text" name="AuthorFullName" id="AuthorFullName" placeholder="Enter your full name" maxlength="60" /><br><br>

    <label for="AuthorEmail">Author Email:</label><br>
    <input type="email" name="AuthorEmail" id="AuthorEmail" placeholder="Enter your email" maxlength="60" /><br><br>

    <label for="AuthorAddress">Author Address:</label><br>
    <input type="text" name="AuthorAddress" id="AuthorAddress" placeholder="Enter your Address" maxlength="60" /><br><br>

    <label for="AuthorDateOfBirth">Date Of Birth:</label><br>
    <input type="date" name="AuthorDateOfBirth" id="AuthorDateOfBirth" required /><br><br>

    <label for="AuthorBiography">Author Biography:</label><br>
    <textarea name="AuthorBiography" id="AuthorBiography" placeholder="Enter your biography" rows="10" required><?php echo isset($author) ? $author["AuthorBiography"] : ''; ?></textarea><br><br>
    

    <!-- Hidden input for "not suspended" -->
    <input type="hidden" name="AuthorSuspended" value="0">

    <!-- Checkbox for "suspended" -->
    <input type="checkbox" name="AuthorSuspended" id="AuthorSuspended" value="1">
    <label for="AuthorSuspended">Suspended</label><br><br>
     

    <input type="submit" name="send_AuthorBiography" value="Send AuthorBiography" />
</form>
</div>
<div class="sidebar">
    <h3>Welcome to the Author's Guild!</h3>
    <p>
        📚 Ready to embark on your literary journey? Join our community of passionate authors and readers.
    </p>
    <p>
        ✒️ Register now to share your unique story with the world. Your words have the power to inspire!
    </p>
    <p>
        🌟 Connect with fellow wordsmiths, explore diverse biographies, and celebrate the art of storytelling.
    </p>
    <p>
        🚀 Your adventure begins here. Register, create, and captivate!
    </p>
</div>
</div>
<!-- the main content section ends here -->
<div class="footer">
copyright &copy; DBIT 2023
</div>
</body>
</html>

