<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fubateca</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
        }

        .btn-warning {
            background-color: #fff1a3;
            border-color: #fff1a3;
        }

        .btn-warning:hover {
            background-color: #e3d68f;
            border-color: #e3d68f;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fff1a3;">

        <div class="container">
            <a class="navbar-brand" href="/trabalhoBiblioteca/codeigniter4-framework-7d393f8/public/biblioteca">Fubateca</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item"> <a class="nav-link active" aria-current="page" href="/trabalhoBiblioteca/codeigniter4-framework-7d393f8/public/biblioteca">Home</a> </li>

                    <li class="nav-item"> <a class="nav-link" href="/trabalhoBiblioteca/codeigniter4-framework-7d393f8/public/livros">Livros</a> </li>

                    <?php if (isset($adm)) { ?>
                        <li class="nav-item"> <a class="nav-link" href="/trabalhoBiblioteca/codeigniter4-framework-7d393f8/public/addLivros">Adicionar Livros</a> </li>
                    <?php } ?>

                    <li class="nav-item"> <a class="nav-link" href="/trabalhoBiblioteca/codeigniter4-framework-7d393f8/public/">Sair</a> </li>

                </ul>

            </div>

        </div>

    </nav>
    <div class="container mt-4">

        <div class="jumbotron">

            <h1 class="display-4">Bem-vindo à Fubateca, <?= $nome ?>!</h1>

            <p class="lead">Encontre uma vasta coleção de livros em nossa biblioteca online. Explore e descubra novas histórias.</p>

            <hr class="my-4">

            <p>Procure por ano, autores ou títulos. Nossa biblioteca tem algo para todos os gostos.</p>
            <a class="btn btn-warning btn-lg" href="/trabalhoBiblioteca/codeigniter4-framework-7d393f8/public/livros" role="button">Explorar Livros</a>
        </div>

    </div>
    <footer class="footer mt-5 text-dark" style="background-color: #fff1a3;">

        <div class="container"> <span class="text-dark">© 2024 Fubateca. Todos os direitos reservados.</span> </div>

    </footer>

</body>

</html>