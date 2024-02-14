<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Domain\Services\MenuCategoryServices;
use App\Domain\Services\MenuServices;
use App\DTO\MenuCategory\CreateMenuCategoryDTO;
use App\DTO\Menu\CreateMenuDTO;
use App\Domain\Services\IngridientServices;
use App\DTO\Ingridient\CreateIngridientDTO;
use App\DTO\Ingridient\DeleteIngridientDTO;

class IngridientTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test create.
     */
    public function test_create(): void
    {
        $serviceMenuCategory = new MenuCategoryServices();
        $dataCategory = $serviceMenuCategory->actionCreate(
            new CreateMenuCategoryDTO("UFO КОМБО")
        );
        $this->assertNotNull($dataCategory);
        $this->assertEquals($dataCategory->Title, "UFO КОМБО");

        $serviceMenu = new MenuServices();
        $dataMenu = $serviceMenu->actionCreate(
            new CreateMenuDTO(
                $dataCategory->id,
                "Биг Маэстро Бургер Оригинальный",
                "Биг Маэстро бургер оригинальный – невероятно большой и аппетитный! 
                В нем много сыра, сочных овощей и соуса, тающая во рту булочка и они – нежные и ароматные 
                стрипсы из отборного куриного филе, приготовленного по секретному рецепту с идеальным 
                сочетанием 11 трав и специй. Пробуйте, составу Биг Маэстро бургера оригинального нет равных! ",
                "10fb1e506d60c8ec4326a2832273ef8c.jpg",
                269,
                null
            )
        );

        $this->assertNotNull($dataMenu);
        $this->assertEquals($dataMenu->Title, "Биг Маэстро Бургер Оригинальный");
        $this->assertEquals($dataMenu->Price, 269);
        $this->assertNotNull($dataMenu->Slug);

        $service = new IngridientServices();
        $data = $service->actionCreate(
            new CreateIngridientDTO(
                $dataCategory->id,
                'Морковка'
            )
        );
        $this->assertNotNull($data);
        $this->assertEquals($data->CategoryId, $dataCategory->id);
        $this->assertEquals($data->Title, "Морковка");
    }

    /**
     * A basic feature test delete.
     */
    public function test_delete(): void
    {
        $serviceMenuCategory = new MenuCategoryServices();
        $dataCategory = $serviceMenuCategory->actionCreate(
            new CreateMenuCategoryDTO("UFO КОМБО")
        );
        $this->assertNotNull($dataCategory);
        $this->assertEquals($dataCategory->Title, "UFO КОМБО");

        $serviceMenu = new MenuServices();
        $dataMenu = $serviceMenu->actionCreate(
            new CreateMenuDTO(
                $dataCategory->id,
                "Биг Маэстро Бургер Оригинальный",
                "Биг Маэстро бургер оригинальный – невероятно большой и аппетитный! 
                В нем много сыра, сочных овощей и соуса, тающая во рту булочка и они – нежные и ароматные 
                стрипсы из отборного куриного филе, приготовленного по секретному рецепту с идеальным 
                сочетанием 11 трав и специй. Пробуйте, составу Биг Маэстро бургера оригинального нет равных! ",
                "10fb1e506d60c8ec4326a2832273ef8c.jpg",
                269,
                null
            )
        );

        $this->assertNotNull($dataMenu);
        $this->assertEquals($dataMenu->Title, "Биг Маэстро Бургер Оригинальный");
        $this->assertEquals($dataMenu->Price, 269);
        $this->assertNotNull($dataMenu->Slug);

        $service = new IngridientServices();
        $dataCreate = $service->actionCreate(
            new CreateIngridientDTO(
                $dataCategory->id,
                'Морковка'
            )
        );

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->CategoryId, $dataCategory->id);
        $this->assertEquals($dataCreate->Title, "Морковка");

        $data = $service->actionDelete(
            new DeleteIngridientDTO($dataCreate->id)
        );

        $this->assertNotNull($data);
    }

    /**
     * A basic feature test all.
     */
    public function test_all(): void
    {
        $serviceMenuCategory = new MenuCategoryServices();
        $dataCategory = $serviceMenuCategory->actionCreate(
            new CreateMenuCategoryDTO("UFO КОМБО")
        );
        $this->assertNotNull($dataCategory);
        $this->assertEquals($dataCategory->Title, "UFO КОМБО");

        $serviceMenu = new MenuServices();
        $dataMenu = $serviceMenu->actionCreate(
            new CreateMenuDTO(
                $dataCategory->id,
                "Биг Маэстро Бургер Оригинальный",
                "Биг Маэстро бургер оригинальный – невероятно большой и аппетитный! 
                В нем много сыра, сочных овощей и соуса, тающая во рту булочка и они – нежные и ароматные 
                стрипсы из отборного куриного филе, приготовленного по секретному рецепту с идеальным 
                сочетанием 11 трав и специй. Пробуйте, составу Биг Маэстро бургера оригинального нет равных! ",
                "10fb1e506d60c8ec4326a2832273ef8c.jpg",
                269,
                null
            )
        );

        $this->assertNotNull($dataMenu);
        $this->assertEquals($dataMenu->Title, "Биг Маэстро Бургер Оригинальный");
        $this->assertEquals($dataMenu->Price, 269);
        $this->assertNotNull($dataMenu->Slug);

        $service = new IngridientServices();
        $dataCreate = $service->actionCreate(
            new CreateIngridientDTO(
                $dataCategory->id,
                'Морковка'
            )
        );

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->CategoryId, $dataCategory->id);
        $this->assertEquals($dataCreate->Title, "Морковка");

        $data = $service->actionAll();

        $this->assertNotNull($data);
    }
}
