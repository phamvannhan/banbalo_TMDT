<?php

use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$slide = new App\Slide([
    		'anh' => '\upload\a.png',
    		'href' => 'http://localhost/mywebsite/public/abc',
    	]);
    	$slide->save();

    	$slide = new App\Slide([
    		'anh' => '\upload\b.png',
    		'href' => 'http://localhost/mywebsite/public/abc',
    	]);
    	$slide->save();

    	$slide = new App\Slide([
    		'anh' => '\upload\c.png',
    		'href' => 'http://localhost/mywebsite/public/abc',
    	]);
    	$slide->save();

    	$slide = new App\Slide([
    		'anh' => '\upload\d.png',
    		'href' => 'http://localhost/mywebsite/public/abc',
    	]);
    	$slide->save();

    	$slide = new App\Slide([
    		'anh' => '\upload\a.png',
    		'href' => 'http://localhost/mywebsite/public/abc',
    	]);
    	$slide->save();

    	$slide = new App\Slide([
    		'anh' => '\upload\a.png',
    		'href' => 'http://localhost/mywebsite/public/abc',
    	]);
    	$slide->save();

    	$slide = new App\Slide([
    		'anh' => '\upload\a.png',
    		'href' => 'http://localhost/mywebsite/public/abc',
    	]);
    	$slide->save();

    	$slide = new App\Slide([
    		'anh' => '\upload\a.png',
    		'href' => 'http://localhost/mywebsite/public/abc',
    	]);
    	$slide->save();

    	$slide = new App\Slide([
    		'anh' => '\upload\a.png',
    		'href' => 'http://localhost/mywebsite/public/abc',
    	]);
    	$slide->save();

    	$slide = new App\Slide([
    		'anh' => '\upload\a.png',
    		'href' => 'http://localhost/mywebsite/public/abc',
    	]);
    	$slide->save();
    }
}
