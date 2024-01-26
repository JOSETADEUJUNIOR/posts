<?php

namespace sistema\Biblioteca;

/**
 * Classe Paginar
 *
 * @author Ronaldo Aires
 */
class Paginar
{

    private string $url;
    private int $limite;
    private int $offset;
    private int $pagina;
    private int $total;
    private int $arredor;

    public function __construct(
            string $url,
            int $pagina = 1,
            int $limite = 10,
            int $arredor = 3,
            int $total = 0
    )
    {
        $this->url = $url;
        $this->pagina = $pagina;
        $this->limite = $limite;
        $this->offset = ($this->pagina - 1) * $this->limite;
        $this->total = ceil($total / $this->limite);
        $this->arredor = $arredor;
    }

    public function limite(): int
    {
        return $this->limite;
    }

    public function offset(): int
    {
        return $this->offset;
    }

    public function renderizar(): string
    {
        $paginacao = '<ul class="pagination">';
        $paginacao .= '<li class="page-item">'.$this->anterior().'</li>';
        $paginacao .= '<li class="page-item">'.$this->primeira().'</li>';
        $paginacao .= '<li class="page-item">'.$this->barraPaginacao().'</li>';
        $paginacao .= '<li class="page-item">'.$this->ultima().'</li>';
        $paginacao .= '<li class="page-item">'.$this->proxima().'</li>';
        $paginacao .= '</ul>';

        return $paginacao;
    }

    private function anterior(): ?string
    {
        if ($this->pagina > 1) {
            return ' <a class="page-link" href=" ' . $this->url . '/' . ($this->pagina - 1) . ' ">anterior</a>';
        }elseif($this->pagina > 2) {
            return ' <a class="page-link disabled" href=" ' . $this->url . '/' . ($this->pagina - 1) . ' ">anterior</a>';
        }
        return null;
    }

    private function primeira(): ?string
    {
        if ($this->pagina > 1) {
            return ' <a class="page-link" href=" ' . $this->url . '/1 ">primeira</a>';
        }
        return null;
    }

    private function barraPaginacao(): ?string
    {
        $inicio = max(2, $this->pagina - $this->arredor);
        $fim = min($this->total, $this->pagina + $this->arredor);

        $navegacao = null;

        for ($i = $inicio; $i <= $fim; $i++) {
            if ($i == $this->pagina) {
                $navegacao .= '<span class="page-link active">'.$i . '</span>';
            } else {
                $navegacao .= '<li class="page-item"><a class="page-link" href=" ' . $this->url . '/' . $i . ' ">' . $i . '</a></li>';
            }
        }
        return $navegacao;
    }

    private function ultima(): ?string
    {
        if ($this->pagina < $this->total) {
            return ' <a class="page-link" href=" ' . $this->url . '/' . $this->total . ' ">ultima</a>';
        }
        return null;
    }

    private function proxima(): ?string
    {
        if ($this->pagina < $this->total) {
            return ' <a class="page-link" href=" ' . $this->url . '/' . ($this->pagina + 1) . ' ">Proxima</a>';
        }
        return null;
    }

}
