<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
  <title>Upload de Arquivos</title>
</head>

<body>
  <div class="container">
    <h1 class="mt-5 text-center">Upload de Arquivos</h1>
    <form method="post" enctype="multipart/form-data" class="m-3">
      <div class="input-group">
        <input type="file" class="form-control" id="arquivo" name="arquivos[]" multiple aria-describedby="arquivo" area-label="Upload" require />
        <button class="btn btn-primary" type="submit" name="enviar" id="enviar">
          Enviar
        </button>
      </div>
    </form>
  </div>

  <?php

  function reArrayFiles(&$file_post)
  {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
      foreach ($file_keys as $key) {
        $file_ary[$i][$key] = $file_post[$key][$i];
      }
    }

    return $file_ary;
  }

  if (isset($_POST['enviar'])) {
    $arquivos = reArrayFiles($_FILES['arquivos']);

    foreach ($arquivos as $arquivo) {
      // print 'Nome do arquivo' . $arquivo['name'];
      // print 'Tipo do arquivo' . $arquivo['type'];
      // print 'Tamanho do arquivo' . $arquivo['size'];

      // VALIDAÇÕES
      $tamanhoMax = 20971520; // 2MB
      $permitido = array("jpg", "png", "jpeg", "mp4");
      $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);

      // VERIFICAR SE TEM TAMANHO PERMITIDO
      if ($arquivo['size'] >= $tamanhoMax) {
        echo '<div class="alert alert-danger">';
        echo $arquivo['name'] . "- Erro: Tamanho máximo de 2 MB atingido. Não foi possível fazer upload";
        echo '</div><br>';
      } else {
        // VERIFICAR SE EXTENSÃO É PERMITIDA
        if (in_array($extensao, $permitido)) {
          $pasta = "imagens/";

          if (!is_dir($pasta)) {
            mkdir($pasta, 0755);
          }

          $tmp = $arquivo['tmp_name'];
          $arquivo['name'] = uniqid() . ".$extensao";

          if (move_uploaded_file($tmp, $pasta . $arquivo['name'])) {
            echo '<div class="alert alert-success">';
            echo $arquivo['name'] . ": Upload realizado com sucesso";
            echo '</div><br>';
          } else {
            echo '<div class="alert alert-danger">';
            echo $arquivo['name'] . "- Erro: Não foi possível fazer upload";
            echo '</div><br>';
          }
        } else {
          echo '<div class="alert alert-danger">';
          echo $arquivo['name'] . "- Erro: Extensão ($extensao) não permitida";
          echo '</div><br>';
        }
      }
    }
  }


  ?>


  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>