<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHURRASCO BACANINHA</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { text-align: center; }
        .container { width: 80%; margin: 0 auto; }
        .item-list, .guest-list { margin: 20px 0; }
        .result { background-color: #f0f0f0; padding: 20px; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>CHURRASCO BACANINHA</h1>
    <div class="container">
        <form method="POST" action="">
            <div class="item-list">
                <h2>Lista de Itens do Churrasco</h2>
                <label for="items">Informe de 10 a 20 itens para o churrasco (separados por vírgula):</label><br>
                <input type="text" id="items" name="items" required placeholder="Ex: carne, frango, cerveja, refrigerante...">
            </div>

            <div class="guest-list">
                <h2>Lista de Convidados</h2>
                <label for="guests">Informe o número de convidados (até 30):</label><br>
                <input type="number" id="guests" name="guests" max="30" required placeholder="Ex: 10">
            </div>

            <input type="submit" value="Calcular Consumo">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Receber dados
            $items = explode(',', $_POST['items']); // Separar os itens por vírgula
            $guests = intval($_POST['guests']); // Número de convidados

            // Calcular quantidades (simulação básica)
            $solidos_por_pessoa = 0.5; // kg de sólidos (carne, frango) por pessoa
            $liquidos_por_pessoa = 1.5; // litros de bebidas por pessoa

            $total_solidos = $guests * $solidos_por_pessoa;
            $total_liquidos = $guests * $liquidos_por_pessoa;

            echo "<div class='result'>";
            echo "<h3>Lista de Compras para o Churrasco:</h3>";
            echo "<ul>";
            foreach ($items as $item) {
                echo "<li>" . htmlspecialchars(trim($item)) . "</li>";
            }
            echo "</ul>";

            echo "<p><strong>Quantidade total de sólidos necessários:</strong> " . $total_solidos . " kg</p>";
            echo "<p><strong>Quantidade total de líquidos necessários:</strong> " . $total_liquidos . " litros</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>