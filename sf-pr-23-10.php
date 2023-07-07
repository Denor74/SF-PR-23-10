<?php

// определяем общую функцию отвечающую за движение вперед или назад 
interface  AutoInterface {

function moveAuto($move); // определяем функцию отвечающую за движение, где число определяет напрвление движения

// Способность включать дворники
function wipersFun(bool $wipers);

// Способность сигналить
public function honkFun(bool $honk);

}

// абстрактный класс Auto описывает общее для всех авто - движение вперёд и назад
abstract class Avto implements AutoInterface {
    public $interion = 'Салон без отделки';
     // public $move;  // переменная определяющая направление движения например 1 вперёд 2 назад

     public function moveAuto($move)
     {
        $outputMove = 'стоим на месте';
        if ($move == 1) {
            $outputMove = 'Едем вперёд';
       } if ($move == 2) {
            $outputMove = 'Едем назад';
       }
        return $outputMove; // определяем движение
     }

     public function wipersFun(bool $wipers) {
        $wipersOut = 'Дворники';
        //включаем или выключаем дворники
        if ($wipers) {
            $wipersOut = 'Махаю дворниками';
            echo $wipersOut;
        } else {
            $wipersOut = 'Дворники выключены';
            echo $wipersOut;
        }
        return $wipersOut;
     }
     // Способность сигналить
     public function honkFun(bool $honk) {
        $honkOut = 'би-биб';
        //бибикать или не бибикать
        if ($honk === false) {
            $honkOut = 'НЕ буду бибикать';
          
        } 
        echo $honkOut;
        return $honkOut;
     }


}

class Car extends Avto {
    public $name = 'Автомобиль';
    // public function moveAuto($move)
    // {
    //    echo $move .PHP_EOL; // тут логика движения 
    //    return $this->move;
    // }
    // Включаем нитро

    public $interion = 'Салон кожаный';
    public function propertyAuto() {
        // значение нитро
        $nitro = 'включение нитро';
        //echo $nitro .PHP_EOL;
        return $nitro;
    }

    
}

class SpecialEquipment extends Avto {
    public $name = 'Спецтехника';
    // public function moveAuto($move)
    // {
    //    echo $move .PHP_EOL; // тут логика движения 
    //    return $this->move;
    // }
    public $interion = 'Салон велюровый';
    public function propertyAuto() {

        // свойство движение ковшом
        $bucket = 'движение ковшом';
        //echo $bucket .PHP_EOL;
        return $bucket;
    }
}


class Tank extends Avto {
    public $name = 'Танк';
    // public function moveAuto($move)
    // {
    //    echo $move .PHP_EOL; // тут логика движения 
    //    return $this->move;
       
    // }

    public function propertyAuto() {

        // свойство стрелять
        $shoot = 'Стреляем по цели';
        //echo $shoot .PHP_EOL;
        return $shoot;
    }
}

// класс выбора транспорта
class ChoosAuto {
    public static function choosAvto($avto) {
        // возвращаем объект транспортного средства
        $objAvto_name = $avto;
        echo $objAvto_name .PHP_EOL;
        return $objAvto = new $objAvto_name;
    }
}



// Функция вывода свойств транспорта
function eventAuto($objAvto, $move, $wipers, $honk) {
    $objAvto = ChoosAuto::choosAvto($objAvto);
    // Выводим название транспорта
    $name = $objAvto->name;
    echo $name . PHP_EOL;
    //Определяем движение
    $move = $objAvto->moveAuto($move);
    echo $move . PHP_EOL;
    // Вызываем основное индивидуальное свойство транспорта
    $property = $objAvto->propertyAuto();
    echo $property . PHP_EOL;
    // Включить дворники
    $wipers = $objAvto->wipersFun($wipers);
    echo PHP_EOL;
    // бибикать или нет
    $honk = $objAvto->honkFun($honk);
    echo PHP_EOL;
    // Отделка салона
    echo $objAvto->interion . PHP_EOL;
}


// Первое значение тип транспорта: Car, SpecialEquipment, Tank
// Второе значение двигаемся: 1 - вперед, 2 - назад, 0 - стоим на месте
// Третье значение работа дворниками (bool)
// четвёртое значение работа Сигнала (bool)
eventAuto('Tank', 0, false, false);

?>

