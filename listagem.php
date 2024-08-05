<?php

include 'config.php';

$sql = "SELECT id, titulo, autor, caminho, genero FROM imagens";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        echo '<div class="card">';
        echo '<div class="card-content">';
        echo '<div class="card-img">';
        echo '<img src="' . htmlspecialchars($linha['caminho']) . '" alt="' . htmlspecialchars($linha['titulo']) . '">';
        echo '</div>';
        echo '<div class="idd">';
        echo '<p id ="autor">' . htmlspecialchars($linha['autor']) . '</p>';
        echo '<p id ="titulo">' . htmlspecialchars($linha['titulo']) . '</p>';
        
        echo '<pid ="genero">' . htmlspecialchars($linha['genero']) . '</p>';
        echo '</div>';
        echo '<form action="editar.php" class="bt-trocar" method="GET">';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($linha['id']) . '">';
        echo '<button type="submit" class="bt">Trocar</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p>Nenhum produto disponível.</p>';
}

$conn->close();
?>