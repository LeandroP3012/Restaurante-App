<?= $this->extend('layouts/master') ?> <!-- Extiende el master -->

<?= $this->section('content') ?> 
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Creación de Mesas Salón</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Agregar Mesa</h5>
                    </div>
                    <div class="card-body">
                        <form id="mesaForm">
                            <div class="mb-3">
                                <label for="nombreMesa" class="form-label">Número de Mesa</label>
                                <input type="text" class="form-control" id="nombreMesa" required>
                            </div>
                            <div class="mb-3">
                                <label for="capacidadMesa" class="form-label">Capacidad</label>
                                <input type="number" class="form-control" id="capacidadMesa" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Mesa</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Mesas Registradas</h5>
                    </div>
                    <div class="card-body">
                        <div class="row" id="mesasContainer">
                            <!-- Aquí se mostrarán las mesas -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .mesa-card {
        position: relative;
        overflow: hidden;
        text-align: center;
        padding: 10px;
    }
    .mesa-card img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 10px;
    }
    .numero-mesa {
        position: absolute;
        top: 10px;
        left: 10px;
        background: red;
        color: white;
        font-weight: bold;
        padding: 10px;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .capacidad-mesa {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        background: blue;
        color: white;
        font-weight: bold;
        padding: 10px;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    cargarMesas();
});

document.getElementById('mesaForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    let formData = new FormData();
    formData.append('numero_mesa', document.getElementById('nombreMesa').value);
    formData.append('capacidad', document.getElementById('capacidadMesa').value);

    fetch("<?= base_url('configuracion/salon/store') ?>", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            cargarMesas();
            document.getElementById('mesaForm').reset();
        } else {
            alert("Error al guardar la mesa.");
        }
    });
});

function cargarMesas() {
    fetch("<?= base_url('configuracion/salon/getMesas') ?>")
    .then(response => response.json())
    .then(mesas => {
        let container = document.getElementById('mesasContainer');
        container.innerHTML = "";
        
        mesas.forEach(mesa => {
            let mesaHTML = `
                <div class="col-md-4">
                    <div class="card text-center p-3 position-relative">
                        <img src="<?= base_url('img/mesa.svg') ?>" class="img-fluid" width="100%" alt="Mesa">
                        
                        <!-- Número de mesa en rectángulo -->
                        <div class="position-absolute top-0 start-0 bg-danger text-white px-3 py-1 fw-bold rounded" style="border-radius: 5px;">
                            Mesa ${mesa.numero_mesa}
                        </div>

                        <!-- Capacidad de la mesa (puede seguir siendo circular o rectangular) -->
                        <div class="position-absolute bottom-0 start-50 translate-middle-x bg-secondary text-white px-3 py-1 rounded" style="border-radius: 5px;">
                            Cap: ${mesa.capacidad}
                        </div>
                    </div>
                </div>
            `;
            container.innerHTML += mesaHTML;
        });
    });
}

</script>


<?= $this->endSection() ?> 
