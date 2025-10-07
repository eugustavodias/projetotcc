<?php

//Função que formata a data para o padrão Brasileiro
function dataFormat($data, $hora = false) {
    if (!$data) return null;

    if($hora) {// Se for necessário, mostra a hora
        return date('d/m/Y H:i:s', strtotime($data));
    } else {//Se não mostrar soemente a Data
        return date('d/m/Y', strtotime($data));
    }
}


//Função que formata a data para o padrão de banco de dados
function dataFormatMysql($data) {
    return date("Y-m-d", strtotime(str_replace('/', '-', $data)));
}

//Função que formata o cpf para retornar apenas numero;
function cpf_only_numbers($cpf) {
    return str_replace(['.','-',' '], '', $cpf);
}

//Função para formartar texto no estilo CPF
function format_cpf($cpf) {
    $cpf = preg_replace("/\D/", '', $cpf);
    return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf);
}

//Função que verifica se o CPF informado é válido
function cpf_valido($cpf) {
    $c = preg_replace('/\D/', '', $cpf);
    if (strlen($c) != 11 || preg_match('/([0-9])\1{10}/', $c)) {
        return false;
    }

    for ($i = 0, $j = 10, $soma1 = 0; $j >= 2; $i++, $j--) {
        $soma1 += (int)$c[$i] * $j;
    }

    for ($i = 0, $j = 11, $soma2 = 0; $j >= 2; $i++, $j--) {
        $soma2 += (int)$c[$i] * $j;
    }

    $resto1 = (($soma1 % 11) < 2) ? 0 : 11 - ($soma1 % 11);
    $resto2 = (($soma2 % 11) < 2) ? 0 : 11 - ($soma2 % 11);

    if ($resto1 != $c[9] || $resto2 != $c[10]) {
        return false;
    }
    return true;
}

function name_user($name) {
    $parts_name = explode(' ', $name);
    $name_user = "";
    foreach($parts_name as $key => $part_name) {
        $name_user .= " {$part_name}";
        if($key == 1) break;
    }
    return $name_user;
}