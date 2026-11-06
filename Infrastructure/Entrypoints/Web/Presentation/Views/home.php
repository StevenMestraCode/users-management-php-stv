<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Principal - CRUDL</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f8f9fa; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1, h2 { color: #333; }
        ul { list-style-type: none; padding: 0; }
        li { margin-bottom: 10px; }
        a { text-decoration: none; color: #007bff; font-size: 16px; }
        a:hover { text-decoration: underline; }
        .section { margin-bottom: 30px; padding-bottom: 15px; border-bottom: 1px solid #eee; }
        .nav-links { margin-bottom: 20px; }
        .nav-links a { margin-right: 15px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav-links">
            <a href="index.php?route=home">Inicio</a>
            <a href="index.php?route=auth.logout" style="color: #dc3545;">Cerrar Sesión</a>
        </div>

        <h1>Menú principal del CRUDL</h1>
        <?php if (!empty($message)): ?>
            <p style="color: green; font-weight: bold;"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <p>Desde aquí podrás acceder a las operaciones del sistema.</p>

        <div class="section">
            <h2>Gestión de Usuarios</h2>
            <ul>
                <li><a href="index.php?route=users.create">C: Registrar usuario</a></li>
                <li><a href="index.php?route=users.index">L: Listar usuarios</a></li>
            </ul>
        </div>

        <div class="section">
            <h2>Gestión de Empleos (Ejercicio 15)</h2>
            <ul>
                <li><a href="index.php?route=empleos.crear">C: Registrar empleo</a></li>
                <li><a href="index.php?route=empleos.listar">L: Listar empleos</a></li>
            </ul>
        </div>
    </div>
</body>
</html>