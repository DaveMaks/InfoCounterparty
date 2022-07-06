<?php
return [
    'basic' => [
        'name' => 'Краткая информация',
        'title' => '"Регистрационные данные" предназначен для получения базовой информации ЮЛ или ФЛ (если это ИП)',
        'baseurl' => 'https://kompra.kz/api/v2/basic',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    'licenses' => [
        'name' => 'Лицензии',
        'title' => '"Лицензии" предназначен для получения списка лицензии организации',
        'baseurl' => 'https://kompra.kz/api/v2/licenses',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    'tax-debts' => [
        'name' => 'Налоговые задолженности',
        'title' => '"Налоговая задолженность" позволяет получить информацию о наловой задолженности объекта поиска',
        'baseurl' => 'https://kompra.kz/api/tax-debts',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    'taxes' => [
        'name' => 'Налоговые отчисления',
        'title' => '"Налоговая задолженность" позволяет получить информацию о наловой задолженности объекта поиска',
        'baseurl' => 'https://kompra.kz/api/v2/taxes',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],

    'statuses' => [
        'name' => 'Статус организации',
        'title' => 'Сведения о статусе организации',
        'baseurl' => 'https://kompra.kz/api/v2/statuses',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    'founders' => [
        'name' => 'Учредители',
        'title' => 'Сведения об учредителях организации',
        'baseurl' => 'https://kompra.kz/api/v2/founders',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => true
    ],
    'tenders' => [
        'name' => 'Участие в закупках',
        'title' => 'Сведения об участия в закупках',
        'baseurl' => 'https://kompra.kz/api/v2/tenders',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    'contracts' => [
        'name' => 'Государственные контракты',
        'title' => 'Сведений о государственных контрактах организации',
        'baseurl' => 'https://kompra.kz/api/v2/contracts',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    'history' => [
        'name' => 'История изменений',
        'title' => 'Информация об изменениях в организации',
        'baseurl' => 'https://kompra.kz/api/v2/history',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => true
    ],
    'graph' => [
        'name' => 'Схема связей',
        'title' => 'Метод получения информации об аффилированности* компаний и персон до 3 уровней: учредители, учреждаемые, руководитель, мат организация или филиалы (при наличии). Имеет рекурсивную структуру, в котором структура каждого уровня повторяет структуру родительского уровня. То есть имеют единую структуру, поэтому описан только 1-й уровень',
        'baseurl' => 'https://kompra.kz/api/v2/graph',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => true
    ],
    'cases' => [
        'name' => 'Судебные дела',
        'title' => '"Судебные дела" позволяет получить информацию об участии организации или персоны в судебных разбирательствах. Акты судебных разбирательств доступны по точному совпадению (поиск по ИИН/БИН с 2016 года) и неточному совпадению (поиск по совпадению ФИО или названия компании до 2016 года)',
        'baseurl' => 'https://kompra.kz/api/v2/cases',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => true
    ],
    'reliability-list' => [
        'name' => 'Факторы риска',
        'title' => '"Факторы риска" предназначен для получения данных о наличии факторов риска у компаний или персон',
        'baseurl' => 'https://kompra.kz/api/v2/reliability-list',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => true
    ],
    'founded' => [
        'name' => 'Учрежденные',
        'title' => '',
        'baseurl' => 'https://kompra.kz/api/v2/founded',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => true
    ],
    'limits' => [
        'name' => 'Проверка лимитов токена',
        'title' => 'Предназначен для проверки документов и получения ИИН объекта поиска',
        'baseurl' => 'https://kompra.kz/api/v2/limits',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\Limits::class
    ],
    'penalty' => [
        'name' => 'Штрафы ЮЛ',
        'title' => '"Штрафы ЮЛ" предназначен для получения информации о совершенных административных правонарушениях на транспортном средстве, принадлежащем ЮЛ',
        'baseurl' => 'https://kompra.kz/api/v2/penalty',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    'same_owner' => [
        'name' => 'Одинаковый владелец',
        'title' => ' "Одинаковый владелец" предназначен для получения информации об объектах, где руководитель с таким же ФИО',
        'baseurl' => 'https://kompra.kz/api/v2/same_owner',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    'publicPerson' => [
        'name' => 'Публичные персоны',
        'title' => '"Публичные персоны" предназначен для получения информации о лицах, относящихся к публичным должностным лицам (ПДЛ) и лицам, связанных с ПДЛ',
        'baseurl' => 'https://kompra.kz/api/v2/publicPerson',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    'declarations' => [
        'name' => 'Декларации',
        'title' => '"Декларации" предназначен для получения информации о декларациях исследуемого объекта о соответствии Республики Казахстан (ДС РК), по документу установленной формы, удостоверяющий соответствие продукции требованиям Национального законодательства, принятый изготовителем/исполнителем',
        'baseurl' => 'https://kompra.kz/api/v2/declarations',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    'certificates' => [
        'name' => 'Сертификаты',
        'title' => '"Сертификаты" предназначен для получения информации о сертификатах исследуемого объекта (на предмет происхождения товара (формы «CT-KZ», индустриальный), соответствия системы менеджмента качества)',
        'baseurl' => 'https://kompra.kz/api/v2/certificates',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    'affiliations' => [
        'name' => 'Аффилированность ДФО',
        'title' => '"Аффилированность ДФО" предназначен для получения массива данных по компаниям и лицам, связанным с исследуемым объектом, о главном бухгалтере, членах правления и других связанных организациях',
        'baseurl' => 'https://kompra.kz/api/affiliations',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    'risk-degree' => [
        'name' => 'Степень риска',
        'title' => '"Степень риска" предназначен для получения информации по оценке степени риска налогоплательщика по результатам категорирования (путем отнесения их деятельности к категориям низкой, средней или высокой степени риска в соответствии со статьей 137 Налогового кодекса РК',
        'baseurl' => 'http://kompra.kz/api/v2/risk-degree',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    'branches' => [
        'name' => 'Филиалы',
        'title' => '"Филиалы" предназначен для получения подробной информации по филиалам юридического лица',
        'baseurl' => 'https://kompra.kz/api/v2/branches',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    'same_law_address' => [
        'name' => 'Компании по одинаковому юр.адресу',
        'title' => 'Подробная информации по компаниям, находящиеся с исследуемым объектом по одному юридическому адресу',
        'baseurl' => 'https://kompra.kz/api/v2/same_law_address',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    'tax-details' => [
        'name' => 'Детализация по налогам',
        'title' => 'Получение подробной информации по налоговым отчислениям',
        'baseurl' => 'https://kompra.kz/api/v2/tax-details',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],
    /*'cases-details' => [
        'name' => 'Детализация судебных дел',
        'title' => 'Получения подробной информации по судебным разбирательствам ФЛ и ЮЛ(решения, постановления, приговоры)',
        'baseurl' => 'https://kompra.kz/api/v2/cases/details',
        'httpMethod' => 'GET',
        'class' => \InfoCounterparty\Compra\Method\DefaultMethod::class,
        'async' => false
    ],*/
];
