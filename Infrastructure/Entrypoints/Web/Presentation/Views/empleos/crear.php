<h1>Registrar Nuevo Empleo</h1>
<form method="POST" action="index.php?route=empleos.store" style="max-width: 500px;">
    <div><label>Trabajador (Nombre):</label><br><input type="text" name="trabajador" required style="width:100%; padding:8px;"></div><br>
    <div><label>Cargo:</label><br><input type="text" name="nombre" required style="width:100%; padding:8px;"></div><br>
    <div><label>Categoría:</label><br><input type="text" name="categoria" required style="width:100%; padding:8px;"></div><br>
    <div><label>Área de Trabajo:</label><br><input type="text" name="area_trabajo" required style="width:100%; padding:8px;"></div><br>
    <div><label>Empresa:</label><br><input type="text" name="empresa" required style="width:100%; padding:8px;"></div><br>
    <div><label>Nivel:</label><br><input type="text" name="nivel" required style="width:100%; padding:8px;"></div><br>
    <div><label>Sueldo:</label><br><input type="number" step="0.01" name="sueldo" required style="width:100%; padding:8px;"></div><br>
    <div><label>Funciones:</label><br><textarea name="funciones" style="width:100%; padding:8px;"></textarea></div><br>
    <div><label>Cargo del Jefe:</label><br><input type="text" name="cargo_jefe" style="width:100%; padding:8px;"></div><br>
    <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;">Guardar Empleo</button>
    <a href="index.php?route=empleos.listar">Cancelar</a>
</form>