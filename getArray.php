<?php

// Создаем объекты начальной и конечной дат
$startDate = date_create($_POST["startDate"]);
$endDate = date_create($_POST["endDate"]);

// Получим массив массивов (курсов и дат), Вызвав функции getArray
$doubleArray = getArray($startDate, $endDate);

echo json_encode($doubleArray);

/********************************************************
*
*********************************************************/

// Описание функции getArray
function getArray($startDate, $endDate){

    // Подготовим массивы для заполнения
    $course = [];
    $date = [];

    // Читаем XML-файл и создаем объект на его основе (https://www.cbr.ru/development/sxml/ 2-й пример)
    $xml = file_get_contents("https://www.cbr.ru/scripts/XML_dynamic.asp?date_req1=".$startDate->format('d/m/Y')."&date_req2=".$endDate->format('d/m/Y')."&VAL_NM_RQ=R01235");
    $sxe = new SimpleXMLElement($xml);

    // Заносим данные в массив
    for($j = 0; $j < count($sxe->Record); $j++){
        $sxe->Record[$j];
        $advanced_string = str_replace(",",".",$sxe->Record[$j]->Value); // если оставить запятые, то (float)$advanced_string будет целым числом
        $course[] = (float)$advanced_string;
        $date[] = (string)$sxe->Record[$j]["Date"];
    }

    return [$course, $date];

}

?>