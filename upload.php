<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'imagens/';
        $uploadFile = $uploadDir . basename($_FILES['imagem']['name']);

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadFile)) {
            $titulo = $_POST['titulo'] ?? '';
            $autor = $_POST['autor'] ?? '';
            $genero = $_POST['genero'] ?? '';

            

            if ($conn->connect_error) {
                die('Falha na conexão: ' . $conn->connect_error);
            }

            $sql = "INSERT INTO imagens (titulo, autor, caminho, genero) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssss', $titulo, $autor, $uploadFile, $genero);

            if ($stmt->execute()) {
                header('Location: add.php');
                exit;
            } else {
                echo 'Erro ao inserir dados: ' . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            echo 'Erro ao fazer o upload do arquivo.';
        }
    } else {
        echo 'Erro: nenhum arquivo enviado.';
    }
}
?>
