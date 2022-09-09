<?php


use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class TestOrder extends TestCase
{
    protected $meituanApp;

    protected function setUp(): void
    {
        parent::setUp();

        $config = require 'testConfig.php';
        $developerId = $config['developerId'];
        $secret = $config['secret'];
        $this->meituanApp = new \Cblink\HyperfMeituan\MeituanApp([
            'developerId' => $developerId,
            'secret' => $secret,
        ]);
    }

    public function testOrderCheck()
    {
        $lat = '44.918119';
        $lng = '111.940749';
        $response = $this->meituanApp->delivery->checkOrder([
            'shop_id' => 'test_0001',
            'delivery_service_code' => '4013',
            'receiver_address' => 'test大厦',
            'receiver_lng' => (int)($lng * pow(10, 6)),
            'receiver_lat' => (int)($lat * pow(10, 6)),
            'check_type' => 1,
            'mock_order_time' => time(),
        ]);

        var_dump($response);
    }

    public function testOrderByShop()
    {
        $lat = '22.538122';
        $lng = '113.957587';
        $groupId = '60';
        $goods[] = [
            'goodCount' => 1,
            'goodName' => 'test商品',
            'goodPrice' => '1.01'
        ];

        $orders = [
            'shop_id' => 'test_0001',
            'delivery_id' => '426489847044153345',
            'order_id' => 'd210b63ea4f734f6db7b0611533b3eef',
            'outer_order_source_desc' => '202',
            'delivery_service_code' => '100031',
            'receiver_name' => 'test',
            'receiver_address' => '广东省深圳南山区',
            'receiver_phone' => '13944702732',
            'receiver_lng' => 113948371,
            'receiver_lat' => 22535699,
            'pay_type_code' => 0,
            'goods_value' => '2000.00',
            'goods_weight' => 1,
            'goods_detail' => '{"goods":[{"goodCount":10,"goodName":"20220218\u591a\u89c4\u683c\u7535\u5546\u5546\u54c1","goodPrice":100,"goodUnit":"\u4e2a","goodUnitCode":"10008"},{"goodCount":10,"goodName":"20220218\u591a\u89c4\u683c\u7535\u5546\u5546\u54c1","goodPrice":100,"goodUnit":"\u4e2a","goodUnitCode":"10008"}]}',
        ];

        $response = $this->meituanApp->delivery->preCreateByShop($orders);

        var_dump($response);
    }

}