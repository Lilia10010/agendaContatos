<?php

function apagar_imagens($caminho, $extensao){
    switch($extensao){
        case ".jpg":
        if(file_exists($caminho."png"))
            unlink($caminho.".png");
        if(file_exists($caminho."gif"))
            unlink($caminho.".gif");
        break;
        
    case ".gif":
        if(file_exists($caminho."png"))
            unlink($caminho.".png");
        if(file_exists($caminho."jpg"))
            unlink($caminho.".jpg");
        break;
        
    case ".png":
        if(file_exists($caminho."jpg"))
            unlink($caminho.".jpg");
        if(file_exists($caminho."gif"))
            unlink($caminho.".gif");
        break;
    }
}


// Função para subir a imagem do usuário
function subir_imagem($tipo, $imagem, $email){
    
    //verificar se realmente é imagem que o usuário está subindo
    if(strstr($tipo, "image")){
        if(strstr($tipo, "jpeg"))
            $extensao = ".jpg";
        else if(strstr($tipo, "gif"))
            $extensao = ".gif";
        else if(strstr($tipo, "png"))
            $extensao = ".png";
        
        //verificacao do tamanho correto da imagem 420 px
        $tam_img = getimagesize($imagem);
        $largura_img = $tam_img[0];
        $altura_img = $tam_img[1];
        $largura_img_desejada = 180;
        
        //se o tamanho da imagem for maior, então ajuste
        if($largura_img > $largura_img_desejada){
            $nova_largura_img = $largura_img_desejada;
            $nova_altura_img = ($altura_img/$largura_img)*$nova_largura_img;
            
            $img_reajustada = imagecreatetruecolor($nova_largura_img, $nova_altura_img);
            
            //criar imagem baseada na imagem original e inserir dentro da área img reajustada criada
            
            switch($extensao){
                case ".jpg":
                $img_original = imagecreatefromjpeg($imagem);
                //reajustar a imagem com os novos tamanhos
                imagecopyresampled($img_reajustada, $img_original, 0, 0,0, 0, $nova_largura_img, $nova_altura_img, $largura_img, $altura_img);
                
                //salvar a imagem modificada no servidor
                $nome_img_ext = "../img/fotos/".$email.$extensao;
                $nome_img = "../img/fotos/".$email;
                imagejpeg($img_reajustada, $nome_img_ext, 100);
                
                //funcao para apagar imagens duplicadas

                apagar_imagens($nome_img, ".jpg");
                break;
                
                
            case ".gif":
                $img_original = imagecreatefromgif($imagem);
                //reajustar a imagem com os novos tamanhos
                imagecopyresampled($img_reajustada, $img_original, 0, 0,0, 0, $nova_largura_img, $nova_altura_img, $largura_img, $altura_img);
                
                //salvar a imagem modificada no servidor
                $nome_img_ext = "../img/fotos/".$email.$extensao;
                $nome_img = "../img/fotos/".$email;
                imagegif($img_reajustada, $nome_img_ext, 100);
                
                //funcao para apagar imagens duplicadas

                apagar_imagens($nome_img, ".gif");
                break;
                
            
            case ".png":
                $img_original = imagecreatefrompng($imagem);
                //reajustar a imagem com os novos tamanhos
                imagecopyresampled($img_reajustada, $img_original, 0, 0,0, 0, $nova_largura_img, $nova_altura_img, $largura_img, $altura_img);
                
                //salvar a imagem modificada no servidor
                $nome_img_ext = "../img/fotos/".$email.$extensao;
                $nome_img = "../img/fotos/".$email;
                imagepng($img_reajustada, $nome_img_ext);
                
                //funcao para apagar imagens duplicadas

                apagar_imagens($nome_img, ".png");
                break;
            
            }
            
            
        }else{
            //inserir o caminho onde será guardada a img
            $destino = "../img/fotos/".$email.$extensao;
            //subir a imagem
            move_uploaded_file($imagem, $destino) or die("Não foi possível subir a imagem");
            //funcao para apagar imagens duplicadas
            $nome_img = "../img/fotos/".$email;
            apagar_imagens($nome_img, $extensao);
        }
        //O nome da imagem será o email . extensão da img
        $imagem = $email.$extensao;
        return $imagem;
    }else{
        return false;
    }
}

?>