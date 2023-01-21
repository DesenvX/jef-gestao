# [JEF Gestão](https://github.com/JoaoPedroSH/JEF-Gestao)

## Preview


## Usage

Instalar dependencias do sistema: `npm install`.

`npm start`: Abrirá uma visualização do modelo no navegador padrão.

`gulpfile.js`: Visualiza as tarefas que estão incluídas no ambiente de desenvolvimento.

Cria arquivo funcional das variáveis de ambiente: 
````sh 
cp config/environment.example.ini config/environment.ini 
````

##### Gulp Tasks

* `gulp` a tarefa padrão que constrói tudo
* `gulp watch` browserSync abre o projeto em seu navegador padrão e recarrega ao vivo quando as alterações são feitas
* `gulp css` compila arquivos SCSS em CSS e reduz o CSS compilado
* `gulp js` minimiza o arquivo JS dos temas
* `gulp vendor` copia as dependências de node_modules para o diretório do fornecedor

##### Requisitos
Você deve ter o npm instalado globalmente para usar este ambiente de construção. Este tema foi construído usando o Node v11.6.0 e o Gulp CLI v2.0.1. 
Se o Gulp não estiver funcionando corretamente depois de executar `npm install`, pode ser necessário atualizar o Node e/ou a CLI do Gulp localmente.