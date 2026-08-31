<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Text Translator</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>Text Translator</h1>
        <p class="subtitle">Translate your text easily</p>

        <div class="translator">

            <div class="box">

                <label>Enter Text</label>

                <textarea id="text" placeholder="Write something here..."></textarea>

            </div>

            <div class="languages">

                <select id="source_language">
                    <option value="auto">Detect Language</option>
                    <option value="en">English</option>
                    <option value="ur">Urdu</option>
                    <option value="hi">Hindi</option>
                    <option value="ar">Arabic</option>
                    <option value="fr">French</option>
                    <option value="de">German</option>
                    <option value="es">Spanish</option>
                </select>

                <span>→</span>

                <select id="target_language">
                    <option value="en">English</option>
                    <option value="ur">Urdu</option>
                    <option value="hi">Hindi</option>
                    <option value="ar">Arabic</option>
                    <option value="fr">French</option>
                    <option value="de">German</option>
                    <option value="es">Spanish</option>
                </select>

            </div>

            <button onclick="translateText()">Translate</button>
            <a href="history.php" class="history-btn">
                View Translation History
            </a>

            <div class="box">

                <label>Translation</label>

                <textarea
                    id="result"
                    placeholder="Translation will appear here..."
                    readonly></textarea>

            </div>

        </div>

    </div>

    <script src="script.js"></script>

</body>

</html>