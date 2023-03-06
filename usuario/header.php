<script src="https://use.fontawesome.com/fad0de82ab.js"></script>
<div class="pai">
      <div class="coluna1">
        <h1>Rate & Flix</h1>
      </div>
      <div class="coluna2">
        <nav>
          <a href="/TG/index.php">Home</a>
          <a href="/TG/usuario/noticias/noticias.php">Notícias</a>
          <a href="/TG/usuario/criticas/criticas.php">Critícas</a>
          <a href="/TG/usuario/filmes/filmes.php">Filmes</a>
          <a href="/TG/usuario/listas/listas.php">Listas</a>
          <a href="/TG/usuario/sobre/sobre.php">Sobre</a>
        </nav>
      </div>
      <div style="display: flex;">
        <input class="inputfilmes" type='search' name="filme" id="filme">
        <button type="button" name='limpar' id="pesquisar"><i class="fa fa-search" aria-hidden="true"
                    style="font-size: 21px; color: white;"></i></button>
      </div>

      <div class="coluna3">
        <a href="/TG/usuario/perfil/perfil.php">
          <?php
          echo $_SESSION['UsuNome'];
          ?>
        </a>
        <a href="/TG/controle/logout.php">| Sair</a>

      </div>
    </div>