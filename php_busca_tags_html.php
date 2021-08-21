<?php
// Retorna um array do conteudo das tags da busca numa string html
//uso: $saida = php_busca_tags_html($string_html, $abertura_de_tag, $fechamento_de_tag);


function php_busca_tags_html($input, $tagstart, $tagend){
        $sobra = " ".$input;
        $tagstart = substr($tagstart, 0, strlen($tagstart)-1);
        $tagend = substr($tagend, 0, strlen($tagend)-1);
        $retorno = false;
        while(strpos($sobra, $tagstart) != 0){
            $isolate = explode($tagstart, $sobra);
            $sobra = $isolate;
            unset($sobra[0]);
            $sobra = implode($tagstart, $sobra);
            
            $resto = $isolate[1];
            $isolate = explode(">", $isolate[1]);
            unset($isolate[0]);
            $is_new = "";
            foreach($isolate as $is){
                    $is_new .= $is.">";
            }
            $isolate = substr($is_new, 0, strlen($is_new)-1);
            $isolate = explode($tagend, $isolate);
            $retorno[] = $isolate[0];
        }
        return ($retorno);

}

