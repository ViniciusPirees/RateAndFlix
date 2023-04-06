# Rate and Flix
<h2>Projeto de conclusão de curso pela FATEC ITU no final do semestre em 2022</h2>

Projeto feito utilizando HTML <img align="center" width='20' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg">, CSS <img align="center" width='20' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg">, JQuery   <img align="center" width='20' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jquery/jquery-original.svg">, PHP <img align="center" width='20' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg"> e MySQL <img align="center" width='20' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg">.

O objetivo principal foi desenvolver um site voltado ao mundo do entretenimento e cultura pop (filmes), criado na plataforma web, para que o crítico possa colocar o filme que assistiu imediatamente ou que tenha assistido por um bom tempo. Deixar uma crítica positiva ou negativa para que outros usuários possam ler e com isso pensar se é necessário assistir ao filme ou não, e dicas de outros filmes e séries. E ler as principais notícias do mundo do entretenimento e cultura pop. 

O site foi desenvolvido junto da API do TMDB, nela conseguimos buscar as informações de todos os filmes da database, que é o maior foco do projeto.   
<div style="display: inline-block">
<img align="center" width='90' src="https://www.themoviedb.org/assets/2/v4/logos/v2/blue_square_2-d537fb228cf3ded904ef09b136fe3fec72548ebc1fea3fbbd1ad9e36364db38b.svg">
<a href="https://developers.themoviedb.org/3/getting-started/introduction">&nbsp&nbsp&nbsp Link para a documentação da API TheMoviesDB</a>
</div>
<br>
<h2>Páginas do Site Rate & Flix</h2>
<h3>Página principal do site</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/telaprincipal.gif" width="580" height="300"/>
<br>
Na página principal do site, é exibido um carrossel com os filmes populares em cartaz, atualizados diariamente por meio da API. Além disso, é possível visualizar as notícias criadas pelo administrador do site, bem como as críticas e listas criadas pelos usuários cadastrados. O cabeçalho da página oferece opções para acessar telas específicas de categorias, listas, filmes por gênero, notícias e informações sobre a criação do site. É possível, ainda, realizar uma busca por um filme específico e realizar login com uma conta existente ou cadastrar-se como novo usuário.

<br>
<h3>Página de Filmes (Visualização)</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/filmes.gif" width="580" height="300"/>
<br>
Apresenta o conteúdo da do filme, como Titulo, Titulo Original, Resumo, Ano, o Elenco e também alguns filmes similares a ele

<br>
<h3>Página de Notícias (Visualização)</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/noticia.gif" width="580" height="300"/>
<br>
Apresenta o conteúdo da notícia juntamente com as últimas notícias publicadas no site, acompanhadas pela categoria correspondente.

<br>
<h3>Página de Listas (Visualização)</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/lista.gif" width="580" height="300"/>
<br>
Apresenta a lista de filmes criado por um usuário cadastrado juntamente com as últimas listas criadas no site, acompanhadas pela categoria correspondente.

<h3>Página de Login e Cadastro</h3>
<div style:"display= inline-block">
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/login.jpg" width="490" height="300"/> &nbsp&nbsp&nbsp 
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/cadastro.jpg" width="490" height="300"/>
</div>
<br>
Na página de cadastro solicita-se algumas informações para serem armazenadas no banco de dados e, na tela de login, o sistema busca o usuário correspondente para acesso à conta.

<br>
<h3>Perfil (Cadastro de Notícias)</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/noticiasperfil.gif" width="580" height="300"/>
<br>
A tela de criação de notícias apresenta campos para inserção do título, texto e imagem de destaque (banner), além da categoria correspondente. É possível visualizar as outras notícias criadas pelo mesmo usuário. Vale ressaltar que apenas um usuário administrador tem permissão para criar notícias no site.

<br>
<h3>Perfil (Cadastro de Notícias)</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/noticiasperfil.gif" width="580" height="300"/>
<br>
A tela de criação de notícias apresenta campos para inserção do título, texto e imagem de destaque (banner), além da categoria correspondente. É possível visualizar as outras notícias criadas pelo mesmo usuário. Vale ressaltar que apenas um usuário administrador tem permissão para criar notícias no site.

<br>
<h3>Perfil (Cadastro de Listas)</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/listaperfil.gif" width="580" height="300"/>
<br>
Na tela de criação de listas o usuário (qualquer usuário cadastrado) pode preencher o título, descrição, categoria, e o mais importante: selecionar os filmes para adicionar na lista. Digitando o nome do filme na busca, ele irá requisitar na API todos os filmes com nomes semelhantes onde o usuário poderá selecionar o filme desejado. Também é possível visualizar as outras listas criadas pelo usuário.

<br>
<h3>Perfil (Cadastro de Listas - Processo de criação)</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/listaperfileditar.gif" width="580" height="300"/>
<br>
O GIF apresenta o processo de criação de listas

<br>
<h3>Perfil (Cadastro de Críticas)</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/criticas.gif" width="580" height="300"/>
<br>
Ao acessar a tela de criação de críticas, o usuário encontra campos destinados à inserção do título da crítica, do próprio texto da avaliação, a nota atribuída ao filme e a escolha do filme que será avaliado. Além disso, é possível visualizar as outras críticas criadas pelo mesmo usuário.
