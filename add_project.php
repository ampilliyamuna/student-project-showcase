<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Project</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Add New Project</h1>
  <form method="POST">
    <input type="text" name="title" placeholder="Project Title" required><br>
    <input type="text" name="domain" placeholder="Domain (e.g., AI, Web)" required><br>
    <input type="text" name="team" placeholder="Team Members" required><br>
    <input type="text" name="github" placeholder="GitHub / Google Drive Link" required><br>
    <textarea name="description" placeholder="Project Description" required></textarea><br>
    <button type="submit" name="submit">Submit</button>
  </form>

  <?php
  if (isset($_POST['submit'])) {
      $title = $_POST['title'];
      $domain = $_POST['domain'];
      $team = $_POST['team'];
      $github = $_POST['github'];
      $desc = $_POST['description'];

      $sql = "INSERT INTO projects (title, description, domain, team_members, github_link)
              VALUES ('$title', '$desc', '$domain', '$team', '$github')";

      if (mysqli_query($conn, $sql)) {
          echo "<p class='success'>✅ Project added successfully!</p>";
      } else {
          echo "<p class='error'>❌ Error: " . mysqli_error($conn) . "</p>";
      }
  }
  ?>
</body>
</html>
