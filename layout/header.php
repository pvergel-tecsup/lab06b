<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 6 - Películas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary sticky-top border-bottom border-body" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Lab. 6</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Películas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Géneros</a>
                        </li>
                    </ul>
                </div>
                <form class="d-flex" role="search" method="post" action="">
                    <input class="form-control me-2" type="search" placeholder="Búsqueda..." aria-label="Search" name="search" required>
                    <button class="btn btn-outline-light" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </header>
    <div class="container">
        