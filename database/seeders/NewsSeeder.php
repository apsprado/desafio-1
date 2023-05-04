<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = News::query()->firstOrCreate([
            'id' => 1,
            'title' => 'Lorem Ipsum',
            'lead' => 'admin@dixbpo.com',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur quis efficitur mauris. Morbi id quam at nulla dapibus tempus a vel magna. Pellentesque placerat scelerisque velit, vitae vestibulum nisl ornare sed. Nunc fringilla commodo ex ac semper. Donec enim odio, imperdiet eget magna quis, rhoncus laoreet orci. Quisque mattis dui vehicula, interdum erat eget, sodales orci. Quisque tellus turpis, suscipit id laoreet nec, tincidunt quis ligula.',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
