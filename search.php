<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Results</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>🔎 Search Results</h1>
  <a href="index.php">⬅ Back to Home</a>

  <div class="project-list">
  <?php
  if (isset($_GET['query'])) {
      $search = $_GET['query'];
      $sql = "SELECT * FROM projects WHERE title LIKE '%$search%' OR domain LIKE '%$search%'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo "
              <div class='project-card'>
                <h2>{$row['title']}</h2>
                <p><b>Domain:</b> {$row['domain']}</p>
                <p><b>Team:</b> {$row['team_members']}</p>
                <a href='{$row['github_link']}' target='_blank'>🔗 View Code</a>
              </div>";
          }
      } else {
          echo "<p>No results found for <b>$search</b>.</p>";
      }
  }
  ?>
  </div>
</body>
</html>
