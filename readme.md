# BD-GE:earth_americas:
 
Este é um projeto de CRUD desenvolvido em PHP-Laravel (5.5) como parte técnica da 2ª avaliação de desempenho de trainees Globalweb 2021.

O sistema BD-GEO tem como objetivo cadastrar continentes, países e cidades, com alguns dados sobre estes tópicos.

Segue abaixo o passo a passo para instalação do projeto em sua máquina:

1. Faça o clone do projeto via git;
2. Usando o cmd ou terminal, vá até a pasta do onde clonou o projeto;
3. Compie o arquivo .env.example para .env na pasta do projeto. Pode-se usar para Windows: `copy .env.example .env`, ou, `cp .env.example .env`, para Ubuntu;
4. No arquivo .env gerado, altere as informações de nome do banco de dados (DB_DATABASE), nome de usuário (DB_USERNAME) e senha (DB_PASSWORD) de acordo com as configurações da sua máquina;
5. Execute `php artisan key:generate`;
6. Execute `php artisan migrate`;
7. Execute `php artisan storage:link`;
8. Execute `php artisan serve`;
9. Acesse localhost:8000 (padrão Laravel) ou na porta em que sua máquina estiver configurada.