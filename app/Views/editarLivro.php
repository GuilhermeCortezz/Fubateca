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

                    <li class="nav-item"> <a class="nav-link" href="/trabalhoBiblioteca/codeigniter4-framework-7d393f8/public/biblioteca">Home</a> </li>

                    <li class="nav-item"> <a class="nav-link" href="/trabalhoBiblioteca/codeigniter4-framework-7d393f8/public/livros">Livros</a> </li>

                    <li class="nav-item"> <a class="nav-link active" aria-current="page" href="/trabalhoBiblioteca/codeigniter4-framework-7d393f8/public/addLivros">Adicionar Livros</a> </li>

                    <li class="nav-item"> <a class="nav-link" href="#">Contato</a> </li>

                </ul>

            </div>

        </div>

    </nav>
    <div class="container mt-4">

        <div class="jumbotron">

            <h2 class="display-5">Editar:</h2>
        </div>
        <main class="form-signin w-100 m-auto">
            <form action="/trabalhoBiblioteca/codeigniter4-framework-7d393f8/public/formupdatelivro" method="post">
                <div class="form-outline mb-4">
                    <input type="hidden" name="id" class="form-control" value="<?= $resultado['id'] ?>" required />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="Titulo">Titulo</label>
                    <input type="text" name="titulo" class="form-control" value="<?= $resultado['titulo'] ?>" required />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="ano">Ano</label>
                    <input type="number" name="ano" class="form-control" value="<?= $resultado['ano'] ?>" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="autor">Autor</label>
                    <input type="text" name="autor" class="form-control" value="<?= $resultado['autor'] ?>" required />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="editora">Editora</label>
                    <input type="text" name="editora" class="form-control" value="<?= $resultado['editora'] ?>" required />
                </div>

                <div class="text-success">
                    <?php
                    if (session()->get('livroSalvo')) {
                        echo "<strong>" . session()->getFlashdata('livroSalvo') . "</strong>";
                    }
                    ?>

                    <button type="submit" class="btn btn-warning btn-block mb-4 w-100">Salvar</button>
            </form>
        </main>
    </div>

    <footer class="footer text-dark mt-5" style="background-color: #fff1a3;">

        <div class="container"> <span class="text-dark">© 2024 Fubateca. Todos os direitos reservados.</span> </div>

    </footer>

</body>

</html>