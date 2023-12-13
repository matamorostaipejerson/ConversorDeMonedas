<!DOCTYPE html>
<html>
<head>
  <title>Formulario de inicio de sesión</title>
  <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body>
  <div class="login-container">
    <h1>Iniciar sesión</h1>
    <form id="login-form" action="./pagina_usuario.php" method="post" onsubmit="return validarFormulario()">
      <div class="input-group">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="input-group">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="input-group">
        <button type="submit">Iniciar sesión</button>
      </div>
    </form>
  </div>

  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Establecer la conexión a la base de datos
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "conversion_monedas";

      $conn = new mysqli($servername, $username, $password, $dbname);

      // Verificar si la conexión fue exitosa
      if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
      }

      // Obtener los valores enviados desde el formulario
      $username = $_POST["username"];
      $password = $_POST["password"];

      // Escapar los valores para prevenir ataques de inyección SQL
      $username = $conn->real_escape_string($username);
      $password = $conn->real_escape_string($password);

      // Consultar la base de datos para verificar el usuario y la contraseña
      $sql = "SELECT * FROM usuarios WHERE usuario = '$username'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // El usuario existe, verificar la contraseña
        $row = $result->fetch_assoc();
        $storedPassword = $row['contraseña'];
        if (password_verify($password, $storedPassword)) {
          // La contraseña es correcta, redirigir a la página de usuario
          header("Location: pagina_usuario.php");
          exit();
        } else {
          // Contraseña incorrecta, mostrar un mensaje de error
          echo "<p>Contraseña incorrecta.</p>";
        }
      } else {
        // Usuario no encontrado, mostrar un mensaje de error
        echo "<p>Usuario no encontrado.</p>";
      }

      $conn->close();
    }
  ?>
</body>
</html>
