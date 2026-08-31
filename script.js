function translateText() {

    const text = document.getElementById("text").value;
    const source = document.getElementById("source_language").value;
    const target = document.getElementById("target_language").value;
    const result = document.getElementById("result");

    if (text.trim() === "") {
        alert("Please enter some text.");
        return;
    }

    result.value = "Translating...";

    const formData = new FormData();

    formData.append("text", text);
    formData.append("source_language", source);
    formData.append("target_language", target);

    fetch("translate.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        result.value = data;
    })
    .catch(error => {
        result.value = "Translation failed.";
        console.error(error);
    });
}