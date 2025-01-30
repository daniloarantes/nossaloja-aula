


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
                            <a href="#" class="btn btn-primary">Comprar</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhum Produto encontrado</p>
                <?php endif; ?>

                <?php
                $users = auth()->getProvider();
                $user = $users->findAll();
                var_dump($user[0]);
                ?>
                

                

            </div>
        </div>
        <!--Fim Destaques-->

        
