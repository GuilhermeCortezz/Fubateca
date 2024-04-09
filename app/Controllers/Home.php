<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\livrosModel;

class Home extends BaseController
{
    public function index(): string
    {
        $this->session->destroy();
        return view('login');
    }
    public function cadastro(): string
    {
        return view('signin');
    }
    public function livros()
    {
        $meuarray = $this->session->get();
        if (isset($meuarray['nome'])) {
            $livrosModel = new livrosModel();
            $resultado = $livrosModel->findAll();
            $data['resultado'] = $resultado;
            if (isset($meuarray['adm'])) {
                $data['adm'] = $meuarray['adm'];
            }
            return view('livros', $data); 
        } else {
            $this->session->setFlashdata('deslogado', 'Faça login para poder acessar o site!');
            return redirect()->to('/');
        }
    }
    public function signReceiveData()
    {
        $password = $this->request->getVar('senha');
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $data = array(
            'nome' =>  $this->request->getVar('nome'),
            'email' =>  $this->request->getVar('email'),
            'senha' =>  $hash
            
        );
        $usuariosModel = new UsuariosModel();
        $check = $usuariosModel->where('email', $data['email'])->first();
        if (is_null($check)) {
            $usuariosModel-> insert($data);
            $this->session->setFlashdata('contaCriada','Conta criada com sucesso!');
            return redirect()->to('/');    
        }
        else{
            $this->session->setFlashdata('emailExistente', 'O email já existe, tente novamente!');
            return redirect()->to('/cadastro'); 
        }
     
    }
    public function biblioteca()
    {
        $meuarray = $this->session->get();
        if (isset($meuarray['nome'])){
            if(isset($meuarray['adm'])){    
                $data['adm'] = $meuarray['adm'];
            }
            $data['nome'] = $meuarray['nome'];
            return view('biblioteca', $data);
        }
        else{
            $this->session->setFlashdata('deslogado', 'Faça login para poder acessar o site!');
            return redirect()->to('/');
        }
    }

    public function addLivros()
    {
        $meuarray = $this->session->get();
        if (isset($meuarray['nome'])) {
            if (isset($meuarray['adm'])) {
                $data['adm'] = $meuarray['adm'];
                return view('addLivros', $data);
            }
            else{
                return redirect()->to('/biblioteca');
            }
        } else {
            $this->session->setFlashdata('deslogado', 'Faça login para poder acessar o site!');
            return redirect()->to('/');
        }
    }

    public function loginVerify()
    {
        $login = $this->request->getVar('email');
        $senha = $this->request->getVar('senha');

        $usuariosModel = new UsuariosModel();
        $resultado = $usuariosModel->where('email', $login)->first();
        
        if (is_null($resultado)){
            $this->session->setFlashdata('LoginFailed','Email ou senha incorretos!');
            return redirect()->to('/');
        }
        else{
            $verify = password_verify($senha, $resultado['senha']); 
            $data['nome'] = $resultado['nome'];
            
            if ($verify) { 
                if ($resultado['id'] == 1){
                    $data['adm'] = true;
                }
                $this->session->set($data);
                return redirect()->to('/biblioteca');
            } else { 
                $this->session->setFlashdata('LoginFailed','Email ou senha incorretos!');
                return redirect()->to('/');
            } 
        }
    }
    public function livroReceiveData()
    {
        $data = array(
            'titulo' =>  $this->request->getVar('titulo'),
            'ano' =>  $this->request->getVar('ano'),
            'autor' =>  $this->request->getVar('autor'),
            'editora' =>  $this->request->getVar('editora')
        );

        $livrosModel = new livrosModel();
        $livrosModel-> insert($data);
        $this->session->setFlashdata('livroAdicionado','Livro adicionado com sucesso!');
        return redirect()->to('/addLivros');
    }

    public function deleteData()
    {
        $id = $this->request->getVar('id');
        $livrosModel = new livrosModel();
        $livrosModel->delete($id);
        $this->session->setFlashdata('livroRemovido','Livro removido com sucesso!');
        return redirect()->to('livros');
    }

    public function editarLivro(): string
    {
        $id = $this->request->getVar('id');
        $livrosModel = new livrosModel();
        $resultado = $livrosModel->find($id);
        $data['resultado'] = $resultado;
        return view('editarLivro', $data);
    }

    public function updateLivro()
    {
        $id = $this->request->getVar('id');
        $data = array(
            'titulo' =>  $this->request->getVar('titulo'),
            'ano' =>  $this->request->getVar('ano'),
            'autor' =>  $this->request->getVar('autor'),
            'editora' =>  $this->request->getVar('editora')
        );
        $livrosModel = new livrosModel();
        $livrosModel-> update($id, $data);

        $this->session->setFlashdata('livroEditado','Livro editado com sucesso!');
        return redirect()->to('livros');
     
    }
    public function pesquisar()
    {
        $search = $this->request->getVar('pesquisar');
        $db = \Config\Database::connect();
        $builder = $db->table('livros');
        $resultado = $builder->like('titulo', $search)->get()->getResult('array');
        $resultadoAno = $builder->like('ano', $search)->get()->getResult('array');
        $resultadoAutor = $builder->like('autor', $search)->get()->getResult('array');
        $data['resultado'] = $resultado;
        $data['resultadoAno'] = $resultadoAno;
        $data['resultadoAutor'] = $resultadoAutor;

        $meuarray = $this->session->get();
        if (isset($meuarray['adm'])) {
            $data['adm'] = $meuarray['adm'];
        }
        if($search != ''){
            return view('livros', $data);
        }
        else{
            return redirect()->to('livros');
        }
    }


}

