<?php

class DeliveryDataFactory
{
    public static function getString($lang){
        if($lang == "en"){
            return 'Terms of delivery.<HR style="height: 2px;border: none; color: black; background-color: black;">
	Delivery is possible anywhere in the world. We cooperate with Fedex and DHL.<br>
	The exact cost of delivery can be calculated after the formation of the order.<br>
	<br>
	Delivery in Russia is carried out in cooperation with the SDEC.<br>
	Стоимость доставки по России определяется тарифами службы доставки.<br>
	Например, стоимость доставки по городу Тольятти при заказе до 5000рублей составит 300 рублей.<br>
	When the cost of the order is more than 10000rubles - delivery to the address in any city of Russia is free *<br><br>
	* In case the delivery service has delivery points in the settlement where the address of the recipient is located.<br><br>';
        }
        else{
            return 'Общие условия доставки.<HR style="height: 2px;border: none; color: black; background-color: black;">
	Доставка по России осуществляется в сотрудничестве с международной службой доставки СДЭК.<br>
	Стоимость доставки по России определяется тарифами службы доставки.<br>
	Например, стоимость доставки по городу Тольятти при заказе до 5000рублей составит 300 рублей.<br>
	Стоимость доставки по городу Москве при заказе до 5000рублей составит в среднем от 300 до 500 рублей.<br>
	При заказе от 5000 рублей - доставка до пункта выдачи в любом городе России - бесплатна*.<br>
	При стоимости заказа свыше 10000рублей - доставка до адреса в любом городе России бесплатна*.<br><br>
	Точная стоимость доставки будет рассчитана и сообщена заказчику по телефону менеджером сайта после формирования заказа и указания адреса получения.<br><br>
	*В случае, если у службы доставки есть пункты выдачи в населенном пункте, где расположен адрес получателя.<br><br>
	Возможна доставка в любую точку мира, стоимость и сроки доставки рассчитает менеджер сайта, после создания заказа и сообщит по телефону.';
        }
    }
}