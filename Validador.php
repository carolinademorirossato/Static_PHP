<?php

class Validador
{
    public static function emailValido(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function senhaValida(string $senha): bool
    {
        return strlen($senha) >= 6 && preg_match('/[A-Z]/', $senha);
    }
}
?>