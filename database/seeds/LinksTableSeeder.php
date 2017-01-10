<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
              'link_name'=>'百度',
              'link_title'=>'国内最好的搜索引擎',
              'link_url'=>'http://www.baidu.com',
              'link_order'=>'1',
            ],
            [
                'link_name'=>'搜狐',
                'link_title'=>'最早的互联网公司之一',
                'link_url'=>'http://www.shouhu.com',
                'link_order'=>'2',
            ]

        ];
        DB::table('links')->insert($data);
    }
}
