    <!-- partial -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
    <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
    <script src="/JS/swiper-bundle.min.js"></script>
    <script src="../../scripts/scriptsmain.js"></script>

    <script>

      $(document).ready(function () {
        $('#pesquisar').click(function (e) {
          window.location.href = 'filmes/pesquisafilmes.php?filme=' + $('#filme').val()
        });
      });
    </script>