<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Serenatto - Admin</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="img/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
    <h1>Admistração Serenatto</h1>
    <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
  </section>
  <h2>Lista de Produtos</h2>

  <section class="container-table">
    <table>
      <thead>
        <tr>
          <th>Produto</th>
          <th>Tipo</th>
          <th>Descricão</th>
          <th>Valor</th>
          <th colspan="2">Ação</th>
        </tr>
      </thead>
      <?php 
      require "conexao.php";
      $sql = "SELECT * FROM produtos ORDER BY tipo, preco ASC";
      $result = $conn->query($sql);

      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
      
      ?>
      <tbody>
      <tr>
        <td><?= $row['nome'] ?></td>
        <td><?= $row['tipo'] ?></td>
        <td><?= $row['descricao'] ?></td>
        <td><?= $row['preco'] ?></td>
        <td>

          <form action="editar-produto.php" method="GET">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="submit" name="botao-editar" class="botao-editar" value="Editar">
          </form></td>
          <td>
          <form action="editar-produto.php" method="GET">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="submit" name="botao-excluir" class="botao-excluir" value="Excluir">
          </form>
        </td>
        
      </tr>
    <?php } } ?>
      </tbody>
    </table>
  <a class="botao-cadastrar" href="cadastrar-produto.html">Cadastrar produto</a>
  <form action="#" method="post">
    <input type="submit" class="botao-cadastrar" value="Baixar Relatório"/>
  </form>
  </section>
</main>
</body>
</html>