<?php 
include('../../controle/conexao.php');
if(session_id() == ''){
    session_start();
 }
?>
<div class="formperfil">
    <form action="../../controle/editarperfil.php" method="POST">
        <div class="field">
            <div class="control">
                <input name="Nome" class="inputtit" value="<?php echo $_SESSION['UsuNome'];?>">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input name="SobNome" class="inputtit" value="<?php echo $_SESSION['UsuSobNome'];?>">
            </div>
        </div>
        <div style="display: flex;">
            <div style="width: 50%">
                <button type="submit" class="btnCriarNot">Alterar Perfil</button>
            </div>
        </div>
    </form>
</div>