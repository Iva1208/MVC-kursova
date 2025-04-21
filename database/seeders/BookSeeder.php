<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
{
    Book::insert([
        ['title' => '1984', 'author' => 'Джордж Оруел', 'genre' => 'Антиутопия', 'description' => 'Роман за тоталитарен режим и наблюдение.'],
        ['title' => 'Под игото', 'author' => 'Иван Вазов', 'genre' => 'Исторически роман', 'description' => 'Животът на българите под османско владичество.'],
        ['title' => 'Хари Потър и Философският камък', 'author' => 'Дж. К. Роулинг', 'genre' => 'Фентъзи', 'description' => 'Началото на приключенията на младия магьосник.']
    ]);
}
}
