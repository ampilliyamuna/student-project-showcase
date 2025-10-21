<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Project Details</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM projects WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="project-details">
  <h1><?= $row['title']; ?></h1>
  <p><b>Domain:</b> <?= $row['domain']; ?></p>
  <p><b>Team Members:</b> <?= $row['team_members']; ?></p>
  <p><b>Description:</b> <?= nl2br($row['description']); ?></p>
  <p><a href="<?= $row['github_link']; ?>" target="_blank">🔗 Project Link</a></p>
  <a href="index.php">⬅ Back</a>
</div>
</body>
</html>
