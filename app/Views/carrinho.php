<?php
print_r($produtos);
?>

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
                <h1 class="text-center">Seu Carrinho</h1>
                <?php
                if(session()->get('carrinho')){
                    $carrinho = session()->get('carrinho');
                    $total = 0;
                }
                ?>
                <p>Itens no Carrinho: <?= count($carrinho['item']) ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-wrap ">

                <?php if($produtos) : ?>
                    <?php foreach ($produtos['item'] as $produto) : ?>


                        <div class="card m-3" style="width: 18rem;">
                            <img src="<?= base_url('assets/uploads/' . $produto['imagem']) ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?= $produto['produto'] ?></h5>
                                <p class="card-text"><?= $produto['descricao'] ?></p>
                                <p class="fw-bold fs-4 text-success">R$ <?= $produto['preco'] ?></p>
                                <p>Quantidade: <?= $produto['qtd'] ?></p>
                                <strong><h3>Total: R$ <?= $produto['total'] ?></h3></strong>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <button  name="editar" id="<?= $produto['id'] ?>" class="btn btn-primary m-2">Editar Produto</button>
                                <button  id="<?= $produto['id'] ?>" name="oi" class="btn btn-danger m-2">Remover do Carrinho</button>

                            </div>
                        </div>
                        <?php
                            $total += $produto['total'];
                        ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhum Produto encontrado</p>
                <?php endif; ?>


                




            </div>
            <h1>Total: R$ <?= $total ?></h1>
        </div>
        <!--Fim Destaques-->

        <script>


            const botoes = document.querySelectorAll('button');

            botoes.forEach(botao => {
                botao.addEventListener('click', function (event) {
                    const clicado = event.target;
                    if(clicado.name == "editar"){

                        window.location.href=`<?= site_url("produto/produtoDetalhe/") ?>${clicado.id}`;
                    } else {
                        removerdoCarrinho(clicado.id);
                    }

                });
            });

            function removerdoCarrinho(id){
                window.location.href=`<?= site_url("carrinho/removeProduto/") ?>${id}`;
            }


        </script>

