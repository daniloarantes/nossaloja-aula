


        <div class="row">
            <div class="col-12 d-flex flex-wrap ">

                <?php if($produtos) : ?>

                    <div class="card m-3" style="width: 18rem;">
                        <img src="<?= base_url('assets/uploads/' . $produtos['imagem']) ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?= $produtos['produto'] ?></h5>
                            <p class="card-text"><?= $produtos['descricao'] ?></p>
                            <p class="fw-bold fs-4 text-success">R$ <?= $produtos['preco'] ?></p>
                            <p>Quantidade</p>
                            <div class="d-flex justify-content-center align-items-center">

                                <button onclick="btnMenos()" class="btn btn-primary" style="margin: 10px">-</button>
                                <?php if (isset($produtos['qtd'])) : ?>
                                    <span id="qtd" name="qtd"><?= $produtos['qtd'] ?></span>
                                <?php else : ?>
                                    <span id="qtd" name="qtd">1</span>
                                <?php endif; ?>
                                <button onclick="btnMais()" class="btn btn-primary" style="margin: 10px">+</button>

                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <button onclick="adicionaCarrinho()" class="btn btn-primary">Comprar</button>
                            <?php
                            if(session()->get('carrinho')){
                                $carrinho = session()->get('carrinho');


                                if(key_exists($produtos['id'], $carrinho['item'])){
                                    echo '<button onclick="removerdoCarrinho()" class="btn btn-danger">Remover do Carrinho</button>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                <?php else: ?>
                    <p>Nenhum Produto encontrado</p>
                <?php endif; ?>


                

                

            </div>
        </div>
        <!--Fim Destaques-->



        <script>

            let qtd = 1;

            function btnMais(){
                qtd++;
                document.getElementById("qtd").innerHTML = qtd;
            }

            function btnMenos(){
                if(qtd == 0){
                    qtd = 0;
                } else{
                    qtd--;
                }

                document.getElementById("qtd").innerHTML = qtd;
            }

            function adicionaCarrinho(){
                window.location.href=`<?= site_url("carrinho/adicionaProduto/" . $produtos['id'] . "/") ?>${qtd}`;
            }

            function removerdoCarrinho(){
                window.location.href=`<?= site_url("carrinho/removeProduto/" . $produtos['id'] . "/") ?>`;
            }


        </script>
