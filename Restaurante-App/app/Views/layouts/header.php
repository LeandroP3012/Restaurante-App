<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="canonical" href="https://demo-basic.adminkit.io/" />
</head>
<script src="<?= base_url('js/app.js') ?>"></script>
<body>
    
<script>
            document.addEventListener("DOMContentLoaded", function () {
    const themeToggle = document.getElementById("themeToggle");
    const themeLink = document.createElement("link");
    themeLink.rel = "stylesheet";
    themeLink.href = "<?= base_url('css/dark.css') ?>"; // Ruta a tu dark.css
    themeLink.id = "dark-theme";

    // Verifica si el usuario ya activó el modo oscuro
    if (localStorage.getItem("darkMode") === "enabled") {
        document.head.appendChild(themeLink);
        themeToggle.checked = true;
    }

    themeToggle.addEventListener("change", function () {
        if (themeToggle.checked) {
            document.head.appendChild(themeLink);
            localStorage.setItem("darkMode", "enabled");
        } else {
            document.getElementById("dark-theme")?.remove();
            localStorage.setItem("darkMode", "disabled");
        }
    });
});

        </script>