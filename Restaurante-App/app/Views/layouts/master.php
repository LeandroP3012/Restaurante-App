<body>
    <?= view('layouts/header') ?> <!-- Cargar Header primero -->

    <div class="wrapper">
        <?= view('layouts/sidebar') ?> <!-- Sidebar -->

        <div class="main">
            <?= view('layouts/nav') ?> <!-- Navbar -->
            <?= $this->renderSection('content') ?> <!-- Aquí se insertará el contenido dinámico -->
            <?= view('layouts/footer') ?> <!-- Footer -->
        </div>
    </div>
</body>
