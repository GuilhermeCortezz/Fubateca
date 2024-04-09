<!DOCTYPE html>
<html lang="pt-br">

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

                    <li class="nav-item"> <a class="nav-link active" aria-current="page" href="/trabalhoBiblioteca/codeigniter4-framework-7d393f8/public/livros">Livros</a> </li>

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

            <h1 class="display-4">Livros</h1>
        </div>
        <form action="pesquisar" method="post" class="m-1">
            <label for="mylabel" class="form-label">Pesquisar:</label>
            <input type="text" class="form-control" id="pesquisar" name="pesquisar"><br>
            <button type="submit" class="btn btn-warning">Pesquisar</button>
        </form>
        <br>
        <?php
        if (isset($resultadoAno) || isset($resultadoAutor)) {
            $resultado = (!empty($resultado)) ? $resultado : ((!empty($resultadoAno)) ? $resultadoAno : $resultadoAutor);
        } ?>
        <?php foreach ($resultado as $row) { ?>
            <div class="m-1"><?php
                                echo 'Titulo: ' . $row['titulo'] . '<br>';
                                echo 'Ano: ' . $row['ano'] . '<br>';
                                echo 'Autor: ' . $row['autor'] . '<br>';
                                echo 'Editora: ' . $row['editora'] . '<br>'; ?>
            </div>
            <?php if (isset($adm)) { ?>
                <form action="/trabalhoBiblioteca/codeigniter4-framework-7d393f8/public/delete" method="post" class="m-1">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit" class="btn btn-warning">Remover</button><br>
                </form>
                <form action="/trabalhoBiblioteca/codeigniter4-framework-7d393f8/public/editarLivro" method="post" class="m-1">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit" class="btn btn-warning">Editar</button><br>
                </form>
            <?php } ?>
            <br>
        <?php
        } ?>
        <div class="text-success">
            <?php
            if (session()->get('livroEditado')) {
                echo "<strong>" . session()->getFlashdata('livroEditado') . "</strong>";
            }
            ?>
        </div>
        <div class="text-danger">
            <?php
            if (session()->get('livroRemovido')) {
                echo "<strong>" . session()->getFlashdata('livroRemovido') . "</strong>";
            }
            ?>
        </div>
    </div>
    <footer class="footer mt-5 text-dark" style="background-color: #fff1a3;">

        <div class="container"> <span class="text-dark">© 2024 Fubateca. Todos os direitos reservados.</span> </div>

    </footer>

</body>

</html>