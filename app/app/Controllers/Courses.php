<?php

namespace App\Controllers;

class Courses extends BaseController
{
    public function intensive()
    {
        $data['title'] = "Интенсив с поющими чашами.";
        $courses = model(CoursesModel::class);
        $data['courses'] = $courses->getCourseOne('intensive');
        return view('pages/intensive', $data);
    }
    public function course1()
    {
        $data['title'] = "КУРС 1. Звукорезонансная терапия поющими чашами Healingbowl® - 6 часов 10 минут.";
        $courses = model(CoursesModel::class);
        $data['courses'] = $courses->getCourseOne('course1');
        return view('pages/course1', $data);
    }
    public function course2()
    {
        $data['title'] = "Курс 2. Контактно-звуковой (вибрационно-акустический) массаж поющими чашами Healingbowl®  - 6,5 часов.";
        $courses = model(CoursesModel::class);
        $data['courses'] = $courses->getCourseOne('course2');
        return view('pages/course2', $data);
    }    
    public function course3()
    {
        $data['title'] = "Курс 3. Звуковой (акустический) массаж поющими чашами Healingbowl® - 3 часа 15 минут.";
        $courses = model(CoursesModel::class);
        $data['courses'] = $courses->getCourseOne('course3');
        return view('pages/course3', $data);
    }     
    public function course4()
    {
        $data['title'] = "Курс 4. Вибропунктура (точечный массаж) поющими чашами Healingbowl® - 4 часа 30 минут.";
        $courses = model(CoursesModel::class);
        $data['courses'] = $courses->getCourseOne('course4');
        return view('pages/course4', $data);
    } 
    public function kurs1()
    {
        $courses = model(CoursesModel::class);

        $data['courses'] = $courses->getCourseOne('kurs1');

        $data['title'] = $data['courses']['title'];
        
        return view('pages/kurs1', $data);
    }    
    public function kurs2()
    {
        $courses = model(CoursesModel::class);

        $data['courses'] = $courses->getCourseOne('kurs2');

        $data['title'] = $data['courses']['title'];
        
        return view('pages/kurs2', $data);
    } 
    public function kurs3()
    {
        $courses = model(CoursesModel::class);

        $data['courses'] = $courses->getCourseOne('kurs3');

        $data['title'] = $data['courses']['title'];
        
        return view('pages/kurs3', $data);
    }
    public function kurs4()
    {
        $courses = model(CoursesModel::class);

        $data['courses'] = $courses->getCourseOne('kurs4');

        $data['title'] = $data['courses']['title'];
        
        return view('pages/kurs4', $data);
    }
    public function int()
    {
        $courses = model(CoursesModel::class);

        $data['courses'] = $courses->getCourseOne('int');

        $data['title'] = $data['courses']['title'];
        
        return view('pages/int', $data);
    }        
}
