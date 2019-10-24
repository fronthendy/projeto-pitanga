<?php include_once('header.php') ?>
<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col mb-4">
                <h1>Cadastro de serviços</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mb-5">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome">nome</label>
                        <input type="text" class="form-control" name="nome" id="nome">
                    </div>
                    <div class="form-group">
                        <label for="descricao">descriçõo</label>
                        <textarea name="descricao" id="descricao" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imagem">Imagem</label>
                        <input type="file" name="imagem" id="imagem" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="cadastro-servico">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include_once('footer.php') ?>