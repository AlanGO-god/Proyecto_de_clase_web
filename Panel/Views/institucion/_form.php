<h1>Nueva Institucion</h1>
<form method="post" action="instituciones.php?action=create">
    <div class="mb-3">
        <label for="Institucion" class="form-label">Nombre de la Institucion</label>
        <input type="text" class="form-control" id="institucion" name="institucion"
         placeholder="Ingresa el nombre" require>
    </div> 
    <div class="mb-3">
        <label for="logotipo" class="form-label">logotipo</label>
        <input type="text" class="form-contgrol" id="logotipo" name="logotipo"
         placeholder="alogotio.png">
    </div>
    <dic class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>