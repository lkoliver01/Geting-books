<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'config.php';


    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];

    $sql = "UPDATE imagens SET titulo = ?, autor = ?, genero = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $titulo, $autor, $genero, $id);

    if ($stmt->execute()) {
        header('Location: index.php');
        exit;
    } else {
        echo 'Erro ao atualizar dados: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Erro: Método de requisição inválido.';
}
?>