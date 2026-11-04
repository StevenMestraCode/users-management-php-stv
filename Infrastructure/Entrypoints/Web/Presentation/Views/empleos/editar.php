<h1>Editar Empleo</h1>
<br>
<form method="POST" action="index.php?route=empleos.actualizar">
    <!-- Este campo oculto es VITAL: le envía el ID del empleo al controlador para saber cuál actualizar -->
    <input type="hidden" name="id" value="<?= $empleo->id()->value() ?>">
    
    <div>
        <label>Nombre del Cargo:</label><br>
        <!-- El atributo "value" precarga el dato actual del empleo -->
        <input type="text" name="nombre" value="<?= htmlspecialchars($empleo->nombre()->value()) ?>" required>
    </div>
    <br>
    <div>
        <label>Categoría:</label><br>
        <input type="text" name="categoria" value="<?= htmlspecialchars($empleo->categoria()) ?>" required>
    </div>
    <br>
    <div>
        <label>Área de Trabajo:</label><br>
        <input type="text" name="area_trabajo" value="<?= htmlspecialchars($empleo->areaTrabajo()) ?>" required>
    </div>
    <br>
    <div>
        <label>Empresa:</label><br>
        <input type="text" name="empresa" value="<?= htmlspecialchars($empleo->empresa()) ?>" required>
    </div>
    <br>
    <div>
        <label>Nivel:</label><br>
        <input type="text" name="nivel" value="<?= htmlspecialchars($empleo->nivel()) ?>" required>
    </div>
    <br>
    <div>
        <label>Sueldo:</label><br>
        <input type="number" step="0.01" name="sueldo" value="<?= $empleo->sueldo()->value() ?>" required>
    </div>
    <br>
    <div>
        <label>Funciones:</label><br>
        <textarea name="funciones" rows="4" cols="50"><?= htmlspecialchars($empleo->funciones()) ?></textarea>
    </div>
    <br>
    <div>
        <label>Cargo del Jefe:</label><br>
        <input type="text" name="cargo_jefe" value="<?= htmlspecialchars($empleo->cargoJefe()) ?>">
    </div>
    <br>
    <button type="submit" style="padding: 10px; background-color: green; color: white;">Actualizar Empleo</button>
    <a href="index.php?route=empleos.listar">Cancelar</a>
</form>