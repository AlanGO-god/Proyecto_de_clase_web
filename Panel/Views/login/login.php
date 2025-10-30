<form method="POST" action="login.php?action=login" >

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <input name="correo" type="text"  class="form-control" id="staticEmail">
    </div>
</div>
<div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
        <input name="contrasena" type="password" class="form-control" id="inputPassword">
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" id="enviar" name="enviar" value="Entrar"> 
    </div>
    <div>
        <a href="login.php?action=recuperar">Regcuperar contrasena</a>
    </div>
</div>
</form>