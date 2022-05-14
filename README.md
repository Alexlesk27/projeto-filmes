## Instruções para uso da aplicação web
- Primeiro clone o repositório do git.
- Depois verifique se está instalado em sua máquina o composer, node js, php e o mysql.
- Se não estiver instalado, baixe e instale
- Após abra o terminal na pasta do repositório e execute os seguintes comandos:
>  - npm install
>  - npm run dev
>  - composer update
 
- Agora copie o arquivo .env.example, cole na pasta do projeto e renomeie o arquivo para .env
- Agora abra o arquivo .env e informe os dados de conexão do seu bancos de dados (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)
- Agora abra o terminal na pasta do repositório e execute os seguintes comandos:
>  - php artisan migrate
>  - php artisan key:generate 
>  - php artisan serve

- Agora abra o link que aparece no terminal no seu navegador
