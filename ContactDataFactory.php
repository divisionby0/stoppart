<?php


class ContactDataFactory
{
    public static function getString($lang){
        if($lang=="en"){
            return '<b>Addresses and phone numbers of stores</b><HR style="height: 2px;border: none; color: black; background-color: black;">
	<b>Russia, Saratov</b><br><br><a href="https://www.google.ru/maps/place/%D1%83%D0%BB.+%D0%92%D0%BE%D0%BB%D1%8C%D1%81%D0%BA%D0%B0%D1%8F,+87,+%D0%A1%D0%B0%D1%80%D0%B0%D1%82%D0%BE%D0%B2,+%D0%A1%D0%B0%D1%80%D0%B0%D1%82%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB.,+410000/@51.5334043,46.0227858,17z/data=!3m1!4b1!4m5!3m4!1s0x4114c7b89f8405e1:0x8aa73aca80509ebf!8m2!3d51.533401!4d46.0249745"
	target="_blank">Volsky st., 87<br> phone number: +7 (8452) 46-90-70 <br>Open all days: from 10:00 till 20:00</a><br>
	<br>
	<HR><b>Russia, Kazan</b><br><br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@55.7909555,49.1055376,17z/data=!3m1!4b1!4m5!3m4!1s0x415ead18459d845d:0x7ca145cf40bfbdfe!8m2!3d55.7909525!4d49.1077263"
	target="_blank">Chernyshevsky st., 27a, <br>phone number: +7 (843) 245-27-99 <br>Open all days: from 10:00 till 20:00</a><br>
	<br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@55.7932628,49.1486481,17z/data=!3m1!4b1!4m5!3m4!1s0x415ead717a861767:0x5a9a98bd6a7d9c6!8m2!3d55.7932598!4d49.1508368"
	target="_blank">Hotel&Shopping Center Korston, Ershov st., 1a, ground floor<br>phone number: +7 (843) 245-12-99 <br>Open all days: from 10:00 till 22:00</a><br>
	<br>
	<HR><b>Russia, Ulyanovsk</b><br><br><a href="https://www.google.ru/maps/place/%D1%83%D0%BB.+%D0%93%D0%BE%D0%BD%D1%87%D0%B0%D1%80%D0%BE%D0%B2%D0%B0,+5,+%D0%A3%D0%BB%D1%8C%D1%8F%D0%BD%D0%BE%D0%B2%D1%81%D0%BA,+%D0%A3%D0%BB%D1%8C%D1%8F%D0%BD%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB.,+432000/@54.3098474,48.3939591,17z/data=!4m13!1m7!3m6!1s0x415d3712a1477c0f:0x433483926c91e1fc!2z0YPQuy4g0JPQvtC90YfQsNGA0L7QstCwLCA1LCDQo9C70YzRj9C90L7QstGB0LosINCj0LvRjNGP0L3QvtCy0YHQutCw0Y8g0L7QsdC7LiwgNDMyMDAw!3b1!8m2!3d54.310273!4d48.395901!3m4!1s0x415d3712a1477c0f:0x433483926c91e1fc!8m2!3d54.310273!4d48.395901"
	target="_blank">Goncharova st., 5, <br>phone number: +7 (8422) 70-36-40 <br>Open all days: from 10:00 till 20:00</a><br>
	<br>
	<HR><b>Russia, Ufa</b><br><br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@54.7262411,55.938389,17z/data=!3m1!4b1!4m5!3m4!1s0x43d93a4329b38ba7:0x8a5c59ffb17ee864!8m2!3d54.7262411!4d55.9405777"
	target="_blank">Karl Marx st., 25, <br>phone number: +7 (347) 266-58-86 <br>Open all days: from 10:00 till 20:00</a><br>
	<br>
	<HR><b>Russia, Samara</b><br><br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.1868906,50.0887003,17z/data=!3m1!4b1!4m5!3m4!1s0x41661e17982eff57:0xd6396e0f7bc86803!8m2!3d53.1868874!4d50.090889"
	target="_blank">Frunze st., 86, <br>phone number: +7 (846) 277-03-86 <br>Open all days: from 10:00 till 20:00<br></a>
	<br>
	<a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.212534,50.1796523,17z/data=!3m1!4b1!4m5!3m4!1s0x41661ea35056d5b3:0x200099537d46c4a5!8m2!3d53.2125308!4d50.181841!6m1!1e1"
	target="_blank">Shopping center Rus-at-Volga, Moskovskoe highway, 15B, ground floor, <br>phone number: +7 (846) 277-08-23 <br>Open all days: from 10:00 till 21:00<br></a>
	<br>
	<HR><b>Russia, Toglyatti</b><br><br>
	<a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.5009726,49.2712072,17z/data=!3m1!4b1!4m5!3m4!1s0x41687bcd78f69091:0x967b08739ab39798!8m2!3d53.5009694!4d49.2733959"
	target="_blank">Shopping center Vega, Yubileinaya st., 40, room 144<br>phone number: +7 (8482) 78-39-70 <br>Open all days: from 10:00 till 21:00<br></a>
	<br>
	<a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.5096364,49.4205637,17z/data=!3m1!4b1!4m5!3m4!1s0x41687f33af3ade19:0xff53ee2051812291!8m2!3d53.5096332!4d49.4227524"
	target="_blank">Pobedy st., 78<br>phone number: +7 (8482) 78-15-33  <br>Open all days: from 10:00 till 20:00</a><br><br>
	<HR style="height: 2px;border: none; color: black; background-color: black;">
	<b>Imperial porcelain in social networks</b><HR style="height: 2px;border: none; color: black; background-color: black;">
	<b>Facebook</b><br><a href="https://www.facebook.com/ifarfor/" target="_blank">
	https://www.facebook.com/ifarfor/</a><br>
	<HR>
	<b>VK</b><br><a href="https://vk.com/ipmclub" target="_blank">https://vk.com/ipmclub</a><br>
	<HR>
	<b>Instagram</b><br><a href="https://www.instagram.com/ifarfor/" target="_blank">https://www.instagram.com/ifarfor/</a><br>
	<HR style="height: 1px;border: none; color: black; background-color: black;">
	<a href="/en/company/" target="_top"><b>Requisites</b></a>
	<HR style="height: 1px;border: none; color: black; background-color: black;">
	<a href="/en/delivery/" target="_top"><b>Terms of delivery</b></a>
	<HR style="height: 1px;border: none; color: black; background-color: black;">
	<b>Email</b><HR style="height: 1px;border: none; color: black; background-color: black;">
	For orders and cooperation: order2 @ ifarfor . ru <br><br><br><br>';
        }
        else{
            return '<b>Адреса и телефоны магазинов</b><HR style="height: 2px;border: none; color: black; background-color: black;">
	<b>г. Саратов</b><br><br><a href="https://www.google.ru/maps/place/%D1%83%D0%BB.+%D0%92%D0%BE%D0%BB%D1%8C%D1%81%D0%BA%D0%B0%D1%8F,+87,+%D0%A1%D0%B0%D1%80%D0%B0%D1%82%D0%BE%D0%B2,+%D0%A1%D0%B0%D1%80%D0%B0%D1%82%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB.,+410000/@51.5334043,46.0227858,17z/data=!3m1!4b1!4m5!3m4!1s0x4114c7b89f8405e1:0x8aa73aca80509ebf!8m2!3d51.533401!4d46.0249745"
	target="_blank">ул. Вольская, 87 (между проспектом Кирова и Большой Казачьей),<br>
	телефон: +7 (8452) 46-90-70 <br>график работы: с 10:00 до 20:00 без выходных </a><br>
	<br>
	<HR><b>г. Ульяновск</b><br><br><a href="https://www.google.ru/maps/place/%D1%83%D0%BB.+%D0%93%D0%BE%D0%BD%D1%87%D0%B0%D1%80%D0%BE%D0%B2%D0%B0,+5,+%D0%A3%D0%BB%D1%8C%D1%8F%D0%BD%D0%BE%D0%B2%D1%81%D0%BA,+%D0%A3%D0%BB%D1%8C%D1%8F%D0%BD%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB.,+432000/@54.3098474,48.3939591,17z/data=!4m13!1m7!3m6!1s0x415d3712a1477c0f:0x433483926c91e1fc!2z0YPQuy4g0JPQvtC90YfQsNGA0L7QstCwLCA1LCDQo9C70YzRj9C90L7QstGB0LosINCj0LvRjNGP0L3QvtCy0YHQutCw0Y8g0L7QsdC7LiwgNDMyMDAw!3b1!8m2!3d54.310273!4d48.395901!3m4!1s0x415d3712a1477c0f:0x433483926c91e1fc!8m2!3d54.310273!4d48.395901"
	target="_blank">ул. Гончарова, 5, рядом с гостиницей «Волга»<br>телефон: +7 (8422) 70-36-40 <br>график работы с 10:00 до 20:00 без выходных  </a><br>
	<br>
	<HR><b>г. Казань</b><br><br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@55.7909555,49.1055376,17z/data=!3m1!4b1!4m5!3m4!1s0x415ead18459d845d:0x7ca145cf40bfbdfe!8m2!3d55.7909525!4d49.1077263"
	target="_blank">ул. Чернышевского, 27а, телефон: +7 (843) 245-27-99 <br>график работы: с 10:00 до 20:00 без выходных </a><br>
	<br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@55.7932628,49.1486481,17z/data=!3m1!4b1!4m5!3m4!1s0x415ead717a861767:0x5a9a98bd6a7d9c6!8m2!3d55.7932598!4d49.1508368"
	target="_blank">ГТРК «Корстон», ул. Николая Ершова, 1А, левый вход, первый этаж, напротив «Le Buffet», <br>телефон: +7 (843) 245-12-99 <br>график работы с 10:00 до 22:00 без выходных </a><br>
	<br>
	<HR><b>г. Уфа</b><br><br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@54.7262411,55.938389,17z/data=!3m1!4b1!4m5!3m4!1s0x43d93a4329b38ba7:0x8a5c59ffb17ee864!8m2!3d54.7262411!4d55.9405777"
	target="_blank">ул. Карла Маркса, 25, рядом с гостиницей «Астория»<br>телефон: +7 (347) 266-58-86 <br>график работы с 10:00 до 20:00 без выходных  </a><br>
	<br>
	<HR><b>г. Самара</b><br><br><a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.1868906,50.0887003,17z/data=!3m1!4b1!4m5!3m4!1s0x41661e17982eff57:0xd6396e0f7bc86803!8m2!3d53.1868874!4d50.090889"
	target="_blank">ул. Фрунзе, 86, пересечение ул. Ленинградской и ул. Фрунзе,  <br>телефон: +7 (846) 277-03-86 <br>график работы с 10:00 до 20:00 без выходных <br></a>
	<br>
	<a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.212534,50.1796523,17z/data=!3m1!4b1!4m5!3m4!1s0x41661ea35056d5b3:0x200099537d46c4a5!8m2!3d53.2125308!4d50.181841!6m1!1e1"
	target="_blank">ТЦ «Русь на Волге», Московское шоссе, 15Б, первый этаж, <br>телефон: +7 (846) 277-08-23 <br>график работы с 10:00 до 21:00 без выходных <br></a>
	<br>
	<HR><b>г. Тольятти</b><br><br>
	<a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.5009726,49.2712072,17z/data=!3m1!4b1!4m5!3m4!1s0x41687bcd78f69091:0x967b08739ab39798!8m2!3d53.5009694!4d49.2733959"
	target="_blank">ТРЦ «Вега», ул. Юбилейная, 40, секция 144, рядом с кинотеатром, <br>тел: +7 (8482) 78-39-70 <br>график работы с 10:00 до 21:00 без выходных <br></a>
	<br>
	<a href="https://www.google.ru/maps/place/%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B8%D0%B9+%D1%84%D0%B0%D1%80%D1%84%D0%BE%D1%80/@53.5096364,49.4205637,17z/data=!3m1!4b1!4m5!3m4!1s0x41687f33af3ade19:0xff53ee2051812291!8m2!3d53.5096332!4d49.4227524"
	target="_blank">ул. Победы, 78, рядом с центральным парком, <br>телефон: +7 (8482) 78-15-33  <br>график работы с 10:00 до 20:00 без выходных</a><br><br>
	<HR style="height: 2px;border: none; color: black; background-color: black;">
	<b>Императорский фарфор в социальных сетях</b><HR style="height: 2px;border: none; color: black; background-color: black;">
	<b>Facebook</b><br><a href="https://www.facebook.com/ifarfor/" target="_blank">
	https://www.facebook.com/ifarfor/</a><br>
	<HR>
	<b>ВКонтакте</b><br><a href="https://vk.com/ipmclub" target="_blank">https://vk.com/ipmclub</a><br>
	<HR>
	<b>Instagram</b><br><a href="https://www.instagram.com/ifarfor/" target="_blank">https://www.instagram.com/ifarfor/</a><br>
	<HR style="height: 1px;border: none; color: black; background-color: black;">
	<a href="/company/" target="_top"><b>Реквизиты</b></a>
	<HR style="height: 1px;border: none; color: black; background-color: black;">
	<a href="/delivery/" target="_top"><b>Условия доставки</b></a>
	<HR style="height: 1px;border: none; color: black; background-color: black;">
	<b>Электронная почта</b><HR style="height: 1px;border: none; color: black; background-color: black;">
	По вопросам заказов и сотрудничества: order2 @ ifarfor . ru <br><br><br><br>';
        }
    }
}