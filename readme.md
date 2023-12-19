# Sistema de Atendimento ao Contribuinte

Sistema desenvolvido para gerenciar o atendimento a contribuintes, permitindo o cadastro de indivíduos, registro de protocolos e prazos.

## Tecnologias Utilizadas

- **MySQL:** Banco de dados para armazenamento de informações.
- **Composer:** Gerenciador de dependências do PHP.
- **PHP:** Linguagem de programação para a lógica do sistema.
- **Bootstrap:** Framework front-end para a interface.
- **Markdown:** Utilizado para documentação.

## Funcionalidades

- **Cadastro de Contribuintes:** Registro de informações pessoais dos contribuintes.
- **Registro de Protocolos:** Possibilidade de criar protocolos para os contribuintes, incluindo descrições e prazos.
- **Gestão de Prazos:** Acompanhamento de prazos estabelecidos para cada protocolo.
- **Pesquisa de Contribuintes por nome:** Busca contribuintes pelo nome.
- **Pesquisa de Protocolos por descrição:** Filtragem de protocolos com base em suas descrições.

## Instalação e Configuração

1. **Clonar o Repositório:**
   ```bash
   git clone https://github.com/seu-usuario/nome-do-repositorio.git
   cd nome-do-repositorio
   ```

2. **Configurar o Banco de Dados:**
- Importar o script fornecido para criar a estrutura do banco de dados.

3. **Instalar dependências PHP pelo Composer:**
    ```bash
    composer install
    ```

4. **Iniciando o servidor:**
- Na raiz do projeto digite o comando abaixo com a porta desejada:
    ```bash
    php -S 0.0.0.0:8000
    ```