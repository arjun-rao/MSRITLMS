<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class facultySeeder extends Seeder {
    public function run()
    {
    	DB::table('instructors')->insert(array(

            array(
                'username' => 'deeptik',
                'department_code' => 'IS',
                'imageurl' => '/img/profiles/UjZpsA_deepthi.jpg',
                'designation' => 'Assistant Professor',
                'qualification' => 'M.Tech',
                'researcharea' => 'Computer Networks',
                'date_of_joining' => NULL,
                'date_of_birth' => NULL,
                'address' => NULL,
                'phone' => NULL,
                'msritemail' => NULL,
                'gender' => NULL,
                'website' => NULL,
                'created_at' => '2015-08-12 21:10:36',
                'updated_at' => '2015-08-12 21:16:34',
            ),

            array(
                'username' => 'isehod',
                'department_code' => 'IS',
                'imageurl' => '/img/profiles/N3yjIP_hodise.jpg',
                'designation' => 'Head of Department',
                'qualification' => 'Ph.D',
                'researcharea' => 'Mobile Adhoc and Sensor Networks',
                'date_of_joining' => NULL,
                'date_of_birth' => NULL,
                'address' => NULL,
                'phone' => NULL,
                'msritemail' => NULL,
                'gender' => NULL,
                'website' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2015-08-09 22:30:34',
            ),

            array(
                'username' => 'lincy',
                'department_code' => 'IS',
                'imageurl' => '/img/faculty.png',
                'designation' => 'Assistant Professor',
                'qualification' => ' M.Tech(Ph.D)',
                'researcharea' => ' Data Mining',
                'date_of_joining' => NULL,
                'date_of_birth' => NULL,
                'address' => NULL,
                'phone' => NULL,
                'msritemail' => NULL,
                'gender' => NULL,
                'website' => NULL,
                'created_at' => '2015-08-10 00:21:58',
                'updated_at' => '2015-08-10 00:22:36',
            ),

            array(
                'username' => 'shashidhara',
                'department_code' => 'IS',
                'imageurl' => '/img/profiles/3RLtQN_shashidhar.jpg',
                'designation' => 'Associate Professor',
                'qualification' => 'M.Tech,(PhD)',
                'researcharea' => 'Bioinformatics',
                'date_of_joining' => NULL,
                'date_of_birth' => NULL,
                'address' => NULL,
                'phone' => NULL,
                'msritemail' => NULL,
                'gender' => NULL,
                'website' => NULL,
                'created_at' => '2015-08-12 20:48:31',
                'updated_at' => '2015-08-12 21:14:04',
            ),

            array(
                'username' => 'sunitha',
                'department_code' => 'IS',
                'imageurl' => '/img/profiles/y9514e_pp.jpeg',
                'designation' => 'Assistant Professor',
                'qualification' => 'M.Tech',
                'researcharea' => 'Data Mining',
                'date_of_joining' => NULL,
                'date_of_birth' => NULL,
                'address' => NULL,
                'phone' => NULL,
                'msritemail' => NULL,
                'gender' => NULL,
                'website' => NULL,
                'created_at' => '2015-08-09 22:31:43',
                'updated_at' => '2015-08-09 22:33:30',
            ),

        ));
    }
}
