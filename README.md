# 🚌 BUSIFSC

Sistema web simples para gerenciamento de cadastros de usuários, desenvolvido em PHP. Este projeto pode ser utilizado para fins acadêmicos ou como base para sistemas maiores dentro de instituições como o IFSC.

## 📁 Estrutura do Projeto

- `index.php` – Página principal do sistema.
- `cadastro.php` – Tela de cadastro de novos usuários.
- `mostrar-usuario.php` – Listagem de usuários cadastrados.
- `usuario-editar.php` – Tela de edição de dados de usuário.
- `formulario.sql` – Script SQL para criação da tabela no banco de dados.
- `app/` – (Verificar conteúdo, possivelmente scripts auxiliares ou CSS/JS).

## 💾 Requisitos

- Servidor local (XAMPP, WAMP, Laragon, etc.)
- PHP 7.0+
- MySQL

## 🚀 Como Executar

1. Clone ou baixe este repositório.
2. Mova a pasta `Busifsc` para o diretório `htdocs` do seu servidor local.
3. Importe o banco de dados:
   - Acesse o **phpMyAdmin**.
   - Crie um banco de dados (por exemplo, `busifsc`).
   - Importe o arquivo `formulario.sql`.
4. Abra o navegador e acesse:  
   `http://localhost/Busifsc/index.php`

## 🛠️ Tecnologias

- PHP
- MySQL
- HTML/CSS

## 📌 Observações

- Você pode editar os dados da conexão com o banco de dados dentro dos arquivos PHP, se necessário.
- Este projeto pode ser expandido para incluir autenticação, relatórios ou integração com outros sistemas.

## 📄 Licença

Este projeto é de uso acadêmico. Modifique livremente conforme suas necessidades.

---

