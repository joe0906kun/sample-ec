<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'perfume 1',
                'description' => '柔らかくフレッシュなシーツに包まれた清々しい朝をイメージした香り',
                'image' => '/images/101.jpg',
                'price' => '140',
            ],
            [
                'name' => 'perfume 2',
                'description' => '真冬のフランス山岳シャモニーの朝、真冬に暖炉の温かさに包まれる心地良さを想起させる香り',
                'image' => '/images/102.jpg',
                'price' => '140',
            ],
            [
                'name' => 'perfume 3',
                'description' => '香りの質感と肌ごこちを追求。新しいシーツの下に滑り込んだ体、バスケットいっぱいのランドリー、洗濯したての清潔な香りを思い起させます',
                'image' => '/images/103.jpg',
                'price' => '240',
            ],
            [
                'name' => "perfume 4",
                'description' => 'ラグジュアリーで複雑なロマンスを表現した香り',
                'image' => '/images/104.jpg',
                'price' => '240',
            ],
            [
                'name' => 'perfume 5',
                'description' => '男性、女性を問わず、きらめき、晴れやかに香る、全ての人、全てのもののためのフレグランス',
                'image' => '/images/105.jpg',
                'price' => '160',
            ],
            [
                'name' => 'perfume 6',
                'description' => 'フローラル、アンバー、ウッディ系の香りを調合した高貴な香り漂うフレグランス',
                'image' => '/images/106.jpg',
                'price' => '270',
            ],
            [
                'name' => 'perfume 7',
                'description' => 'バジルグランベールとさわやかなシトラスノートが贅沢に香る、活気に満ちた非常に現代的な香り',
                'image' => '/images/107.jpg',
                'price' => '150',
            ],
            [
                'name' => 'perfume 8',
                'description' => 'マラケッシュの街をインスピレーションの元とした、深みがありリッチで魅力的な香り',
                'image' => '/images/108.jpg',
                'price' => '154',
            ],
            [
                'name' => 'perfume 9',
                'description' => '東京の香り。非常に硬く、緑色を帯びた樹木で、シダーほど乾燥していないものの、シダーと同じくらい繊細で深みがある香り',
                'image' => '/images/109.jpg',
                'price' => '400',
            ],
            [
                'name' => 'perfume 10',
                'description' => '都会的でシャープな輝きを放つ香り',
                'image' => '/images/110.jpg',
                'price' => '260',
            ],
        ]);
    }
}
