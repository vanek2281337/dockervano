<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Domain\Services\MenuCategoryServices;
use App\DTO\MenuCategory\CreateMenuCategoryDTO;
use App\DTO\MenuCategory\DeleteMenuCategoryDTO;

class MenuCategoryTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test create.
     */
    public function test_create(): void
    {
        $service = new MenuCategoryServices();
        $data = $service->actionCreate(
            new CreateMenuCategoryDTO("UFO КОМБО")
        );
        $this->assertNotNull($data);
        $this->assertEquals($data->Title, "UFO КОМБО");
    }

    /**
     * A basic feature test delete.
     */
    public function test_delete(): void
    {
        $service = new MenuCategoryServices();
        $data = $service->actionCreate(
            new CreateMenuCategoryDTO("UFO КОМБО")
        );
        $this->assertNotNull($data);
        $this->assertEquals($data->Title, "UFO КОМБО");

        $data = $service->actionDelete(
            new DeleteMenuCategoryDTO($data->id)
        );
        $this->assertNotNull($data);
        $this->assertEquals($data->Title, "UFO КОМБО");
    }

    /**
     * A basic feature test all.
     */
    public function test_all(): void
    {
        $arr = ["UFO КОМБО", "НАПИТКИ", "БУРГЕРЫ"];

        $service = new MenuCategoryServices();

        foreach ($arr as $value) {
            $data = $service->actionCreate(
                new CreateMenuCategoryDTO($value)
            );
            $this->assertNotNull($data);
            $this->assertEquals($data->Title, $value);
        }
        
        $data = $service->actionAll();
        $this->assertNotNull($data);
    }
}
