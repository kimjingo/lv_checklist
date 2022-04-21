<?php

namespace Tests\Feature;

use App\Models\ChecklistGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Services\MenuService;

class ChecklistAdminTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $admin = User::factory()->create(['is_admin'=>1]);
        $response = $this->actingAs($admin)->post('admin/checklist_groups', [
            'name'=>'the first group'
        ]);
        $response->assertRedirect('welcome');

        $group = ChecklistGroup::where('name', 'the first group')->first();
        $this->assertNotNull($group);
        
        $response = $this->actingAs($admin)->get('admin/checklist_groups/'.$group->id.'/edit');
        $response->assertStatus(200);
        
        $response = $this->actingAs($admin)->put('admin/checklist_groups/'.$group->id, [
            'name'=>'updated first group'
        ]);
        $response->assertRedirect('welcome');
        $group = ChecklistGroup::where('name', 'updated first group')->first();
        $this->assertNotNull($group);

        $menu = (new MenuService())->get_menu();
        $this->assertEquals(1, $menu['admin_menu']->where('name','updated first group')->count());
        // $response = $this->get('/');

        // $response->assertStatus(200);
    }
}
