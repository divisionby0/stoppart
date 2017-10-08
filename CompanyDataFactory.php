<?php

class CompanyDataFactory
{
    public static function getString($lang){
        if($lang=="en"){
            return 'REQUISITES: <HR style="height: 2px;border: none; color: black; background-color: black;">
	«Imperial Porcelain Manufactory JSC» <br>
	INN (Taxpayer Identification Number): 7811000276 <br>
	KPP (Tax Registration Reason Code): CRR 781101001 <br>
	Address: 151, Obukhovskoy Oborony pr-t, Saint Petersburg, Russian Federation <br>
	<br>
	Euro Bank Account Details: <br>
	Account  40702978139040000236 <br>
	JSC VTB BANK (OPERU BRANCH) <br>
	SWIFT: VTBRRUM2NWR <br>
	Bank Address: st. Bolshaya Morskaya, 30, 190000 St.Petersburg, Russia. <br>
	<HR style="height: 2px;border: none; color: black; background-color: black;">
	Requisites for payment by bank transfer when you buy in the store Imperial porcelain at Togliatti, ul. Yubileinaya, 40:<br>
	"IFZ Togliatty LLC"<br>
	INN (Taxpayer Identification Number):6321239803<br>
	KPP (Tax Registration Reason Code): CRR 632101001<br>
	Address:  st. Topolinaya, 4a, 445031 Togliatti, Russia.<br>
	Bank Account Details: JSC GLOBEX BANK , BIK 043678713, ks 30101810400000000713 Account 40702810525000023930';
        }
        else{
            return 'Реквизиты<HR style="height: 2px;border: none; color: black; background-color: black;">
	Реквизиты АО "ИФЗ" <br>
	Полное наименование организации Акционерное общество "Императорский фарфоровый завод"<br>
	Юридический адрес 192171, Российская Федерация, г. Санкт-Петербург, проспект Обуховской Обороны, дом 151<br>
	Почтовый (контактный) адрес 192171, Российская Федерация, г. Санкт-Петербург, проспект Обуховской Обороны, дом 151<br>
	Идентификационный номер (ИНН)	ИНН 7811000276, КПП 781101001<br>
	Код организации по ОКПО	00303812<br>
	Код организации по ОКВЭД 26.21<br>
	Полное наименование банка Филиал ОПЕРУ ОАО Банк ВТБ в Санкт-Петербурге г.Санкт-Петербург Расчетный счет 40702810312000001477<br>
	Корреспондентский счет 30101810200000000704<br>
	БИК	044030704<br>
	SWIFT: VTBRRUM2NWR<br>
	Наименование Банка: JSC VTB BANK (OPERU BRANCH)<br>
	Идентификационный номер (ИНН) Банка	ИНН: 7702070139, КПП: 997950001<br>
	<HR style="height: 2px;border: none; color: black; background-color: black;">
	Реквизиты для оплаты по безналичному расчету при покупке в магазине Императорский фарфор по адресу г. Тольятти, ул. Юбилейная, 40:<br>
	ООО "ИФЗ Тольятти"<br>
	ИНН/КПП 6321239803 / 632101001<br>
	ОГРН 1106320000973<br>
	Юридический адрес: 445031 РФ, Самарская область г.Тольятти, ул. Тополиная, 4а<br>
	Наименование и адрес банка: Филиал "Поволжский" ЗАО "ГЛОБЭКСБАНК" г. Тольятти, БИК 043678713, к/с 30101810400000000713 Р/с 40702810525000023930';
        }
    }
}