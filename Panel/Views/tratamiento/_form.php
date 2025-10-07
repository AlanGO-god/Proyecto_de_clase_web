<h1>Nuevo tratamiento</h1>
<form method="POST" action="tratamiento.php?action=create">
    <div class="mb-3">
        <label for="Institución" class="form-label">Tratamiento</label>
        <input type="text" class="form-control" id="tratamiento" name="tratamiento" placeholder="Escribe el tratamiento" required>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>