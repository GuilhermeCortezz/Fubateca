<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    html,
    body {
      height: 100%;
      background-color: #ffecb3;
    }

    .form-signin {
      max-width: 330px;
      padding: 1rem;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
    }

    .form-signin h1 {
      text-align: center;
      margin-bottom: 2rem;
      color: #8d6e63;
    }

    .form-signin label {
      font-weight: bold;
    }

    .form-signin input[type="text"],
    .form-signin input[type="email"],
    .form-signin input[type="password"] {
      border-radius: 5px;
    }

    .form-signin button[type="submit"] {
      border-radius: 5px;
      background-color: #8d6e63;
      border-color: #8d6e63;
    }

    .form-signin button[type="submit"]:hover {
      background-color: #795548;
      border-color: #795548;
    }

    .form-signin a {
      color: #8d6e63;
    }
  </style>

</head>

<body class="d-flex align-items-center">
  <main class="form-signin w-100 m-auto">
    <h1 class="mb-4">Cadastro</h1>
    <form action="/trabalhoBiblioteca/codeigniter4-framework-7d393f8/public/signreceivedata" method="post">
      <div class="form-outline mb-4">
        <label class="form-label" for="nome">Nome</label>
        <input type="text" name="nome" class="form-control" required />
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="email">Email</label>
        <input type="email" name="email" class="form-control" required />
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="password">Senha</label>
        <input type="password" name="senha" class="form-control" required />
      </div>
      <div class="text-danger">
        <?php
        if (session()->get('emailExistente')) {
          echo "<strong>" . session()->getFlashdata('emailExistente') . "</strong>";
        }
        ?>
      </div>
      <button type="submit" class="btn btn-primary btn-block mb-4 w-100">Criar conta</button>

      <div class="text-center">
        <p>Já possui uma conta? <a href="/trabalhoBiblioteca/codeigniter4-framework-7d393f8/public/">Entre</a></p>
      </div>
    </form>
  </main>
</body>

</html>