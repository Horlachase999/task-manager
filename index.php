<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="wholebody">
      <h1>Task Manager</h1>

    <!-- Add Task Form -->
    <form action="add_task.php" method="POST">
        <input type="text" name="title" placeholder="Enter a new task" required>
        <input type="datetime-local" name="deadline" required>
        <button type="submit">Add Task</button>
    </form>

    <!-- Tasks Table -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Deadline</th>
                <th>Countdown</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td class="<?= $row['status'] == 'completed' ? 'completed' : '' ?>"><?= $row['title'] ?></td>
                    <td><?= $row['deadline'] ?></td>
                    <td class="countdown" data-deadline="<?= $row['deadline'] ?>"></td>
                    <td><?= ucfirst($row['status']) ?></td>
                    <td>
                        <?php if ($row['status'] == 'pending'): ?>
                            <a href="update_task.php?id=<?= $row['id'] ?>">Mark as Complete</a>
                        <?php endif; ?>
                        <a href="delete_task.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script>
    document.querySelectorAll('.countdown').forEach(function (element) {
        const deadline = new Date(element.getAttribute('data-deadline')).getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const timeLeft = deadline - now;

            if (timeLeft < 0) {
                element.textContent = "Expired";
                element.style.color = 'gray';
            } else {
                const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeLeft % (1000 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeLeft % (1000)) / 1000);

                element.textContent = `${days}d ${hours}h ${minutes}m ${seconds}s`;
            }
        }

        updateCountdown();
        setInterval(updateCountdown, 1000); // Update every second
    });
</script>

  </div>
</body>
</html>
