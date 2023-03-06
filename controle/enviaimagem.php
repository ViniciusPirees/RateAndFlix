<?php
include('conexao.php');

if (isset($_FILES["imagem"])) {
    $img_name = $_FILES['imagem']['name'];
	$img_size = $_FILES['imagem']['size'];
	$tmp_name = $_FILES['imagem']['tmp_name'];
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $allowed_exs = array("jpg", "jpeg", "png");
    if (in_array($img_ex_lc, $allowed_exs)) {
  
        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;

        # crating upload path on root directory
        $img_upload_path = "../imagensnoticias/".$new_img_name;

        # move uploaded image to 'uploads' folder
        move_uploaded_file($tmp_name, $img_upload_path);

        # inserting imge name into database
        $sql = "INSERT INTO imagens (ImgNome)
                VALUES ('$new_img_name')";
        mysqli_query($conexao, $sql);
        echo '<input type="hidden" name="imgnome" value="'.$new_img_name.'">
        <img id="imgnoticia" src="../../imagensnoticias/'.$new_img_name.'">';
    }
}

/*
include('../controle/conexao.php');
$nome = $_FILES['imagem']['nome'];
$tipo = $_FILES['imagem']['tipo'];
$data = file_get_contents($_FILES['imagem']['tmp_nome']);
$stmt = $conexao->prepare("insert into imagens values('',?,?,?)");
$stmt-> bind_Param(1, $nome);
$stmt->bind_Param(2, $tipo);
$stmt->bind_Param(3, $data);
$stmt->execute();
*/
?>