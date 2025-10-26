<h1>Nuevo Rol</h1>
<form method="POST" action="roles.php?action=create">
    <div class="mb-3">
        <label for="rol" class="form-label">Rol</label>
        <input type="text" class="form-control" id="rol" name="rol"
         placeholder="Ingresa el rol" require>
    </div> 
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>