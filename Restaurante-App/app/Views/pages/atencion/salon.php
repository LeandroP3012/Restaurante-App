<!-- Mejorada interfaz de gestión de mesas -->
<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Gestión de Mesas en el Salón</h1>
        
        <div class="row">
            <!-- Sección de mesas -->
            <div class="col-md-6">
                <div class="row" id="mesasContainer">
                    <!-- Mesas generadas dinámicamente -->
                </div>
            </div>

            <!-- Panel lateral de categorías, productos y pedido -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        Pedido - Mesa <span id="mesaSeleccionada">#</span>
                        <div class="mt-2">
                            <label>Adultos: <input type="number" id="adultos" min="0" class="form-control d-inline w-25"></label>
                            <label>Niños: <input type="number" id="ninos" min="0" class="form-control d-inline w-25"></label>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Categorías -->
                        <div class="btn-group d-flex flex-wrap mb-3" id="categoriasContainer">
                            <button class="btn btn-outline-primary" onclick="cargarProductos('bebidas')">Bebidas</button>
                            <button class="btn btn-outline-primary" onclick="cargarProductos('parrillas')">Parrillas</button>
                            <button class="btn btn-outline-primary" onclick="cargarProductos('pollos')">Pollos</button>
                            <button class="btn btn-outline-primary" onclick="cargarProductos('piqueos')">Piqueos</button>
                        </div>
                        
                        <!-- Productos -->
                        <div id="productosContainer" class="row">
                            <!-- Productos generados dinámicamente -->
                        </div>

                        <!-- Pedido Actual -->
                        <h5 class="mt-3">Pedido Actual</h5>
                        <ul class="list-group" id="pedidoContainer"></ul>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-success w-100" onclick="finalizarPedido()">Finalizar Pedido</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
let mesaSeleccionada = null;
let pedidoActual = [];

document.addEventListener("DOMContentLoaded", function() {
    cargarMesas();
});

function cargarMesas() {
    fetch("<?= base_url('atencion/salon/getMesas') ?>")
    .then(response => response.json())
    .then(mesas => {
        let container = document.getElementById('mesasContainer');
        container.innerHTML = "";

        mesas.forEach(mesa => {
            let estadoClase = mesa.estado === 'ocupada' ? 'bg-danger' : 'bg-success';
            let deshabilitado = mesa.estado === 'ocupada' ? 'pointer-events: none; opacity: 0.5;' : '';

            let mesaHTML = `
                <div class="col-md-4">
                    <div class="card text-center p-2" 
                        onclick="${mesa.estado !== 'ocupada' ? `seleccionarMesa(${mesa.id}, '${mesa.numero_mesa}', ${mesa.capacidad})` : ''}"
                        style="${deshabilitado}">
                        <img src="<?= base_url('img/mesa.svg') ?>" class="img-fluid" alt="Mesa">
                        <div class="${estadoClase} text-white px-2 py-1 rounded">
                            Mesa ${mesa.numero_mesa} (${mesa.capacidad} pers.)
                        </div>
                    </div>
                </div>
            `;
            container.innerHTML += mesaHTML;
        });
    });
}

function seleccionarMesa(mesaId, mesaNumero, capacidad) {
    mesaSeleccionada = mesaId;
    document.getElementById("mesaSeleccionada").innerText = mesaNumero;
    pedidoActual = [];
    document.getElementById("adultos").value = Math.floor(capacidad * 0.7);
    document.getElementById("ninos").value = Math.floor(capacidad * 0.3);
    actualizarPedido();
}

function cargarProductos(categoria) {
    let productos = {
        'bebidas': ['Coca Cola', 'Jugo Natural', 'Agua'],
        'parrillas': ['Parrilla Mixta', 'Costillas BBQ'],
        'pollos': ['Pollo a la brasa', 'Pechuga a la plancha'],
        'piqueos': ['Tequeños', 'Alitas BBQ']
    };
    
    let container = document.getElementById('productosContainer');
    container.innerHTML = "";
    productos[categoria].forEach(prod => {
        container.innerHTML += `
            <div class='col-6 text-center'>
                <button class='btn btn-outline-secondary w-100' onclick="agregarProducto('${prod}')">
                    ${prod}
                </button>
            </div>
        `;
    });
}

function agregarProducto(nombre) {
    if (!mesaSeleccionada) {
        alert("Seleccione una mesa antes de agregar productos.");
        return;
    }
    
    let index = pedidoActual.findIndex(item => item.nombre === nombre);
    
    if (index !== -1) {
        pedidoActual[index].cantidad += 1;
    } else {
        pedidoActual.push({ nombre, cantidad: 1 });
    }
    
    actualizarPedido();
}

function modificarCantidad(index, cantidad) {
    if (pedidoActual[index].cantidad + cantidad > 0) {
        pedidoActual[index].cantidad += cantidad;
    } else {
        pedidoActual.splice(index, 1);
    }
    actualizarPedido();
}

function actualizarPedido() {
    let container = document.getElementById('pedidoContainer');
    container.innerHTML = "";
    
    pedidoActual.forEach((item, index) => {
        let itemHTML = `
            <li class="list-group-item d-flex justify-content-between align-items-center">
                ${item.nombre} 
                <div>
                    <button class="btn btn-sm btn-light" onclick="modificarCantidad(${index}, -1)">➖</button>
                    <span class="mx-2">${item.cantidad}</span>
                    <button class="btn btn-sm btn-light" onclick="modificarCantidad(${index}, 1)">➕</button>
                    <button class="btn btn-sm btn-danger" onclick="modificarCantidad(${index}, -${item.cantidad})">🗑️</button>
                </div>
            </li>
        `;
        container.innerHTML += itemHTML;
    });
}


</script>

<?= $this->endSection() ?>
