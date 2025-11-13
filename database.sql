-- Criar banco de dados
CREATE DATABASE IF NOT EXISTS
sistema_login_prod
CHARACTER SET utf8mb4 COLLATE
utf8mb4_unicode_ci;

USE sistema_login_prod;

-- Tabela do usuário
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRiMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha_hash VARCHAR(255) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ultimo_login TIMESTAMP NULL,
    ativo TINYINT(1) DEFAULT 1,
    INDEX idx_email (email),
    INDEX idx_ativo (ativo),
    nivel ENUM('admin', 'user') DEFAULT 'user'
) ENGINE=InnoDB;

-- Tabela para logs de segurança
CREATE TABLE logs_acesso (
    id INT AUTO_INCREMENT PRiMARY KEY,
    usuario_id INT,
    ip_address VARCHAR(45),
    user_agent TEXT,
    data_acesso TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    acao VARCHAR(50),
    sucesso TINYINT(1),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE
    SET NULL
) ENGINE=InnoDB;

CREATE TABLE tokens_reset (
 id INT AUTO_INCREMENT PRIMARY KEY,
 usuario_id INT NOT NULL,
 token VARCHAR(64) NOT NULL,
 expira_em TIMESTAMP NOT NULL,
 usado TINYINT(1) DEFAULT 0,
 FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
 INDEX idx_token (token),
 INDEX idx_expira (expira_em)
);


-- Inserir usuário de exemplo (senha: 12345678)
INSERT INTO usuarios (nome, email, senha_hash) VALUES
("Usuário Teste", "teste@email.com", "25d55ad283aa400af464c76d713c07ad")