<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\CoursesModel;

class CourseSeeder extends Seeder
{
    public function run()
    {
		$user_object = new CoursesModel();

		$user_object->insertBatch([
			[
				"title" => "Курс 1. Звукорезонансная терапия поющими чашами Healingbowl®",
				"price" => "45000",
				"img" => "course1.jpg",
				"alias" => "course1",
				"type" => "1"
			],
			[
				"title" => "Курс 2. Контактно-звуковой (вибрационно-акустический) массаж поющими чашами Healingbowl®",
				"price" => "50000",
				"img" => "course2.jpg",
				"alias" => "course2",
				"type" => "1"
			],
			[
				"title" => "Курс 3: дистанционный акустический массаж поющими чашами. Диагностика, восстановление и балансировка биоэнергетической системы человека.",
				"price" => "50000",
				"img" => "course3.jpg",
				"alias" => "course3",
				"type" => "1"
			],
			[
				"title" => "Курс 4. Вибропунктура (точечный массаж) поющими чашами Healingbowl®",
				"price" => "50000",
				"img" => "course4.jpg",
				"alias" => "course4",
				"type" => "1"
			],
			[
				"title" => "Интенсив из курсов 1 - 4.",
				"price" => "170000",
				"img" => "intensive.jpg",
				"alias" => "intensive",
				"type" => "1"
			],
			[
				"title" => "Мастер-класс и медитация с поющими чашами",
				"price" => "1500",
				"img" => "mk.png",
				"alias" => "mk",
				"type" => "1"
			],	
			[
				"title" => "Семинар. «Поющие чаши: теория и практика для начинающих».",
				"price" => "15000",
				"img" => "seminar.png",
				"alias" => "seminar",
				"type" => "1"
			],			
			[
				"title" => "Курс 1. Звукорезонансная терапия поющими чашами Healingbowl®",
				"price" => "30000",
				"img" => "kurs01.jpg",
				"alias" => "kurs1",
				"type" => "1"
			],	
			[
				"title" => "Курс 2. Контактно-звуковой (вибрационно-акустический) массаж поющими чашами Healingbowl®",
				"price" => "40000",
				"img" => "kurs02.jpg",
				"alias" => "kurs2",
				"type" => "1"
			],			
			[
				"title" => "Курс 3: дистанционный акустический массаж поющими чашами. Диагностика, восстановление и балансировка биоэнергетической системы человека.",
				"price" => "4000",
				"img" => "kurs03.jpg",
				"alias" => "kurs3",
				"type" => "1"
			],	
			[
				"title" => "Курс 4. Вибропунктура (точечный массаж) поющими чашами Healingbowl®",
				"price" => "40000",
				"img" => "kurs04.jpg",
				"alias" => "kurs4",
				"type" => "1"
			],			
			[
				"title" => "Интенсив из курсов 1 - 3",
				"price" => "90000",
				"img" => "int1.jpg",
				"alias" => "int",
				"type" => "1"
			],	
			[
				"title" => "Курс 5. Работа с гигантскими чашами и наборами Healingbowl®",
				"price" => "40000",
				"img" => "kurs05.jpg",
				"alias" => "kurs5",
				"type" => "1"
			]
		]);
    }
}
