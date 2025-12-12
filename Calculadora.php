<?php
// Classe Calculadora para ser testada pelo PHPUnit
class Calculadora
{
    public function calcular($num1, $num2, $operacao)
    {
        $resultado = 0;
        
        if ($operacao == "soma") {
            $resultado = $num1 + $num2;
        } elseif ($operacao == "subtracao") {
            $resultado = $num1 - $num2;
        } elseif ($operacao == "multiplicacao") {
            $resultado = $num1 * $num2;
        } else {
            // Divisão é o padrão (else)
            $resultado = $num1 / $num2;
        }
        
        return $resultado;
    }
}

// Código do formulário (apenas se não estiver sendo chamado pelos testes)
if (php_sapi_name() !== 'cli') {
?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <title>Teste</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="calculadora.php" method="get">
            Primeiro Numero: <input name="num1" type="text" />
            Segundo numero: <input name="num2" type="text" /> 
            Operação (soma, subtracao, multiplicacao, divisao): <input name="operacao" type="text" /> 
            <input type="submit" value="Calcular" />     
        </form> 
        
        <?php
        if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operacao'])) {
            $a = $_GET['num1'];
            $b = $_GET['num2'];
            $op = $_GET['operacao'];
            
            $calculadora = new Calculadora();
            $c = $calculadora->calcular($a, $b, $op);
            
            echo "<p>O resultado da operação é: $c</p>";
        }
        ?>      
    </body>
</html>
<?php
}
?>