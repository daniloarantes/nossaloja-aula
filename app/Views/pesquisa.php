        <div class="row">
            <div class="col-12 mt-5 mb-5">
                <h1 class="mt-5 mb-5 text-center">Pesquisar Produtos</h1>
                <div class="d-flex justify-content-center mb-3">

                        <?= form_open('produto/buscarProduto', 'method="get" class="row g-3"'); ?>
                        <div class="col-auto">
                            <label for="inputPesquisa" class="visually-hidden">Pesquisa</label>
                            <input type="text" class="form-control" id="inputPesquisa" placeholder="Buscar" name="pesquisa">
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Pesquisar</button>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-wrap ">

                <?php if($produtos) : ?>
                <?php foreach ($produtos as $produto) : ?>
                        <div class="card m-3" style="width: 18rem;">
                            <img src="<?= base_url('assets/uploads/' . $produto['imagem']) ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?= $produto['produto'] ?></h5>
                                <p class="card-text"><?= $produto['descricao'] ?></p>
                                <p class="fw-bold fs-4 text-success">R$ <?= $produto['preco'] ?></p>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <a href="#" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhum Produto encontrado</p>
                <?php endif; ?>



            </div>
        </div>
