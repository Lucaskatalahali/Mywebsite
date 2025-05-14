<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Extrai a parte antes do @
    $user = explode("@", $email)[0];

    if (empty($email) || empty($password)) {
        // Se o campo estiver vazio, redireciona para o login
        header("Location: ../login.html");
        exit();
    }

    // Verifica se o e-mail é válido e termina com @sakarya.edu.tr
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !str_ends_with($email, "@sakarya.edu.tr")) {
        // Se não for um e-mail válido, redireciona para o login
        header("Location: ../login.html");
        exit();
    }

    // Verifica se a senha é igual ao nome de usuário (sem domínio)
    if ($password === $user) {
        // Login bem-sucedido
        header("Location: ../index.html");
        echo "<h2>Hoşgeldiniz {$user}</h2>";
    } else {
        // Login falhado
        header("Location: ../login.html");
        exit();
    }

} else {
    // Se o método de requisição não for POST, redireciona para o login
    header("Location: login.html");
    exit();
}
?>
