<?php
use PHPUnit\Framework\TestCase;

require_once 'Calculadora.php';

class CalculadoraTest extends TestCase
{
    private $calculadora;
    
    protected function setUp(): void
    {
        $this->calculadora = new Calculadora();
    }
    
    // Teste para soma
    public function testSoma()
    {
        $resultado = $this->calculadora->calcular(2, 3, "soma");
        $this->assertEquals(5, $resultado);
        
        $resultado = $this->calculadora->calcular(10, 5, "soma");
        $this->assertEquals(15, $resultado);
        
        $resultado = $this->calculadora->calcular(-2, 3, "soma");
        $this->assertEquals(1, $resultado);
    }
    
    // Teste para subtração
    public function testSubtracao()
    {
        $resultado = $this->calculadora->calcular(5, 3, "subtracao");
        $this->assertEquals(2, $resultado);
        
        $resultado = $this->calculadora->calcular(10, 10, "subtracao");
        $this->assertEquals(0, $resultado);
        
        $resultado = $this->calculadora->calcular(3, 5, "subtracao");
        $this->assertEquals(-2, $resultado);
    }
    
    // Teste para multiplicação
    public function testMultiplicacao()
    {
        $resultado = $this->calculadora->calcular(2, 3, "multiplicacao");
        $this->assertEquals(6, $resultado);
        
        $resultado = $this->calculadora->calcular(0, 5, "multiplicacao");
        $this->assertEquals(0, $resultado);
        
        $resultado = $this->calculadora->calcular(-2, 3, "multiplicacao");
        $this->assertEquals(-6, $resultado);
    }
    
    // Teste para divisão (operação padrão - else)
    public function testDivisao()
    {
        $resultado = $this->calculadora->calcular(6, 2, "divisao");
        $this->assertEquals(3, $resultado);
        
        $resultado = $this->calculadora->calcular(9, 3, "qualquer_coisa");
        $this->assertEquals(3, $resultado); // Vai pro else = divisão
        
        $resultado = $this->calculadora->calcular(5, 2, "");
        $this->assertEquals(2.5, $resultado);
    }
    
    // Teste para operação não reconhecida (vai para else = divisão)
    public function testOperacaoDesconhecida()
    {
        $resultado = $this->calculadora->calcular(8, 4, "potencia");
        $this->assertEquals(2, $resultado); // Como não é soma/sub/mult, vai dividir
        
        $resultado = $this->calculadora->calcular(12, 3, "xyz");
        $this->assertEquals(4, $resultado); // Qualquer operação vai dividir
    }
}