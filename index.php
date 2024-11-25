<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Estações do Ano</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <h1 class="titulo"> estações do ano</h1>

    <form method="GET" action="/estaçoesdoanophp/">
        <label for="day">Dia:</label>
        <select id="day" name="day" required>
            <option value="" disabled selected>Selecione o dia</option>
            <?php
            for ($i = 1; $i <= 31; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>

        <label for="month">Mês:</label>
        <select id="month" name="month" required>
            <option value="" disabled selected>Selecione o mês</option>
            <?php
            $meses = [
                1 => "Janeiro",
                2 => "Fevereiro",
                3 => "Março",
                4 => "Abril",
                5 => "Maio",
                6 => "Junho",
                7 => "Julho",
                8 => "Agosto",
                9 => "Setembro",
                10 => "Outubro",
                11 => "Novembro",
                12 => "Dezembro"
            ];
            foreach ($meses as $num => $nome) {
                echo "<option value='$num'>$nome</option>";
            }
            ?>
        </select>

        <button type="submit">Enviar</button>
    </form>

    <?php

      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(isset($_GET['day']) and isset($_GET['month'])) {
            $dia = $_GET['day'];
            $mes = $_GET['month'];
            $imagem = "";   
          
            if (($mes == 12 && $dia >= 21) || $mes == 1 || $mes == 2 || ($mes == 3 && $dia < 21)) {
                 echo "Verão";
                 $imagem = "verao.jpg";
                
            } elseif (($mes == 3 && $dia >= 21) || $mes == 4 || $mes == 5 || ($mes == 6 && $dia < 21)) {
                echo "Outono";
                $imagem = "outono.jpg";
            
            } elseif (($mes == 6 && $dia >= 21) || $mes == 7 || $mes == 8 || ($mes == 9 && $dia < 23)) {
                echo "Inverno";
                $imagem = "inverno.jpg";
                
            } else {
                echo "Primavera";
                $imagem = "primavera.jpg";
            }
            echo "<div>";
            echo "<img src='../estaçoesdoanophp/imagens/$imagem' alt='Estação do ano' style='width:300px; height:auto;'>";
            echo "</div>";
        }
      }

?>

</body>
</html>