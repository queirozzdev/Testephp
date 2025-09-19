<?php
class Calculadora
{
    
    public function calcular($a, $b, $operacao)
    {
        switch($operacao) {
            case 'soma':
                return $a + $b;
                
            case 'subtracao':
                return $a - $b;
                
            case 'multiplicacao':
                return $a * $b;
                
            default:
                // Qualquer operação desconhecida vai para divisão
                return $a / $b;
        }
    }
    
    
    public function media($a, $b)
    {
        return $this->calcular($this->calcular($a, $b, 'soma'), 2, 'divisao');
    }
    
   
    public function mediaPonderada($a, $pesoA, $b, $pesoB)
    {
        $numerador1 = $this->calcular($a, $pesoA, 'multiplicacao');
        $numerador2 = $this->calcular($b, $pesoB, 'multiplicacao');
        $numerador = $this->calcular($numerador1, $numerador2, 'soma');
        
        $denominador = $this->calcular($pesoA, $pesoB, 'soma');
        
        return $this->calcular($numerador, $denominador, 'divisao');
    }
    
    
    public function porcentagem($percentual, $valor)
    {
        $multiplicacao = $this->calcular($percentual, $valor, 'multiplicacao');
        return $this->calcular($multiplicacao, 100, 'divisao');
    }
    
    
    public function regraDeTres($valorA, $valorB, $valorC)
    {
        if ($valorA == 0) {
            throw new InvalidArgumentException("O primeiro valor não pode ser zero na regra de três");
        }
        
        $numerador = $this->calcular($valorB, $valorC, 'multiplicacao');
        return $this->calcular($numerador, $valorA, 'divisao');
    }
    
    
    private function validarDivisao($divisor)
    {
        if ($divisor == 0) {
            throw new DivisionByZeroError("Divisão por zero não é permitida");
        }
    }
}    
    