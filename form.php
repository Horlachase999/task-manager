<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>get method example</title>
  <link rel="stylesheet" href="form.css">
</head>
<body>
  <div class="container">
  <h1>search product</h1>
  <form action="get_handler.php" method="GET">
    <label for="search">enter a keyword:</label>
    <input type="text" id="search" name="keyword" required>
    <button type="submit">search</button>
  </form>
  </div>
</body>
</html>