<?php

namespace App\Library;

class DBSeed
{
    public function run()
    {
        DB::init();
        $user = DB::$db->prepare('INSERT INTO users (name, email, password) VALUES(?, ?, ?)');
        $user->execute([
                'admin',
                'mail@example.com',
                Auth::encryptPassword('qweqwe'),
            ]
        );
        $items = [
            [
                'name' => 'Logitech Optical B100 USB Black OEM',
                'price' => '6',
                'image' => 'http://www.logitech.com/assets/30148/b100-optical-usb-mouse.png',
                'description' => 'Office mouse',
            ],
            [
                'name' => 'Logitech Keyboard K120 Black',
                'price' => '8',
                'image' => 'http://www.logitech.com/assets/26704/26704.png',
                'description' => 'Office Keyboard',
            ],
        ];
        $newitem = DB::$db->prepare('INSERT INTO items (name, price, image, description) VALUES (?, ?, ?, ?)');
        foreach ($items as $item) {
            $newitem->execute([$item['name'], $item['price'], $item['image'], $item['description']]);
        }
    }
}
