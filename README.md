# [JEF Gestão](https://github.com/JoaoPedroSH/JEF-Gestao)

## Preview


## Usage

Instalar dependencias do sistema: `npm install`.

`npm start`: Abrirá uma visualização do modelo no navegador padrão.

`gulpfile.js`: Visualiza as tarefas que estão incluídas no ambiente de desenvolvimento.

Cria arquivo funcional das variáveis de ambiente: `cp config/environment.example.ini config/environment.ini`.

### Gulp Tasks

* `gulp` the default task that builds everything
* `gulp watch` browserSync opens the project in your default browser and live reloads when changes are made
* `gulp css` compiles SCSS files into CSS and minifies the compiled CSS
* `gulp js` minifies the themes JS file
* `gulp vendor` copies dependencies from node_modules to the vendor directory

You must have npm installed globally in order to use this build environment. This theme was built using node v11.6.0 and the Gulp CLI v2.0.1. If Gulp is not running properly after running `npm install`, you may need to update node and/or the Gulp CLI locally.