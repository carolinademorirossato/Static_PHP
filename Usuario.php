<?php

require_once 'Validador.php';

class Usuario
{
    public string $email;
    public string $senha;

    public function __construct(string $email, string $senha)
    {
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
        // Hash da senha
    }

    public static function salvar(Usuario $usuario): void
    {
        $arquivo = 'usuarios.json';

        if (!file_exists($arquivo)) {
            file_put_contents($arquivo, json_encode([]));
        }

        $dados = json_decode(file_get_contents($arquivo), true);
        $dados[] = [
            'email' => $usuario->email,
            'senha' => $usuario->senha
        ];

        file_put_contents($arquivo, json_encode($dados, JSON_PRETTY_PRINT));
    }

    public static function listar(): array
    {
        $arquivo = 'usuarios.json';

        if(!file_exists($arquivo)) {
            return [];
        }

        return json_decode(file_get_contents($arquivo), true);
    }
}
?>