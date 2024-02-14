<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Domain\Services\MenuCategoryServices;
use App\DTO\MenuCategory\CreateMenuCategoryDTO;
use App\DTO\Menu\UpdateMenuDTO;
use App\DTO\Menu\DeleteMenuDTO;
use App\DTO\Menu\ShowToCategoryDTO;
use App\DTO\Menu\ShowMenuDTO;
use App\Domain\Services\MenuServices;
use App\DTO\Menu\CreateMenuDTO;

class MenuTest extends TestCase
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

        $service = new MenuServices();
        $data = $service->actionCreate(
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

        $this->assertNotNull($data);
        $this->assertEquals($data->Title, "Биг Маэстро Бургер Оригинальный");
        $this->assertEquals($data->Price, 269);
        $this->assertNotNull($data->Slug);
    }

    /**
     * A basic feature test update.
     */
    public function test_update(): void
    {
        $serviceMenuCategory = new MenuCategoryServices();
        $dataCategory = $serviceMenuCategory->actionCreate(
            new CreateMenuCategoryDTO("UFO КОМБО")
        );
        $this->assertNotNull($dataCategory);
        $this->assertEquals($dataCategory->Title, "UFO КОМБО");

        $service = new MenuServices();
        $dataCreate = $service->actionCreate(
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

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->Title, "Биг Маэстро Бургер Оригинальный");
        $this->assertEquals($dataCreate->Price, 269);
        $this->assertNotNull($dataCreate->Slug);

        $data = $service->actionUpdate(
            new UpdateMenuDTO(
                $dataCreate->id,
                $dataCategory->id,
                "Биг Маэстро Бургер Оригинальный 123",
                $dataCreate->Description,
                $dataCreate->Image,
                100,
                null
            )
        );

        $this->assertNotNull($data);
        $this->assertEquals($data->Title, "Биг Маэстро Бургер Оригинальный 123");
        $this->assertEquals($data->Price, 100);
        $this->assertEquals($data->Description, $dataCreate->Description);
        $this->assertEquals($data->Image, $dataCreate->Image);
        $this->assertNotNull($data->Slug);
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

        $service = new MenuServices();
        $dataCreate = $service->actionCreate(
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

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->Title, "Биг Маэстро Бургер Оригинальный");
        $this->assertEquals($dataCreate->Price, 269);
        $this->assertNotNull($dataCreate->Slug);

        $data = $service->actionDelete(
            new DeleteMenuDTO($dataCreate->id)
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

        $service = new MenuServices();
        $dataCreate = $service->actionCreate(
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

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->Title, "Биг Маэстро Бургер Оригинальный");
        $this->assertEquals($dataCreate->Price, 269);
        $this->assertNotNull($dataCreate->Slug);

        $data = $service->actionAll();
        $this->assertNotNull($data);
        $this->assertEquals(count($data) > 0, true);
    }

    /**
     * A basic feature test show to category.
     */
    public function test_show_to_category(): void
    {
        $serviceMenuCategory = new MenuCategoryServices();
        $dataCategory = $serviceMenuCategory->actionCreate(
            new CreateMenuCategoryDTO("UFO КОМБО")
        );
        $this->assertNotNull($dataCategory);
        $this->assertEquals($dataCategory->Title, "UFO КОМБО");

        $service = new MenuServices();
        $dataCreate = $service->actionCreate(
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

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->Title, "Биг Маэстро Бургер Оригинальный");
        $this->assertEquals($dataCreate->Price, 269);
        $this->assertNotNull($dataCreate->Slug);

        $data = $service->actionShowToCategory(
            new ShowToCategoryDTO($dataCategory->id)
        );

        $this->assertNotNull($data);
        $this->assertEquals(count($data) > 0, true);
    }

    /**
     * A basic feature test show.
     */
    public function test_show(): void
    {
        $serviceMenuCategory = new MenuCategoryServices();
        $dataCategory = $serviceMenuCategory->actionCreate(
            new CreateMenuCategoryDTO("UFO КОМБО")
        );
        $this->assertNotNull($dataCategory);
        $this->assertEquals($dataCategory->Title, "UFO КОМБО");

        $service = new MenuServices();
        $dataCreate = $service->actionCreate(
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

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->Title, "Биг Маэстро Бургер Оригинальный");
        $this->assertEquals($dataCreate->Price, 269);
        $this->assertNotNull($dataCreate->Slug);

        $data = $service->actionShow(
            new ShowMenuDTO($dataCreate->id)
        );

        $this->assertNotNull($data);
    }
}
