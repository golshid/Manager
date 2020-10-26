<?php

use Illuminate\Database\Seeder;
use App\Requests;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'How did Voldemort face get disfigured?';
        $t2 = 'Is this JK Rowling “pocketeded” story true?';
        $t3 = 'Why did Harry Potter get a bedroom?';
        $t4 = 'Why did the Marauders not find the room of requirement?';
        $t5 = 'Are there any individual aliens that have gained superpowers in the Marvel universe?';
        $t6 = 'Is The Amazing Spider-Man part of the Marvel Cinematic Universe?';
        $t7 = 'What are the differences between Hawkeye and Green Arrow?';
        $t8 = 'What are the differences between Ant-Man and The Atom?';
        $t9 = 'Can the Demogorgon open gates?';
        $t10 = 'Why was the “Demogorgon” not attracted to Elevens blood?';

        $d1 = [
            'user_id' => 2,
            'user_name' => 'number2',
            'user_company' => 'company1',
            'status' => 0,
            'date_from' => '2019-08-30',
            'date_to' => '2019-09-10',
            'title' => $t1,
            'slug' => str_slug($t1),
            'content' => 'The nose of Tom Riddle (as a student) was fine, as I have seen in the movies. But, Voldemorts nose doesnt look like a normal human nose. What really happened?'
        ];
        $d2 = [
            'user_id' => 3,
            'user_name' => 'number3',
            'user_company' => 'company1',
            'status' => 0,
            'date_from' => '2019-08-30',
            'date_to' => '2019-09-10',
            'title' => $t2,
            'slug' => str_slug($t2),
            'content' => 'The nose of Tom Riddle (as a student) was fine, as I have seen in the movies. But, Voldemorts nose doesnt look like a normal human nose. What really happened?'
        ];
        $d3 = [
            'user_id' => 4,
            'user_name' => 'number4',
            'user_company' => 'company1',
            'status' => 1,
            'date_from' => '2019-08-30',
            'date_to' => '2019-09-10',
            'title' => $t4,
            'slug' => str_slug($t4),
            'content' => 'The nose of Tom Riddle (as a student) was fine, as I have seen in the movies. But, Voldemorts nose doesnt look like a normal human nose. What really happened?'
        ];
        $d4 = [
            'user_id' => 5,
            'user_name' => 'number5',
            'user_company' => 'company1',
            'status' => 2,
            'date_from' => '2019-08-30',
            'date_to' => '2019-09-10',
            'title' => $t5,
            'slug' => str_slug($t5),
            'content' => 'The nose of Tom Riddle (as a student) was fine, as I have seen in the movies. But, Voldemorts nose doesnt look like a normal human nose. What really happened?'
        ];
        $d5 = [
            'user_id' => 7,
            'user_name' => 'number7',
            'user_company' => 'company2',
            'status' => 0,
            'date_from' => '2019-08-30',
            'date_to' => '2019-09-10',
            'title' => $t6,
            'slug' => str_slug($t6),
            'content' => 'The nose of Tom Riddle (as a student) was fine, as I have seen in the movies. But, Voldemorts nose doesnt look like a normal human nose. What really happened?'
        ];
        $d6 = [
            'user_id' => 8,
            'user_name' => 'number8',
            'user_company' => 'company2',
            'status' => 0,
            'date_from' => '2019-08-30',
            'date_to' => '2019-09-10',
            'title' => $t7,
            'slug' => str_slug($t7),
            'content' => 'The nose of Tom Riddle (as a student) was fine, as I have seen in the movies. But, Voldemorts nose doesnt look like a normal human nose. What really happened?'
        ];
        $d7 = [
            'user_id' => 9,
            'user_name' => 'number9',
            'user_company' => 'company2',
            'status' => 1,
            'date_from' => '2019-08-30',
            'date_to' => '2019-09-10',
            'title' => $t8,
            'slug' => str_slug($t8),
            'content' => 'The nose of Tom Riddle (as a student) was fine, as I have seen in the movies. But, Voldemorts nose doesnt look like a normal human nose. What really happened?'
        ];
        $d8 = [
            'user_id' => 10,
            'user_name' => 'number10',
            'user_company' => 'company2',
            'status' => 2,
            'date_from' => '2019-08-30',
            'date_to' => '2019-09-10',
            'title' => $t9,
            'slug' => str_slug($t9),
            'content' => 'The nose of Tom Riddle (as a student) was fine, as I have seen in the movies. But, Voldemorts nose doesnt look like a normal human nose. What really happened?'
        ];
        $d9 = [
            'user_id' => 12,
            'user_name' => 'number12',
            'user_company' => 'company3',
            'status' => 0,
            'date_from' => '2019-08-30',
            'date_to' => '2019-09-10',
            'title' => $t10,
            'slug' => str_slug($t10),
            'content' => 'The nose of Tom Riddle (as a student) was fine, as I have seen in the movies. But, Voldemorts nose doesnt look like a normal human nose. What really happened?'
        ];

        Requests::create($d1);
        Requests::create($d2);
        Requests::create($d3);
        Requests::create($d4);
        Requests::create($d5);
        Requests::create($d6);
        Requests::create($d7);
        Requests::create($d8);
        Requests::create($d9);
 
        
    }
}
