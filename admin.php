<?php require_once('header.php'); ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col mt-5 mb-5">
                <h1>Painel administrativo</h1>
            </div>
            <div class="col mt-5 mb-5 text-right">
                <a href="criar_servico.php" class="btn btn-primary">Criar novo serviço</a>
            </div>
        </div>
        <div class="row">
            <div class="col mb-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Serviço</th>
                            <th>Descrição</th>
                            <th>Imagem</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="200">Consultoria UX</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis aspernatur doloribus repellendus numquam consequuntur iusto.</td>
                            <td><img src="imagens/undraw_report.svg" alt="" width="100"></td>
                            <td width="200" class="text-center">
                                <a href="editar_produto.php?id=0" class="btn btn-info">Editar</a>
                                <a href="excluir_produto.php?id=0" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php require_once('footer.php'); ?>