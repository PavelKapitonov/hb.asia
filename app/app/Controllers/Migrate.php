<?php namespace App\Controllers;

class Migrate extends \CodeIgniter\Controller
{

        public function index()
        {
                $migrate = \Config\Services::migrations();

                try
                {
                        $migrate->latest();

                        $seeder = \Config\Database::seeder();
                        $seeder->call('TestSeeder');
                }
                catch (\Throwable $e)
                {
                        var_dump($e);
                }
        }
        public function seeder()
        {
                $seeder = \Config\Database::seeder();
                try
                {
                        $seeder->call('TestSeeder');
                }
                catch (\Throwable $e)
                {
                        var_dump($e);
                }
        }   
	public function csv()
	{
                $seeder = \Config\Database::seeder();
                try
                {
                        $seeder->call('ProductsSeeder');
                }
                catch (\Throwable $e)
                {
                        var_dump($e);
                }
	}             

}