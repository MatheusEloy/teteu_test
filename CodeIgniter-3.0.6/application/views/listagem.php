<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
            border-collapse: collapse;
            width: 100%;
            }

            th, td {
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even){background-color: #f2f2f2}
        </style>
    </head>

    <body>
        <?php if($query) { ?>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
                <?php foreach($query as $pessoas => $pessoa): ?>
                            <tr>
                                <td><?= $pessoa['nome']; ?></td>
                                <td><?= $pessoa['idade']; ?></td>
                                <td><a href="edit?id=<?= $pessoa['id'];?>">Editar</a></td>
                                <td><a href="del?id=<?= $pessoa['id'];?>">X</a></td>
                            </tr>
                <?php endforeach; ?>
            </table>
        <?php } else {echo "<h3>Nao ha usuarios Cadastrados!<h3>";} ?>

        <center><a href="add">Cadastrar Usuarios</a></center>

    </body>
</html>

