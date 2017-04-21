<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewConcertListingTest extends TestCase
{

    /** @test*/
    function user_can_view_a_concert_list()
    {

        $concert = Concert::create([
            'title' => 'The red Chord',
            'subtitle' => 'with Animosity',
            'date' => Carbon::parse('December 13, 2016 8:00pm'),
            'ticket_price' => 3250,
            'venue' => 'The Mosh Pit',
            'venue_adress' => '123 Example Lane',
            'city' => 'Laraville',
            'state' => 'On',
            'zip' => '172916',
            'additional_information' => 'For ticket, call 911'
        ]);

        //Act phaze
        $this->visit('/concerts/'.$concert->id);
        
        //Asset phaze
        $this->see('The red Chord');
        $this->see('with Animosity');
        $this->see('December 13, 2016 8:00pm');
        $this->see(32.50);
        $this->see('The Mosh Pit');
        $this->see('123 Example Lane');
        $this->see('Laraville On 172916');
        $this->see('For ticket, call 911');
    }
}
