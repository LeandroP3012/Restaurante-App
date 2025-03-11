# Restaurante-App
⿡ Instalar CodeIgniter 4
Abre una terminal y ejecuta:

bash
Copy
Edit
composer create-project codeigniter4/appstarter restaurant-app
Esto creará una carpeta llamada restaurant-app con la estructura básica de CodeIgniter 4.

⿢ Configurar el entorno
Dentro de la carpeta restaurant-app, copia y renombra el archivo .env.example a .env:

bash
Copy
Edit
cd restaurant-app
cp env.example .env
Edita .env y descomenta/modifica estas líneas:

ini
Copy
Edit
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/restaurant-app/public/'
Esto asegura que trabajes en modo desarrollo y establece la URL base.

⿣ Configurar la conexión a MySQL
Edita .env y configura los datos de tu base de datos:

ini
Copy
Edit
database.default.hostname = localhost
database.default.database = restaurant_db
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
Asegúrate de que MySQL esté corriendo y de que tengas creada la base de datos restaurant_db.

⿤ Crear el modelo para "Pedidos"
Ejecuta este comando para generar un modelo:

bash
Copy
Edit
php spark make:model Pedido
Abre app/Models/Pedido.php y modifícalo así:

php
Copy
Edit
<?php

namespace App\Models;
use CodeIgniter\Model;

class Pedido extends Model
{
    protected $table = 'pedidos'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id';
    protected $allowedFields = ['cliente', 'producto', 'cantidad', 'precio', 'estado'];
}
Esto permitirá hacer consultas a la tabla pedidos.

⿥ Crear el controlador de "Pedidos"
Ejecuta:

bash
Copy
Edit
php spark make:controller Pedido
Abre app/Controllers/Pedido.php y edítalo:

php
Copy
Edit
<?php

namespace App\Controllers;
use App\Models\Pedido;
use CodeIgniter\RESTful\ResourceController;

class Pedido extends ResourceController
{
    protected $modelName = 'App\Models\Pedido';
    protected $format    = 'json';

    public function index()
    {
        $model = new Pedido();
        return $this->respond($model->findAll());
    }
}
Esto devuelve todos los pedidos en formato JSON.

⿦ Configurar rutas
Abre app/Config/Routes.php y agrega:

php
Copy
Edit
$routes->get('/api/pedidos', 'Pedido::index');
Ahora tu API estará disponible en:

ruby
Copy
Edit
http://localhost/restaurant-app/public/api/pedidos
⿧ Crear la base de datos y la tabla
Si aún no tienes la tabla pedidos, ejecútala en MySQL:

sql
Copy
Edit
CREATE DATABASE restaurant_db;

USE restaurant_db;

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(100) NOT NULL,
    producto VARCHAR(100) NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    estado ENUM('pendiente', 'completado', 'cancelado') NOT NULL
);

INSERT INTO pedidos (cliente, producto, cantidad, precio, estado)
VALUES 
('Juan Pérez', 'Pizza', 2, 45.00, 'pendiente'),
('María López', 'Hamburguesa', 1, 20.00, 'completado');
⿨ Probar la API
Levanta el servidor de desarrollo:

bash
Copy
Edit
php spark serve
Abre en el navegador:

bash
Copy
Edit
http://localhost:8080/api/pedidos
Si ves los datos en JSON, la API funciona correctamente. 🎉

⿩ Conectar con el frontend (Opcional)
Si necesitas consumir esta API desde un frontend en JavaScript, usa fetch():

js
Copy
Edit
fetch("http://localhost:8080/api/pedidos")
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error("Error:", error));
✅ Conclusión
🔹 Ahora tienes CodeIgniter 4 instalado y conectado con MySQL.
🔹 Puedes obtener pedidos desde http://localhost:8080/api/pedidos.
🔹 Si necesitas agregar, actualizar o eliminar pedidos, dime y te ayudo a extender la API.

¿Te quedó claro o necesitas algo más? 🚀
