<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Project Showcase</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>🎓 Student Project Showcase</h1>
  <a href="add_project.php" class="btn">➕ Add New Project</a>
  
  <form method="GET" action="search.php">
    <input type="text" name="query" placeholder="Search by title or domain">
    <button type="submit">Search</button>
  </form>

  <div class="project-list">
    <?php
    $sql = "SELECT * FROM projects ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='project-card'>
                <h2>{$row['title']}</h2>
                <p><b>Domain:</b> {$row['domain']}</p>
                <p><b>Team:</b> {$row['team_members']}</p>
                <a href='{$row['github_link']}' target='_blank'>🔗 View Code</a><br>
                <a href='view_project.php?id={$row['id']}' class='view'>👁️ View Details</a>
            </div>";
        }
    } else {
        echo "<p>No projects found.</p>";
    }
    ?>
  </div>
</body>
</html>
