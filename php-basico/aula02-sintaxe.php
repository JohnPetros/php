<?php
$html = "<h1>Tag criada com PHP</h1>";

$js = "<script>alert('Criado com PHP')</script>";

//comentário
#comentário
/*
Bloco de comentário
*/
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Aula 2</title>
</head>

<body>
    <h2>Oi!</h2>
    <?php
    echo $html;
    echo $js;
    ?>

    <?php $ativado = "sim" ?>
    <?php if ($ativado == "Sim"){?>
        <h2> Está ativado sim</h2>
    <?php } else { ?>
        <h2> Não está ativado</h2>
    <?php } ?>
</body>

</html>


<?php
$Nome = "João";
$cor = 'Azul';
echo "<h3>Meu nome é $Nome</h3>";
echo "<h4>minha cor favorita é $cor</h4>";
echo "<p>Que legal <br> isso aqui!</p>";
?>