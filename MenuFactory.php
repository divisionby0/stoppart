<?php

class MenuFactory
{
    public static function get($lang,$type){
        if($type=="ifarfor"){
            if($lang == "ru"){
                return array(
                    array("ware","Фарфоровая посуда","serv","Сервизы и наборы","stol","Столовые предметы",
                        "grafin","Графины","teacof","Чайные и кофейные предметы","horeca","Посуда для кафе и ресторанов"),
                    array("sculpture","Скульптура","animalist","Анималистическая","janre","Жанровая"),
                    array("crystal","Хрусталь","colour","Цветной хрусталь","bohema","Богемское стекло","tray","Блюда/ подносы","glass","Бокалы/ Фужеры/ Стаканы Рюмки/ Стопки","layout","Вазы для сервировки стола","shtof","Графины/ кувшины/ штофы","caviar","Икорницы/ рыбницы","crset","Хрустальные сервизы"),
                    array("artplate","Декоративные тарелки","stoppard","Декоративные тарелки Stoppard","decoplate","Декоративные тарелки ИФЗ","holder","Подставки для тарелок"),//"vodka","Для водки","water","Для воды","martini","Для мартини","champagne","Для шампанского","glasses","Стеклянная посуда"
                    array("tableware","Столовые приборы","settw","Наборы столовых приборов","single","Отдельные предметы"),
                    array("souvenirs","Сувениры","krstrochka","Крестецкая строчка","ariel","Новогодние игрушки Ариэль","majolica","Ярославская майолика","rings","Колокольчики","dymkatoy","Дымковская игрушка","ceramic","Семикаракорская керамика","souvenir","Сувениры из фарфора","crsouv","Сувениры из хрусталя"),
                    array("interior","Предметы интерьера","vases","Вазы","colour","Вазы из цветного хрусталя","ring","Кольцо для салфеток","candlest","Подсвечники","textile","Текстиль","frame","Фоторамки","casket","Шкатулки и коробочки"));
            }
            else{
                return array(
                    array("ware","Porcelain ware","serv","Tableware & teaware set","stol","Tableware pieces",
                        "grafin","Decanters","teacof","Teaware pieces","horeca","Hotel&restaurant ware"),
                    array("sculpture","Sculpture","animalist","Animalistic","janre","Genre"),
                    array("crystal","Crystal","colour","Coloured crystal","bohema","Glass ware","tray","Tray","glass","Drinking glasses","layout","Vases for table","shtof","Decanters","caviar","Dishes for fish","mugs","Mugs","socket","small crystal vases","crset","Crystal set"),
                    array("artplate","Decorative plates","stoppard","Decorative plates Stoppard","decoplate","Decorative plates IPM","holder","Holder for plates"),
                    array("tableware","Cutlery (Flatware)","settw","Cutlery set","single","Cutlery pieces"),
                    array("souvenirs","Gifts","krstrochka","Kresteckaya strochka","ariel","Christmas toys","majolica","Jaroslavl's majolica","dymkatoy","Dymkovo toys","ceramic","Ceramic gift","souvenir","Porcelain gift","crsouv","Crystal gift"),
                    array("interior","Home & gifts","vases","Vases","colour","Colour crystal vases","ring","Napkin rings","candlest","Candlesticks","textile","Tablecloths & textil napkins","frame","Photo Frames","casket","Boxes & caskets"));
            }
        }
        else{
            if($lang == "ru"){
                return array(
                    array("artplate","Декоративные тарелки","stoppard","Stoppard","holder","Подставки для тарелок"),
                    array("artholder","Подставки","holder","Подставки для тарелок"));
            }else{
                return array(
                    array("artplate","Decorative plates","stoppard","Stoppard","holder","Holder for plates"),
                    array("artholder","Holder","holder","Holder for plates"));
            }
        }
    } 
}