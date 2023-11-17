<?php
   require_once "configs/DbConn.php";
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cat2</title>
      <link rel="stylesheet" href="CSS/style.css">
   </head>
   <body>
      <!-- top navigation starts here -->
      <?php require "navigation.php"; ?>
      <!-- top navigation ends here -->
      <div class="header">
         <h1>Database</h1>
      </div>
      <!-- the main content section starts here -->
      <div class="row">
         <div class="content">
            <h3>Authors List</h3>
            <?php
               // Modify the SQL query to include an ORDER BY clause
               $stmt = $pdo->query("SELECT * FROM authorstb ORDER BY AuthorFullName ASC");
               $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
               ?>
            <table class="table table-striped table-hover">
               <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">AuthorId</th>
                     <th scope="col">AuthorFullName</th>
                     <th scope="col">AuthorEmail</th>
                     <th scope="col">AuthorAddress</th>
                     <th scope="col">AuthorDateOfBirth</th>
                     <th scope="col">AuthorBiography</th>
                     <th scope="col">AuthorSuspended</th>
                     <th scope="col">Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     if ($authors) {
                       $sn = 1;
                       foreach ($authors as $author) {
                     ?>
                  <tr>
                     <th scope="row"><?php echo $sn; $sn++; ?></th>
                     <td><?php echo $author["AuthorId"]; ?></td>
                     <td><?php echo $author["AuthorFullName"]; ?></td>
                     <td><?php echo $author["AuthorEmail"]; ?></td>
                     <td><?php echo $author["AuthorAddress"]; ?></td>
                     <td><?php echo $author["AuthorDateOfBirth"]; ?></td>
                     <td>
                        <?php
                           // Display a truncated version of AuthorBiography
                           $shown_string = implode(' ', array_slice(str_word_count(addslashes($author["AuthorBiography"]), 2), 0, 5)) . ' ... ';
                           echo $shown_string;
                           ?>
                     </td>
                     <td><?php echo $author["AuthorSuspended"]; ?></td>
                     <td>
                        [<a href="EditAuth.php?EditId=<?php echo $author["AuthorId"]; ?>">Edit</a>]
                        [<a href="DelAuth.php?DelId=<?php echo $author["AuthorId"]; ?>" OnClick="return confirm('Are you sure you want to delete the author from the database?');">Del</a>]
                     </td>
                  </tr>
                  <?php
                     }
                     }
                     ?>
               </tbody>
            </table>
         </div>
      </div>
      <!-- the main content section ends here -->
      <div class="footer">
         copyright &copy; DBIT 2023
      </div>
   </body>
</html>
