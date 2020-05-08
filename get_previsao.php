<?php
    
    define('TOKEN', getenv('CT_TOKEN'));

    function getPrevisao(){
        $message = '';

        $cities = ['6401', '3357', '6711'];
        
        foreach($cities as $c){
            $message .= getCity($c)."\n";
            sleep(6);
        }
        return $message;
    }

    function getCity($c) {

        $message = '';
        
        $url = 'http://apiadvisor.climatempo.com.br/api-manager/user-token/'.TOKEN.'/locales';
    

        //criando o recurso cURL
        $cr = curl_init();
        
        //definindo a url de busca 
        curl_setopt($cr, CURLOPT_URL, $url);
        curl_setopt($cr, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($cr, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($cr, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($cr, CURLOPT_POSTFIELDS, http_build_query(array("localeId" =>array($c))));
        //executando recurso
        
        curl_exec($cr);
        
        curl_close($cr); //fechamos o recurso e liberamos o sistema...
    
        $url_cidade = 'http://apiadvisor.climatempo.com.br/api/v1/forecast/locale/'.$c.'/hours/72?token='.TOKEN;
    
        $cr = curl_init();
        
        //definindo a url de busca 
        curl_setopt($cr, CURLOPT_URL, $url_cidade);
        curl_setopt($cr, CURLOPT_RETURNTRANSFER, 1);
    
        //executando recurso
        $previsao = curl_exec($cr);

        curl_close($cr); //fechamos o recurso e liberamos o sistema...
        
        $previsao = json_decode($previsao);

        $min_temp = 0;
        $max_temp = 0;
        $message .= $previsao->name."\n";
        
        $cont = 0;
        
        foreach($previsao->data as $p){
            $timestamp  = strtotime($p->date);
            $t = $p->temperature->temperature;
            // echo $p->date;
            if ($cont == 0){
                $min_temp = $t;
                $max_temp = $t;
            }else{
                if ($t < $min_temp)
                    $min_temp = $t;
                if ($t > $max_temp)
                    $max_temp = $t;
            }
            if ($cont == 23){
                $cont = 0;
                $message .= date('d/m', $timestamp)."\n";
                $message .= 'min: '.min_temp."\nmax: ".$max_temp."\n";
            }else{
                $cont+=1;
            }
        }

        return $message;

    }
?>