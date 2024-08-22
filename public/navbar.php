<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Logo e nome da marca -->
        <a class="navbar-brand" href="index.php">Home</a>

        <!-- Botão do menu hamburguer para dispositivos móveis -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Itens da navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="d-flex justify-content-between w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Início</a>
                    </li>
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Registrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Entrar</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Dados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="schedule.php">Grade de horários</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="concepts.php">Conceitos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="absences.php">Faltas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="enrollment.php">Matrícula</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Sair</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
