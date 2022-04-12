let navbarContent = `<nav class="navbar navbar-light bg-light fixed-top">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu Lateral</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="/sistema-contole/index.php">Página Inicial</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link active dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Cadastros Especiais
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                                                <li class="dropdown-item">
                                                    <a class="nav-link active" aria-current="page" href="/sistema-contole/views/cadastroEspeciais/terneiros.php">Terneiros</a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li class="dropdown-item">
                                                    <a class="nav-link" href="/sistema-contole/views/cadastroEspeciais/vacas.php">Vacas</a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>                                                
                                                <li class="dropdown-item">
                                                    <a class="nav-link" href="/sistema-contole/views/cadastroEspeciais/novilhos.php">Novilhos</a>
                                                </li>
                                            </ul>
                                        </li>                                        
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="/sistema-contole/views/receitas/receitas.php">Receitas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="/sistema-contole/views/movimentacao/movimentacao.php">Movimentação Interna do Rebanho</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="/sistema-contole/views/despesas/despesas.php">Despesas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="/sistema-contole/views/relatorios/relatorios.php">Relatórios</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>`

document.getElementById('navbar').innerHTML = navbarContent
