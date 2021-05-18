<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_news_index_page()
    {
        $response = $this->get('/newsCat');

        $response->assertStatus(200);
    }

    public function test_news_form_show()
    {
        $response = $this->get('/newsCat/toOrder');

        $response->assertStatus(200);
    }

    public function test_news_show()
    {
        $news = [
            'Food' => [
                'News1' => [
                'title' => 'Food News1 Title',
                'shortText' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'fullText' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
                ]
            ],
            'Travel' => [
                'News1' => [
                    'title' => 'Travel News1 Title',
                    'shortText' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                    'fullText' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
                ],
            ],
            'Cars' => [
                'News1' => [
                    'title' => 'Cars News1 Title',
                    'shortText' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                    'fullText' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
                ],
            ]
        ];
        $response = $this->get('/newsCat',$news);

        $response->assertStatus(200);
    }
}
