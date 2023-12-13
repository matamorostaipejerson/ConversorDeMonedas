<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Document</title>
</head>
<body>
    <div class="fondo_cabecera">
        <h1>Conversión Monedas</h1>
    </div>
    
    <div class="contenedor_conversion_resultado">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="llenar_form" method="POST">
            <div class="contenedor_horizontal_campos">
                <div class="campo_form_conversion">
                    <label for="cantidad">Importe:</label>
                    <input type="number" name="cantidad" id="cantidad" required>
                </div>
    
                <div class="campo_form_conversion">
                    <label for="monedaOrigen">De:</label>
                    <select name="monedaOrigen" id="monedaOrigen">
                        <option value="PEN">Soles</option>
                        <option value="USD">Dólares</option>
                        <option value="EUR">Euros</option>
                        <option value="BTC">Bitcoin</option>
                    </select>
                </div>

                <i class="fa-solid fa-rotate-right fa-2xl" style="color: #000000;"></i>

                <div class="campo_form_conversion">
                    <label for="monedaDestino">A:</label>
                    <select name="monedaDestino" id="monedaDestino">
                        <option value="PEN">Soles</option>
                        <option value="USD">Dólares</option>
                        <option value="EUR">Euros</option>
                        <option value="BTC">Bitcoin</option>
                    </select>
                </div>
            </div>

            <div class="contenedor_resultado_boton_conversion">
                <div class="resultado"><h1>
                    <?php
                    function convertirMoneda($cantidad, $monedaOrigen, $monedaDestino) {
                        // Realizar la solicitud a la API de conversión de monedas
                        $url = "https://v6.exchangerate-api.com/v6/00fbe38758fd83bdac3d52b3/pair/{$monedaOrigen}/{$monedaDestino}/{$cantidad}";

                        // Realizar la solicitud GET a la API
                        $response = file_get_contents($url);

                        // Verificar si la solicitud fue exitosa
                        if ($response !== false) {
                            // Decodificar la respuesta JSON
                            $data = json_decode($response, true);

                            // Obtener el resultado de la conversión
                            $resultado = $data['conversion_result'];

                            return $resultado;
                        } else {
                            return "Error al realizar la solicitud a la API.";
                        }
                    }

                    // Verificar si se ha enviado el formulario
                    if (isset($_POST['convertir'])) {
                        // Obtener el valor ingresado y las monedas seleccionadas
                        $cantidad = $_POST['cantidad'];
                        $monedaOrigen = $_POST['monedaOrigen'];
                        $monedaDestino = $_POST['monedaDestino'];

                        // Realizar la conversión utilizando la función
                        $resultado = convertirMoneda($cantidad, $monedaOrigen, $monedaDestino);

                        // Mostrar el resultado
                        if (is_numeric($resultado)) {
                            echo "<p>$cantidad $monedaOrigen equivale a $resultado $monedaDestino.</p>";
                        } else {
                            echo $resultado;
                        }
                    }
                    ?></h1>
                </div>
                <div class="contenedor_boton">
                    <button type="submit" name="convertir">Convertir</button>
                </div>
            </div>

        </form>
        
    </div>

    <div class ="contenedor_tabla_historial">

    </div>
    <script src="https://kit.fontawesome.com/2451eecdd4.js" crossorigin="anonymous"></script>
</body>
</html>
