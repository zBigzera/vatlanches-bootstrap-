<?php
// Configurações do banco de dados
include 'conexao.php';

// Verifica se houve erro na conexão
if ($con->connect_error) {
    die("Erro na conexão com o banco de dados: " . $con->connect_error);
}

// Obtém todas as tabelas do banco de dados
$tables = array();
$result = $con->query("SHOW TABLES");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_row()) {
        $tables[] = $row[0];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tabelas do Banco de Dados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .table-container {
            margin-bottom: 20px;
        }

        .table-header {
            cursor: pointer;
            background-color: #f0f0f0;
            padding: 10px;
        }

        .table-content {
            display: none;
            padding: 10px;
            background-color: #ffffff;
        }

        h3 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }
    </style>
    <script>
        function toggleTable(tableId) {
            var tableContent = document.getElementById(tableId);
            if (tableContent.style.display === "none") {
                tableContent.style.display = "block";
            } else {
                tableContent.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <?php foreach ($tables as $table) : ?>
        <div class="table-container">
            <div class="table-header" onclick="toggleTable('<?php echo $table; ?>')">
                <h2>Tabela: <?php echo $table; ?></h2>
            </div>

            <div class="table-content" id="<?php echo $table; ?>">
                <?php
                // Obtém os atributos da tabela
                $sql = "DESCRIBE $table";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    echo "<h3>Atributos:</h3>";
                    echo "<ul>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>{$row['Field']} ({$row['Type']})</li>";
                    }
                    echo "</ul>";
                }

                // Obtém as chaves da tabela
                $sql = "SHOW KEYS FROM $table";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    echo "<h3>Chaves:</h3>";
                    echo "<ul>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>{$row['Column_name']} ({$row['Key_name']})</li>";
                    }
                    echo "</ul>";
                }
                ?>
            </div>
        </div>
    <?php endforeach; ?>

    <?php $con->close(); ?>
</body>
</html>