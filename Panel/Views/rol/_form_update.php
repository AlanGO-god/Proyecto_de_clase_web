<h1>Modificar Rol</h1>
<form method="POST" action="roles.php?action=update&id=<? echo $data['id_rol']; ?>">
    <div class="mb-3">
        <label for="rol" class="form-label">Rol</label>
        <input type="text" class="form-control" id="rol" name="rol"
         placeholder="Ingresa el rol" value="<? echo $data['rol']; ?>" require>
    </div> 
    <div class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>