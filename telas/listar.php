<h1>Listar Contatos</h1>

<table class="table table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contatos as $index => $contato) : ?>
            <?php $partes = explode(";", $contato); ?>
            <tr>
                <td><?= $partes[0] ?></td>
                <td><?= $partes[1] ?></td>
                <td><?= $partes[2] ?></td>
                <td>
                    <a href="/editar?id=<?= $index ?>" class="btn btn-warning">Editar</a>
                    <a href="/excluir?id=<?= $index ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>