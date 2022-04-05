# InfoCounterparty
Реализация проверки контрагента с помощью стороннего сервиса
результаты выполнения определенных запросов будут кешироватся в формате json в папку cache
## Использование
```php
include_once 'Counterparty.php';
...
use InfoCounterparty\Counterparty;
...
$infoCounterparty = new Counterparty(SOURCE_COMPRA, 'APIToken');
$info = $infoCounterparty->Get("74061632017", 'basic', true);
```
Результатом в $info будет именованный массив
```json
{
    "name": "ИП Бауса",
    "fullName": "МӘРІП ӘДІ",
    "bin": null,
    "rnn": null,
    "iin": "74061632017",
    "field": [
    "Предоставление прочих индивидуальных услуг, не включенных в другие группировки"
    ],
    "factAddress": null,
    "region": "Алматинская область",
    "lawAddress": "АЛМАТИНСКАЯ ОБЛАСТЬ, КАРАСАЙСКИЙ РАЙОН, ИРГЕЛИНСКИЙ С.О.,",
    "okpo": null,
    "oked": "96090",
    "owner": "ИП АДИ",
    "registerDate": 1519236000000,
    "workers": "от 0 до 5 чел.",
    "size": "small",
    "ownership": "Частная собственность",
    "kato": "195247100",
    "city": "Каратальский район",
    "street": "С.ИРГЕЛИ",
    "secondaryOked": "",
    "kbe": null,
    "phone": null,
    "email": null,
    "website": null
}
```
Список методов и их описание перечислено можно получить с помошью:
```php
$listMethode=$infoCounterparty->getSourceObject()->GetListMethod();
```
```php
'basic' =>[
  'title' => string 'Краткая информация',
  'description' => string '"Регистрационные данные" предназначен для получения базовой информации ЮЛ или ФЛ (если это ИП)'
],
'licenses' =>[
  'title' => string 'Лицензии',
  'description' => string '"Лицензии" предназначен для получения списка лицензии организации'
],
'tax-debts' =>[
  ...
```

