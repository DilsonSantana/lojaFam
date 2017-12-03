<?php

echo "
<script type='text/javascript'>alert('" . $_POST['foto'] . "')</script>";    

$foto = $_FILES['foto']['name'];
$arquivo_tmp = $_FILES['foto']['tmp_name'];
$foto = str_replace(" ", "_", $foto);
$foto = str_replace("á", "a", $foto);
$foto = str_replace("à", "a", $foto);
$foto = str_replace("â", "a", $foto);
$foto = str_replace("ã", "a", $foto);
$foto = str_replace("é", "e", $foto);
$foto = str_replace("è", "e", $foto);
$foto = str_replace("ê", "e", $foto);
$foto = str_replace("í", "i", $foto);
$foto = str_replace("ì", "i", $foto);
$foto = str_replace("î", "i", $foto);
$foto = str_replace("ó", "o", $foto);
$foto = str_replace("ò", "o", $foto);
$foto = str_replace("õ", "o", $foto);
$foto = str_replace("ô", "o", $foto);
$foto = str_replace("ç", "c", $foto);
$foto = str_replace("û", "u", $foto);
$foto = str_replace("ù", "u", $foto);
$foto = str_replace("ú", "u", $foto);

$foto = strtolower($foto);

if(file_exists("UI/images/home/$foto"))
{
    $a = 1;
    while(file_exists("UI/images/home/[$a]$foto"))
    {
        $a++;    
    }

    $foto = "[".$a."]$foto";    
}


if(!move_uploaded_file($_FILES['arquivo']['tmp_name'], "UI/images/home/".$foto))
{
    echo "
          <script type='text/javascript'>alert('Erro no upload do arquivo!')</script>";    
}
?>