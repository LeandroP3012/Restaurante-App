
<body>
<div class="wrapper">
    <?= view('layouts/sidebar') ?> <!-- Sidebar -->

    <div class="main"> 
        <?= view('layouts/nav') ?> <!-- Navbar -->
        <?= view('layouts/header') ?> <!-- Header -->
        
        <div class="content">
            <!-- Aquí va el contenido dinámico -->
        </div>

        <?= view('layouts/footer') ?> <!-- Footer -->
    </div>
</div>

</body>
</html>
