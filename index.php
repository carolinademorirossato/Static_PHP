<?php

require_once 'Usuario.php';

$email = "usuario@teste.com";
$senha = "SenhaForte123";

if (!Validador::emailValido($email)) {
    echo "E-mail inválido\n";
    exit;
}

if (!Validador::senhaValida($senha)) {
    echo "Senha inválida. Deve conter ao menos 6 caracteres e uma letra maíscula.\n";
    exit;
}

// Criar e salvar usuário
$usuario =new Usuario($email, $senha);
Usuario::salvar($usuario);

echo "Usuário salvo com sucesso!\n\n";

// Listar todos
echo "Usuários cadastrados:\n";
print_r(Usuario::listar());
?>