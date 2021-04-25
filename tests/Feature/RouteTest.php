<?php

namespace Tests\Feature;

use Tests\TestCase;

class RouteTest extends TestCase
{
    public function test_get_all_questions_endpoint(): void
    {
        $response = $this->get('/api/v1/questions/list?tagged=PHP;Python&todate=2020-12-30&fromdate=2020-12-25');
        $response->assertStatus(200);
    }
}
