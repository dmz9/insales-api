<?php

use PHPUnit\Framework\TestCase;

class WebhookAcceptorTest extends TestCase{
	public function testAcceptorXML()
	{
		$xml = <<< XMLLLL
<?xml version="1.0" encoding="UTF-8"?>

<order>
    <accepted-at type="timestamp" nil="true"/>
    <account-id type="integer">223003
    </account-id>
    <comment nil="true"/>
    <created-at
            type="timestamp">2017-06-02 14:11:26 +0300
    </created-at>
    <current-location>/</current-location>
    <delivered-at
            type="timestamp" nil="true"/>
    <delivery-date type="date" nil="true"/>
    <delivery-description>cdek Москва,
        Киевское шоссе 22-й (п Московский) д. 4 #11373
    </delivery-description>
    <delivery-from-hour type="integer" nil="true"/>
    <delivery-price
            type="decimal">115.0
    </delivery-price>
    <delivery-title>Insales самовывоз</delivery-title>
    <delivery-to-hour
            type="integer" nil="true"/>
    <delivery-variant-id
            type="integer">986851
    </delivery-variant-id>
    <financial-status>paid</financial-status>
    <first-current-location>
        /
    </first-current-location>
    <first-query nil="true"/>
    <first-referer nil="true"/>
    <first-source-domain
            nil="true"/>
    <fulfillment-status>new</fulfillment-status>
    <id type="integer">11117922</id>
    <key>
        5d751f8fbc61d4db0fdf52b18d77920b
    </key>
    <manager-comment nil="true"/>
    <margin type="decimal">10.0</margin>
    <number
            type="integer">1312
    </number>
    <paid-at
            type="timestamp">2017-06-14 17:00:27 +0300
    </paid-at>
    <payment-description>
        <p>Наличными курьеру</p>
    </payment-description>
    <payment-gateway-id type="integer">297460</payment-gateway-id>
    <payment-title>Наличным
        курьеру
    </payment-title>
    <query nil="true"/>
    <referer>https://ipolh.com/webService/insales/apiship/admin/
    </referer>
    <source-domain>ipolh.com</source-domain>
    <updated-at
            type="timestamp">2017-06-14 17:00:27 +0300
    </updated-at>
    <ya-id type="integer" nil="true"/>
    <currency-code>
        RUR
    </currency-code>
    <client-transaction-id nil="true"/>
    <first-source>Прямой трафик</first-source>
    <source>
        Сайты
    </source>
    <locale>ru</locale>
    <fields-values type="array">
        <fields-value
                type="FieldValue">
            <created-at type="datetime">2017-06-02T14:11:25+03:00</created-at>
            <field-id
                    type="integer">5304568
            </field-id>
            <id type="integer">17306278</id>
            <updated-at
                    type="datetime">2017-06-02T14:11:25+03:00
            </updated-at>
            <value>cdek Москва, Киевское шоссе 22-й (п Московский)
                д. 4 #11373
            </value>
            <type type="NilClass">Текст</type>
            <name
                    type="NilClass">Данные доставки
            </name>
        </fields-value>
    </fields-values>
    <shipping-address>

        <address></address>
        <city>Москва</city>
        <country>RU</country>
        <flat nil="true"/>
        <house nil=
                       "true"/>
        <id type="integer">12970588
        </id>
        <middlename nil="true"/>
        <name>test</name>
        <phone>89887777777</phone>
        <state>г Москва
        </state>
        <street nil="true"/>
        <surname nil="true"/>
        <zip></zip>
        <full-delivery-address>Россия, г
            Москва, Нет
        </full-delivery-address>
        <full-name>test</full-name>
        <fields-values type="array">
            <fields-value
                    type="FieldValue">
                <created-at type="datetime">2017-06-02T14:11:25+03:00</created-at>
                <field-id
                        type="integer">5360866
                </field-id>
                <id type="integer">17306281</id>
                <updated-at
                        type="datetime">2017-06-02T14:11:25+03:00
                </updated-at>
                <value></value>
                <type
                        type="NilClass">Многострочный текст
                </type>
                <name
                        type="NilClass">Комментарий
                </name>
            </fields-value>
            <fields-value
                    type="FieldValue">
                <created-at type="datetime">2017-06-02T14:11:25+03:00</created-at>
                <field-id
                        type="integer">4551027
                </field-id>
                <id type="integer">17306280</id>
                <updated-at
                        type="datetime">2017-06-02T14:11:25+03:00
                </updated-at>
                <value>0</value>
                <type
                        type="NilClass">Чекбокс
                </type>
                <name type="NilClass">Ятъ</name>
            </fields-value>
            <fields-value
                    type="FieldValue">
                <created-at type="datetime">2017-06-02T14:11:25+03:00</created-at>
                <field-id
                        type="integer">4366193
                </field-id>
                <id type="integer">17306279</id>
                <updated-at
                        type="datetime">2017-06-02T14:11:25+03:00
                </updated-at>
                <value></value>
                <type
                        type="NilClass">Текст
                </type>
                <name
                        type="NilClass">Корпус
                </name>
            </fields-value>
        </fields-values>
    </shipping-address>
    <discounts
            type="array">
        <discount>
            <created-at type="timestamp">2017-06-02 14:11:26 +0300
            </created-at>
            <description>1</description>
            <discount
                    type="decimal">10.0
            </discount>
            <discount-order-lines-ids type="array">
                <discount-order-lines-id
                        type="integer">38622272
                </discount-order-lines-id>
            </discount-order-lines-ids>
            <discount-products-ids
                    type="array">
                <discount-products-id
                        type="integer">47624676
                </discount-products-id>
            </discount-products-ids>
            <id
                    type="integer">1528125
            </id>
            <reference-id type="integer">15046</reference-id>
            <reference-type>
                DiscountRule
            </reference-type>
            <type-id type="integer">1</type-id>
            <updated-at
                    type="timestamp">2017-06-02 14:11:26 +0300
            </updated-at>
            <percent
                    type="decimal">10.0
            </percent>
            <discount-code-id nil="true"/>
            <amount
                    type="decimal">1260.0
            </amount>
            <full-amount
                    type="decimal">1386.0
            </full-amount>
        </discount>
    </discounts>
    <client>
        <bonus-points type="integer">0
        </bonus-points>
        <client-group-id type="integer" nil="true"/>
        <correspondent-account
                nil="true"/>
        <created-at type="timestamp">2017-06-02 14:11:26 +0300</created-at>
        <email></email>
        <id
                type="integer">12721951
        </id>
        <ip-addr>77.37.140.145</ip-addr>
        <middlename nil="true"/>
        <name>test
        </name>
        <phone>89887777777</phone>
        <registered type="boolean">false</registered>
        <settlement-account
                nil="true"/>
        <subscribe type="boolean">true</subscribe>
        <surname nil="true"/>
        <type>
            Client::Individual
        </type>
        <updated-at type="timestamp">2017-06-14 17:00:27 +0300</updated-at>
        <progressive-discount
                nil="true"/>
        <group-discount nil="true"/>
        <fields-values type="array"/>
    </client>
    <order-lines
            type="array">
        <order-line>
            <barcode nil="true"/>
            <comment nil="true"/>
            <created-at type=
                                "timestamp">2017-06-02 14:11:26 +0300
            </created-at>
            <discounts-amount type="decimal">1260.0</discounts-amount>
            <id
                    type="integer">38622272
            </id>
            <order-id type="integer">11117922</order-id>
            <product-id
                    type="integer">47624676
            </product-id>
            <sale-price type="decimal">12600.0</sale-price>
            <sku>1234
            </sku>
            <title>Samsung Galaxy Tab 2 7.0 P3100 8Gb</title>
            <unit>pce</unit>
            <updated-at
                    type="timestamp">2017-06-02 14:11:26 +0300
            </updated-at>
            <variant-id
                    type="integer">76267447
            </variant-id>
            <weight type="decimal">0.35</weight>
            <quantity
                    type="integer">1
            </quantity>
            <reserved-quantity type="integer" nil="true"/>
            <full-sale-price
                    type="decimal">12474.0
            </full-sale-price>
            <total-price
                    type="decimal">12600.0
            </total-price>
            <full-total-price
                    type="decimal">12474.0
            </full-total-price>
        </order-line>
    </order-lines>
    <discount>
        <created-at type=
                            "timestamp">2017-06-02 14:11:26 +0300
        </created-at>
        <description>1</description>
        <discount type="decimal">10.0</discount>
        <discount-order-lines-ids
                type="array">
            <discount-order-lines-id
                    type="integer">38622272
            </discount-order-lines-id>
        </discount-order-lines-ids>
        <discount-products-ids
                type="array">
            <discount-products-id
                    type="integer">47624676
            </discount-products-id>
        </discount-products-ids>
        <id
                type="integer">1528125
        </id>
        <reference-id type="integer">15046</reference-id>
        <reference-type>DiscountRule
        </reference-type>
        <type-id type="integer">1</type-id>
        <updated-at
                type="timestamp">2017-06-02 14:11:26 +0300
        </updated-at>
        <percent
                type="decimal">10.0
        </percent>
        <discount-code-id nil="true"/>
        <amount
                type="decimal">1260.0
        </amount>
        <full-amount type="decimal">1386.0</full-amount>
    </discount>
    <cookies>

    </cookies>
    <items-price type="decimal">12474.0</items-price>
    <total-price
            type="decimal">12600.5
    </total-price>
    <full-delivery-price
            type="decimal">126.5
    </full-delivery-price>
    <order-changes type="array">
        <order-change>
            <action>
                financial_status_changed
            </action>
            <created-at type="datetime">2017-06-14T17:00:26+03:00
            </created-at>
            <id type="integer">58443370</id>
            <user-name>Тест</user-name>
            <value-is>paid
            </value-is>
            <value-was>pending</value-was>
        </order-change>
        <order-change>
            <action>
                financial_status_changed
            </action>
            <created-at type="datetime">2017-06-14T17:00:21+03:00
            </created-at>
            <id type="integer">58443353</id>
            <user-name>Тест</user-name>
            <value-is>pending
            </value-is>
            <value-was>paid</value-was>
        </order-change>
        <order-change>
            <action>
                financial_status_changed
            </action>
            <created-at type="datetime">2017-06-14T16:58:30+03:00
            </created-at>
            <id type="integer">58443191</id>
            <user-name>Тест</user-name>
            <value-is>paid
            </value-is>
            <value-was>pending</value-was>
        </order-change>
        <order-change>
            <action>order_created</action>

            <created-at type="datetime">2017-06-02T14:11:25+03:00
            </created-at>
            <id type="integer">57641202</id>
            <user-name>Тест</user-name>
            <value-is
                    nil="true"/>
            <value-was nil="true"/>
        </order-change>
        <order-change>
            <action>
                discount_created
            </action>
            <created-at type="datetime">2017-06-02T14:11:25+03:00
            </created-at>
            <id type="integer">57641201</id>
            <user-name>Тест</user-name>
            <value-is>
                <type-id type=
                                 "integer">1
                </type-id>
                <discount>10.0</discount>
                <description>1</description>
            </value-is>
            <value-was
                    nil="true"/>
        </order-change>
    </order-changes>
    <custom-status>
        <permalink>new</permalink>
        <title>NEW</title>

    </custom-status>
</order>
XMLLLL;
		$order = \InsalesApi\WebhookAcceptor::acceptPayload($xml);
		$this->assertInstanceOf(InsalesApi\Api\Order\OrderResponse::fqcn(),$order);
		$this->assertEquals('new',$order->custom_status->permalink);
		$this->assertEquals(null,$order->cookies);
		$this->assertEquals(null,$order->shipping_address->address);
	}
}


