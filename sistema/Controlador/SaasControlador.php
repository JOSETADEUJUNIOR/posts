<?php

namespace sistema\Controlador;

use sistema\Nucleo\Controlador;
use sistema\Nucleo\Helpers;
use sistema\Nucleo\Sessao;

class SaasControlador extends Controlador
{
    private $usuario;


    public function __construct()
    {
      parent::__construct('');
      $this->usuario = UsuarioControlador::usuario();

      if (!$this->usuario or $this->usuario->level != 1) {
        $this->mensagem->alerta('Área exclusiva para usuários!')->flash();

        $sessao = new Sessao();
        $sessao->limpar('usuarioId');

        Helpers::redirecionar();
      }
     
    }

    public function index(): void
    {   
        echo 'painel do usuario - '. $this->usuario->nome.' - level:'. $this->usuario->level ;

    }

    public function cadastrar(): void
    {
        if ($this->usuario->level ==1) {
            echo 'pode cadastrar algo';
        }else{
            echo 'não pode cadastrar';
        }

    }
}