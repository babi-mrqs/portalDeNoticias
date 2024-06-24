<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<?php
    require_once '../models/noticiaModel.php';

    session_start();

    $noticiaModel = new noticiaModel();

    $noticias = $noticiaModel->buscarNoticias();
?>
<body>
    <header>
        <?php
            if ($_SESSION['id_tipo_usuario'] == 1) {
                require_once '../public/html/menuAdmin.html';
            }
            else {
                require_once '../public/html/menuCliente.html';
            }
        ?>
        <h1>Principal</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($noticias as $noticia) :?>
                    <tr>
                        <td><?= $noticia->tituloNoticia; ?></td>
                        <td><?= $noticia->autor->nomeAutor; ?></td>
                        <td>
                            <a href="noticia.php?idNoticia=<?= $noticia->idNoticia; ?>">Abrir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>