<?php

include "db.php";

$result = $conn->query(
    "SELECT * FROM translations ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Translation History</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <h1>Translation History</h1>

        <p class="subtitle">View your previous translations</p>

        <div class="translator">

            <?php if ($result->num_rows > 0): ?>

                <?php while ($row = $result->fetch_assoc()): ?>

                    <div class="history-item">

                        <div class="history-heading">
                            Translation
                        </div>

                        <div class="history-content">

                            <div>
                                <span>Original Text</span>
                                <p>
                                    <?= htmlspecialchars($row["original_text"]) ?>
                                </p>
                            </div>

                            <div>
                                <span>Translated Text</span>
                                <p>
                                    <?= htmlspecialchars($row["translated_text"]) ?>
                                </p>
                            </div>

                        </div>

                        <div class="history-footer">

                            <span>
                                <?= htmlspecialchars($row["source_language"]) ?>
                                →
                                <?= htmlspecialchars($row["target_language"]) ?>
                            </span>

                            <span>
                                <?= htmlspecialchars($row["created_at"]) ?>
                            </span>

                        </div>

                    </div>

                <?php endwhile; ?>

            <?php else: ?>

                <div class="empty-history">
                    <p>No translation history found.</p>
                </div>

            <?php endif; ?>

            <a href="index.php" class="back-btn">
                ← Back to Translator
            </a>

        </div>

    </div>

</body>

</html>