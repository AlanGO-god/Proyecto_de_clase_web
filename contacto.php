<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contacto de los  investigadores">
    <meta name="author" content="AlanGO">
    <meta name="keywords" content="Progra Web contacto investigadores">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/main.css">
</head>
<body>
    <header>
         <div id="logo">
            <img src="image/ciencias.png" alt="ciencias" width="50px">
            <h1>Mis articuloss</h1>
        </div>
        <div>
            <label>Search <input type="text"></label>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Index</a></li>
            <li><a href="mienbros.php">Miembros</a></li>
            <li><a href="investigaciones.php">Investigaciones</a></li>
            <li><a href="contacto.php">Contacto</a></li>
        </ul>
    </nav>
    <main style="flex-direction: column;">
        <h1>Contacto</h1>
        <h3>Red de investigación del TecNM</h3>
        <p>Tell: <a href="tel:+524611906138">4611906138</a><br />
            Email: <a href="mailto:22030184@itcelaya.edu.mx">22030184@itcelaya.edu.mx</a>
        </p>
        <form action="enviarmensaje.html" method="get">
            <label for="nombre">Escriba su nombre</label>
            <input type="text" name="nombre" maxlength="30" minlength="15">
            <label for="tipo">Tipo de comentario</label>
            <select name="tipo">
                <option value="comentario">Comentario</option>
                <option value="queja">Queja</option>
                <option value="inscripcion">inscripcion</option>
            </select>
            <label form="mensaje">Escriba su mensaje</label>
            <textarea name="mensaje" rows="5" cols="10"></textarea>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </main>
    <br>
    <footer>
        <nav>
            <ul>
                <li><a href="index.php"><img src="image/whatsapp.png" alt="whatsapp"></a></li>
                <li><a href="mienbros.php"><img src="image/gorjeo.png" alt="pajaro"></a></li>
                <li><a href="investigaciones.php"><img src="image/facebook.png" alt="facebook"></a></li>
            </ul>
        </nav>
    </footer>
</body>
</html>