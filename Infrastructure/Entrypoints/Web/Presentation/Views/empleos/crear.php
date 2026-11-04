<h1>Registrar Nuevo Empleo</h1>
<br>
<form method="POST" action="index.php?route=empleos.crear">
    <div>
        <label for="nombre">Nombre del Cargo:</label><br>
        <input type="text" id="nombre" name="nombre" required>
    </div>
    <br>
    <div>
        <label for="categoria">Categoría:</label><br>
        <input type="text" id="categoria" name="categoria" required>
    </div>
    <br>
    <div>
        <label for="area_trabajo">Área de Trabajo:</label><br>
        <input type="text" id="area_trabajo" name="area_trabajo" required>
    </div>
    <br>
    <div>
        <label for="empresa">Empresa:</label><br>
        <input type="text" id="empresa" name="empresa" required>
    </div>
    <br>
    <div>
        <label for="nivel">Nivel (Junior, Senior, etc.):</label><br>
        <input type="text" id="nivel" name="nivel" required>
    </div>
    <br>
    <div>
        <label for="sueldo">Sueldo:</label><br>
        <input type="number" step="0.01" id="sueldo" name="sueldo" required>
    </div>
    <br>
    <div>
        <label for="funciones">Funciones:</label><br>
        <textarea id="funciones" name="funciones" rows="4" cols="50"></textarea>
    </div>
    <br>
    <div>
        <label for="cargo_jefe">Cargo del Jefe:</label><br>
        <input type="text" id="cargo_jefe" name="cargo_jefe">
    </div>
    <br>
    <button type="submit">Guardar Empleo</button>
    <a href="index.php?route=empleos.listar">Cancelar</a>
</form>