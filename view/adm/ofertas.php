<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Ofertas</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gestión de Ofertas</h1>

        <!-- Formulario para Crear una Oferta -->
        <div class="card mb-4">
            <div class="card-header">
                Crear Oferta
            </div>
            <div class="card-body">
                <form id="create-form">
                    <div class="form-group">
                        <label for="offer-name">Nombre de la Oferta</label>
                        <input type="text" class="form-control" id="offer-name" placeholder="Ingrese el nombre de la oferta" required>
                    </div>
                    <div class="form-group">
                        <label for="offer-description">Descripción</label>
                        <textarea class="form-control" id="offer-description" rows="3" placeholder="Ingrese la descripción de la oferta" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Oferta</button>
                </form>
            </div>
        </div>

        <!-- Formulario para Buscar una Oferta -->
        <div class="card mb-4">
            <div class="card-header">
                Buscar Oferta
            </div>
            <div class="card-body">
                <form id="search-form">
                    <div class="form-group">
                        <label for="search-query">Buscar</label>
                        <input type="text" class="form-control" id="search-query" placeholder="Ingrese el nombre de la oferta a buscar">
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
                <div id="search-results" class="mt-3"></div>
            </div>
        </div>

        <!-- Formulario para Actualizar una Oferta -->
        <div class="card mb-4">
            <div class="card-header">
                Actualizar Oferta
            </div>
            <div class="card-body">
                <form id="update-form">
                    <div class="form-group">
                        <label for="update-id">ID de la Oferta</label>
                        <input type="text" class="form-control" id="update-id" placeholder="Ingrese el ID de la oferta" required>
                    </div>
                    <div class="form-group">
                        <label for="update-name">Nombre de la Oferta</label>
                        <input type="text" class="form-control" id="update-name" placeholder="Ingrese el nuevo nombre de la oferta">
                    </div>
                    <div class="form-group">
                        <label for="update-description">Descripción</label>
                        <textarea class="form-control" id="update-description" rows="3" placeholder="Ingrese la nueva descripción de la oferta"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar Oferta</button>
                </form>
            </div>
        </div>

        <!-- Formulario para Eliminar una Oferta -->
        <div class="card mb-4">
            <div class="card-header">
                Eliminar Oferta
            </div>
            <div class="card-body">
                <form id="delete-form">
                    <div class="form-group">
                        <label for="delete-id">ID de la Oferta</label>
                        <input type="text" class="form-control" id="delete-id" placeholder="Ingrese el ID de la oferta" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Eliminar Oferta</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script>
        document.getElementById('create-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Oferta creada!');
            // Aquí deberías añadir la lógica para manejar el envío de datos a tu servidor.
        });

        document.getElementById('search-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const query = document.getElementById('search-query').value;
            // Aquí deberías añadir la lógica para buscar ofertas.
            document.getElementById('search-results').innerText = `Resultados de búsqueda para: ${query}`;
        });

        document.getElementById('update-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Oferta actualizada!');
            // Aquí deberías añadir la lógica para actualizar la oferta.
        });

        document.getElementById('delete-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Oferta eliminada!');
            // Aquí deberías añadir la lógica para eliminar la oferta.
        });
    </script>
</body>
</html>
