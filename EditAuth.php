<?php
require_once "configs/DbConn.php";

?>

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
    <h1>Update</h1>
</div>
<!-- the main content section starts here -->
<div class="row">
    <div class="content">
<h3>Update Message content</h3>

<?php
if(isset($_GET["EditId"])){
    $stmt = $pdo->prepare("SELECT * FROM authorstb WHERE AuthorId=? LIMIT 1");
    $stmt->execute([$_GET["EditId"]]);
    $author = $stmt->fetch(); // Changed variable name from $messages to $author
}

// Check if EditId is set and the author exists
if(isset($_GET["EditId"]) && $author) {
?>

<form action="processes/AutRegistration.php" method="POST">
    <label for="AuthorId">Author Id:</label><br>
    <input type="text" name="AuthorId" id="AuthorId" value="<?php echo $author["AuthorId"]; ?>" readonly /><br><br>

    <label for="AuthorFullName">Author Full Name:</label><br>
    <input type="text" name="AuthorFullName" id="AuthorFullName" value="<?php echo $author["AuthorFullName"]; ?>" maxlength="60" /><br><br>

    <label for="AuthorEmail">Author Email:</label><br>
    <input type="email" name="AuthorEmail" id="AuthorEmail" value="<?php echo $author["AuthorEmail"]; ?>" maxlength="60" /><br><br>

    <label for="AuthorAddress">Author Address:</label><br>
    <input type="text" name="AuthorAddress" id="AuthorAddress" value="<?php echo $author["AuthorAddress"]; ?>" maxlength="60" /><br><br>

    <label for="AuthorDateOfBirth">Date Of Birth:</label><br>
    <input type="date" name="AuthorDateOfBirth" id="AuthorDateOfBirth" value="<?php echo $author["AuthorDateOfBirth"]; ?>" required /><br><br>

    <label for="AuthorBiography">Author Biography:</label><br>
    <textarea name="AuthorBiography" id="AuthorBiography" rows="10" required><?php echo $author["AuthorBiography"]; ?></textarea><br><br>
    
    <!-- Hidden input for "not suspended" -->
    <input type="hidden" name="AuthorSuspended" value="0">

    <!-- Checkbox for "suspended" -->
    <input type="checkbox" name="AuthorSuspended" id="AuthorSuspended" value="1" <?php echo ($author["AuthorSuspended"] == 1) ? 'checked' : ''; ?>>
    <label for="AuthorSuspended">Suspended</label><br><br>

    <input type="submit" name="update_AuthorBiography" value="Update AuthorBiography" />
    <a href="ViewAuthors.php">Cancel</a>
</form>


<?php
} else {
    // Handle the case where EditId is not set or the author does not exist
    echo "Author not found or EditId not set";
}
?>
    </div>
    <!-- Replace the content in the sidebar with a creative and welcoming message -->
<div class="sidebar">
    <h3>Welcome to the Author's Corner!</h3>
    <p>
        📚 Explore the fascinating world of our featured authors. Each story is a journey waiting to be discovered.
    </p>
    <p>
        🌟 Meet <?php echo $author["AuthorFullName"]; ?>, an inspiring wordsmith creating magic with every pen stroke.
    </p>
    <p>
        📖 Dive into their captivating biography, and feel the essence of their literary adventures.
    </p>
    <p>
        ✨ Thank you for being a part of our community. Happy reading!
    </p>
</div>
    
</div>
<!-- the main content section ends here -->
<div class="footer">
copyright &copy; DBIT 2023
</div>
</body>
</html>








