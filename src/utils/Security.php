<?php

class Security {

    // Remove caracteres perigosos e previne XSS
    public static function sanitizeInput($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, "UTF-8");
    }

    // Gera token único para previnir CSRF
    public static function generateCSRFToken() {
        if (empty($_SESSION["csrf_token"])) {
            $_SESSION["csrf_token"] = bin2hex(random_bytes(32)); // 64 caracteres hex
        }

        return $_SESSION["csrf_token"];
    }

    // Verifica se o token é válido
    public static function verifyCSRFToken($token) {
        return isset($_SESSION["csrf_token"]) && hash_equals($_SESSION["csrf_token"], $token); // Comparação segura
    }

    // Valida o formato do email
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }


    // Valida a força da senha
    public static function validatePassword($password) {
        return strlen($password) >= 8;
    }

    // Valida o tamanho do nome (Quantidades de caracteres e não pode ser nulo(o NOT NULL já está definido no banco))
    public static function validateName($name) {
        return !empty($name) && strlen($name) >= 2 && strlen($name) <= 100;
    }

    // Registra atividades no banco de dados para auditoria
    public static function logAccess($pdo, $user_id, $action, $success) {
        try {
            $sql = "INSERT INTO logs_acesso (usuario_id, ip_address, user_agent, acao, sucesso)
            VALUES (?, ?, ?, ?, ?)";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                $user_id,
                $_SERVER["REMOTE_ADDR"],
                $_SERVER["HTTP_USER_AGENT"] ?? "Unknown",
                $action,
                $success ? 1 : 0

            ]);

            return true;
        } catch (PDOException $e) {
            error_log("Erro ao registrar log: " . $e->getMessage());
            return false;
        }
    }

    public static function redirect($url, $msg = null) {
        if ($msg) {
            $_SESSION["flash_message"] = $msg;
        }

        header("Location:" . $url);
        exit();
    }
}
?>