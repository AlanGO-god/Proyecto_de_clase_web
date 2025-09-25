<h1>Nueva Institucion</h1>
<form method="POST" action="institucion.php?action=update&id=<?php echo $id; ?>">
    <div class="mb-3">
        <label for="Institucion" class="form-label">Nombre de la Institucion</label>
        <input type="text" class="form-control" id="institucion" name="institutcion" value="<?php echo $data['insituion'];?>" placeholder="TecNM" require>
    </div> 
    <div class="mb-3">
        <label for="logotipo" class="form-label">logotipo</label>
        <input type="text" class="form-contgrol" id="logotipo" name="logogtipo" placeholder="logo.jpg">
    </div>
    <dic class="mb-3">
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar">
    </div>
</form>