<header>
    <?php include "../bootstrap.html"; ?>
    <link rel="stylesheet" href="style.css">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <p class="h1">Vat-Lanches</p>
                <a class="mt-3 navbar-text d-none d-lg-block h5">Área Administrativa</a>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav h3 ms-5">
                    <?php
                    $current_page = basename($_SERVER['PHP_SELF']);
                    $tabela = isset($_GET['tabela']) ? $_GET['tabela'] : 'ambas';
                    $menu_items = array(
                        'index.php' => 'Registros',
                        'pedidos.php' => 'Pedidos',
                    );

                    foreach ($menu_items as $url => $label) {
                        $is_active = ($url == $current_page);
                        $class = $is_active ? 'active' : '';

                        if ($label == 'Registros') {
                            ?>
                            <li class="nav-item dropdown dropdown-hover">
                                <a href="#" class="nav-link dropdown-toggle <?php echo $class; ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $label; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="index.php">Tudo</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a href="index.php?tabela=produtos" class="dropdown-item">Produtos</a></li>
                                    <li><a href="index.php?tabela=clientes" class="dropdown-item">Clientes</a></li>
                                </ul>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li class="nav-item">
                                <a href="<?php echo $url; ?>" class="nav-link <?php echo $class; ?>">
                                    <?php echo $label; ?>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>

            <a href="../logoutadm.php" class="btn btn-light ms-auto"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg> Sair</a>
        </div>
    </nav>
</header>

<script>
    var closeButton = document.querySelector('.close-btn');
    closeButton.addEventListener('click', function () {
        var navbarCollapse = document.getElementById('navbarSupportedContent');
        navbarCollapse.classList.remove('show');
    });
</script>
<div class="background">
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   </div>