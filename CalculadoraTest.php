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
    
    //Teste de operações básicas
    
    public function testSoma()
    {
        $resultado = $this->calculadora->calcular(2, 3, "soma");
        $this->assertEquals(5, $resultado);
        
        $resultado = $this->calculadora->calcular(10, 5, "soma");
        $this->assertEquals(15, $resultado);
        
        $resultado = $this->calculadora->calcular(-2, 3, "soma");
        $this->assertEquals(1, $resultado);
    }
    
    public function testSubtracao()
    {
        $resultado = $this->calculadora->calcular(5, 3, "subtracao");
        $this->assertEquals(2, $resultado);
        
        $resultado = $this->calculadora->calcular(10, 10, "subtracao");
        $this->assertEquals(0, $resultado);
        
        $resultado = $this->calculadora->calcular(3, 5, "subtracao");
        $this->assertEquals(-2, $resultado);
    }
    
    public function testMultiplicacao()
    {
        $resultado = $this->calculadora->calcular(2, 3, "multiplicacao");
        $this->assertEquals(6, $resultado);
        
        $resultado = $this->calculadora->calcular(0, 5, "multiplicacao");
        $this->assertEquals(0, $resultado);
        
        $resultado = $this->calculadora->calcular(-2, 3, "multiplicacao");
        $this->assertEquals(-6, $resultado);
    }
    
    public function testDivisao()
    {
        $resultado = $this->calculadora->calcular(6, 2, "divisao");
        $this->assertEquals(3, $resultado);
        
        $resultado = $this->calculadora->calcular(9, 3, "qualquer_coisa");
        $this->assertEquals(3, $resultado);
        
        $resultado = $this->calculadora->calcular(5, 2, "");
        $this->assertEquals(2.5, $resultado);
    }
    
    public function testOperacaoDesconhecida()
    {
        $resultado = $this->calculadora->calcular(8, 4, "potencia");
        $this->assertEquals(2, $resultado); 
        
        $resultado = $this->calculadora->calcular(12, 3, "xyz");
        $this->assertEquals(4, $resultado); // Qualquer operação vai dividir
    }
    
    //Operações complexas
    
    public function testMedia()
    {
        $resultado = $this->calculadora->media(10, 20);
        $this->assertEquals(15, $resultado);
        
        $resultado = $this->calculadora->media(5, 7);
        $this->assertEquals(6, $resultado);
        
        $resultado = $this->calculadora->media(-5, 5);
        $this->assertEquals(0, $resultado);
        

        $resultado = $this->calculadora->media(3, 4);
        $this->assertEquals(3.5, $resultado);
    }
    
    public function testMediaPonderada()
    {

        $resultado = $this->calculadora->mediaPonderada(8, 3, 6, 2);
        $this->assertEquals(7.2, $resultado);
        

        $resultado = $this->calculadora->mediaPonderada(10, 1, 20, 1);
        $this->assertEquals(15, $resultado);
        
        
        $resultado = $this->calculadora->mediaPonderada(100, 0, 50, 4);
        $this->assertEquals(50, $resultado);
    }
    
    public function testPorcentagem()
    {
   
        $resultado = $this->calculadora->porcentagem(10, 100);
        $this->assertEquals(10, $resultado);
        

        $resultado = $this->calculadora->porcentagem(25, 80);
        $this->assertEquals(20, $resultado);
        
        $resultado = $this->calculadora->porcentagem(100, 50);
        $this->assertEquals(50, $resultado);
        
        $resultado = $this->calculadora->porcentagem(5, 200);
        $this->assertEquals(10, $resultado);
    }
    
    public function testRegraDeTres()
    {
        
        $resultado = $this->calculadora->regraDeTres(2, 6, 4);
        $this->assertEquals(12, $resultado);

        $resultado = $this->calculadora->regraDeTres(3, 9, 5);
        $this->assertEquals(15, $resultado);
        
        $resultado = $this->calculadora->regraDeTres(10, 50, 2);
        $this->assertEquals(10, $resultado);
    }
    
    //Teste de exceções
    
    public function testRegraDeTresComZero()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("ValorA não pode ser zero na regra de três");
        
        $this->calculadora->regraDeTres(0, 6, 4);
    }
    
    public function testMediaPonderadaComPesoZero()
    {
        // Deveria funcionar - peso zero é válido
        $resultado = $this->calculadora->mediaPonderada(10, 0, 20, 5);
        $this->assertEquals(20, $resultado); // Só conta o segundo valor
    }
    
    public function testMediaPonderadaComTodosPesosZero()
    {
        $this->expectException(DivisionByZeroError::class);
        $this->calculadora->mediaPonderada(10, 0, 20, 0);
    }
}