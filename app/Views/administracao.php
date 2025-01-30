       <div class="row">
            <div class="col-12 d-flex justify-content-center mt-5 mb-5">
                <div>
                    <h1>Administração - NossaLoja.com</h1>
                    <?php if (session()->has('cadastroOk')) : ?>
                        <?php echo session()->get('cadastroOk'); ?>
                    <?php endif; ?>
                    <?php echo form_close(); ?>

                    <div class="d-flex justify-content-evenly mt-5">

                        <a href="<?= base_url('cadastrar'); ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Cadastrar Produto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-gift-fill" viewBox="0 0 16 16">
                                <path d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A3 3 0 0 1 3 2.506zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43zM9 3h2.932l.023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0zm6 4v7.5a1.5 1.5 0 0 1-1.5 1.5H9V7zM2.5 16A1.5 1.5 0 0 1 1 14.5V7h6v9z"/>
                            </svg>
                        </a>
                        <a href="<?= base_url('admins'); ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Administradores">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
       </div>
        <div class="row">
            <div class="col-12 mt-5 mb-5">
                <hr>
                <h1 class="mt-5 mb-5 text-center">Produtos Cadastrados</h1>
                <div class="d-flex justify-content-center mb-5">
                    <?= form_open('produto/pesquisarProduto', 'method="get" class="row g-3"'); ?>
                        <div class="col-auto">
                            <label for="inputPesquisa" class="visually-hidden">Pesquisa</label>
                            <input type="text" class="form-control" id="inputPesquisa" name="pesquisa" placeholder="Buscar">
                        </div>
                        <div class="col-auto">
                            <select class="form-select" aria-label="Default select example" name="tipo">
                                <option value="1">ID</option>
                                <option value="2">Nome</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Pesquisar</button>
                        </div>
                    <?= form_close(); ?>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Funções</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($produtos as $produto) : ?>
                    <tr>
                        <th scope="row"><?= $produto['id'] ?></th>
                        <td><?= $produto['produto'] ?></td>
                        <td><?= $produto['descricao'] ?></td>
                        <td>R$ <?= $produto['preco'] ?></td>
                        <td>
                            <a href="<?= site_url('produto/editarProduto/' . $produto['id']) ?>" class="btn btn-warning me-3">Alterar</a>
                            <a href="<?= site_url('produto/excluirProduto/' . $produto['id']) ?>" class="btn btn-danger">Remover</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

