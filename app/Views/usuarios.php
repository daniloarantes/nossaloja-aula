       <div class="row h-100">
            <div class="col-12 d-flex justify-content-center mt-5 mb-3">

                <div>
                    <h1 class="text-center mb-3">Administradores Cadastrados</h1>

                    <div class="d-flex justify-content-evenly mt-5 mb-5">
                        <a href="<?= base_url('administracao'); ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Voltar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
                            </svg>
                        </a>
                        <a href="<?= base_url('cadlogin'); ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Cadastrar Admin">
                            <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                        </a>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">Grupo</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($usuarios as $usuario) : ?>
                            <tr>
                                <th scope="row"><?= $usuario->id ?></th>
                                <td><?= $usuario->username ?></td>
                                <td><?= implode(',', $usuario->getGroups()) ?></td>

                                <td>
                                    <?php if(str_contains(implode(',', $usuario->getGroups()), "admin")): ?>
                                        <a href="<?= site_url('usuarios/removeAdmin/' . $usuario->id) ?>" class="btn btn-warning me-3">Remove Admin</a>
                                    <?php else: ?>
                                        <a href="<?= site_url('usuarios/definirAdmin/' . $usuario->id) ?>" class="btn btn-info me-3">Define Admin</a>
                                    <?php endif; ?>

                                    <a href="<?= site_url('usuarios/excluirUsuario/' . $usuario->id) ?>" class="btn btn-danger">Remover</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
       </div>



