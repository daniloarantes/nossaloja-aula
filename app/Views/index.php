


        <!--Inicio Banner-->
        <div class="row">
            <div class="col-12 mb-5">
                <img class="img-fluid" src="assets/images/banner-black-friday.svg" alt="" srcset="">
            </div>
        </div>
         <!--Fim Banner-->
         <!--Inicio Destaques-->
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Seleção de produtos</h1>
                <?php
                if(session()->get('carrinho')){
                    $carrinho = session()->get('carrinho');

                }
                ?>

            </div>
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
                            <a href="<?= site_url("produto/produtoDetalhe/" . $produto['id']) ?>" class="btn btn-primary">Comprar</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhum Produto encontrado</p>
                <?php endif; ?>


                

                

            </div>
        </div>
        <!--Fim Destaques-->


