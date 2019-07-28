<?php 
class Utils{
    
    const SABADO = "Saturday";
    const DOMINGO = "Sunday";

    public static function lerArquivo() {
        if(is_file("petshops.json")) {
            try {
                return json_decode(file_get_contents("petshops.json"));
            } catch (Exception $e) {
                throw new Exception("Falha ao realizar parse do arquivo json de entrada.");
            }
        } else {
            throw new Exception("Arquivo de entrada dos petshops não foi encontrado");
        }
    }
    public static function getFds($data, $format = 'd/m/Y') {
       return in_array((DateTime::createFromFormat($format, $data))->format('l'), [self::SABADO, self::DOMINGO]);
    }
}