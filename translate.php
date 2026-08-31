<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $text = trim($_POST["text"] ?? "");
    $source = $_POST["source_language"] ?? "auto";
    $target = $_POST["target_language"] ?? "en";

    if ($text === "") {
        echo "Please enter some text.";
        exit;
    }

    if ($source === "auto") {
        $source = "en";
    }

    if ($source === $target) {
        $translatedText = $text;
    } else {

        $url = "https://api.mymemory.translated.net/get?q=" .
            urlencode($text) .
            "&langpair=" .
            urlencode($source . "|" . $target);

        $response = @file_get_contents($url);

        if ($response === false) {
            echo "Translation API error.";
            exit;
        }

        $data = json_decode($response, true);

        if (
            isset($data["responseData"]["translatedText"]) &&
            $data["responseData"]["translatedText"] !== ""
        ) {
            $translatedText = $data["responseData"]["translatedText"];
        } else {
            echo "Translation failed.";
            exit;
        }
    }

    // Save in database
    $stmt = $conn->prepare(
        "INSERT INTO translations
        (original_text, translated_text, source_language, target_language)
        VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "ssss",
        $text,
        $translatedText,
        $source,
        $target
    );

    if ($stmt->execute()) {
        echo $translatedText;
    } else {
        echo "Database error: " . $stmt->error;
    }

    $stmt->close();
}

?>