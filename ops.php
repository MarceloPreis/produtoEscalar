<?php

class Ops
{
    public $u;
    public $v;
    public $w;

    function __construct(string $u, string $v, string $w)
    {
        $u = explode(",",$u);
        $v = explode(",",$v);
        $w = explode(",",$w);

        if (count($u) == count($v) && count($v) == count($w)) {
            $this->u = $u;
            $this->v = $v;
            $this->w = $w;
        } else {
            echo "Cada vetor precisa ter o mesmo número de elementos";
        }
    }

    public function produtoEscalar(array $a, array $b)
    {
        $soma = 0;
        for ($i = 0; $i < count($a); $i++) {
            $soma += $a[$i] * $b[$i];
        }
        return $soma;
    }

    public function norma($a)
    {
        return sqrt($this->produtoEscalar($a, $a));
    }

    public function mult(float $num, array $vet)
    {
        for ($i = 0; $i < count($vet); $i++) {
            $vet[$i] = number_format($vet[$i] * $num, 4);
        }
        return $vet;
    }

    public function divisao(float $num, array $vet)
    {
        for ($i = 0; $i < count($vet); $i++) {
            $vet[$i] = number_format($vet[$i]/$num, 4);
        }
        return $vet;
    }

    public function sub(array $a, array $b)
    {
        $vet = [];
        for ($i = 0; $i < count($a); $i++) {
            $vet[$i] = $a[$i] - $b[$i];
        }
        return $vet;
    }

    public function proj($a, $b)
    {
        return $this->mult($this->produtoEscalar($a, $b) / pow($this->norma($b), 2), $b);
    }

    private function isOrtorgonal()
    {
        if ($this->produtoEscalar($this->u, $this->v) == $this->produtoEscalar($this->u, $this->w) &&
            $this->produtoEscalar($this->u, $this->v) == $this->produtoEscalar($this->v, $this->w) &&
            $this->produtoEscalar($this->u, $this->v) == 0){
                return true;    
        }
        return false;
    }

    private function isOrtonomal()
    {
        if($this->isOrtorgonal() && 
           $this->norma($this->u) == 1 &&     
           $this->norma($this->v) == 1 &&     
           $this->norma($this->w) == 1){
                return true;
        }
        return false;
    }

    public function orto()
    {
        if ($this->isOrtonomal()){
            echo "A base já é Ortonormal";
            return;
        }
        $x1 = $this->u;
        $x2 = $this->sub($this->v, $this->proj($this->v, $x1));
        $x3 = $this->sub($this->sub($this->w, $this->proj($this->w, $x1)), $this->proj($this->w, $x2));

        $x1 = $this->divisao($this->norma($x1), $x1);        
        $x2 = $this->divisao($this->norma($x2), $x2);        
        $x3 = $this->divisao($this->norma($x3), $x3);        
        return "
            Nova Base: <br>
            (" . implode(", ", $x1) . ") <br>
            (" . implode(", ", $x2) . ") <br>
            (" . implode(", ", $x3) . ") <br>
        ";  
    }
}
