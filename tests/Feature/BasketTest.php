<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Domain\Services\MenuCategoryServices;
use App\Domain\Services\MenuServices;
use App\DTO\MenuCategory\CreateMenuCategoryDTO;
use App\DTO\Menu\CreateMenuDTO;
use App\Domain\Services\IngridientServices;
use App\DTO\Ingridient\CreateIngridientDTO;
use App\Domain\Services\UserServices;
use App\DTO\User\CreateUserDTO;
use App\Domain\Services\BasketServices;
use App\DTO\Basket\CreateBasketDTO;
use App\DTO\Basket\DeleteBasketDTO;
use App\DTO\Basket\CountUpdateBasketDTO;

class BasketTest extends TestCase
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

        $serviceIngridient = new IngridientServices();
        $dataIngridient = $serviceIngridient->actionCreate(
            new CreateIngridientDTO(
                $dataCategory->id,
                'Морковка'
            )
        );
        $this->assertNotNull($dataIngridient);
        $this->assertEquals($dataIngridient->CategoryId, $dataCategory->id);
        $this->assertEquals($dataIngridient->Title, "Морковка");

        $serviceUser = new UserServices();
        $dataUser = $serviceUser->CreateAction(
            new CreateUserDTO(null, null, '+7 (999) 345-55-66', null)
        );

        $this->assertNotNull($dataUser);
        $this->assertEquals($dataUser->FirstName, null);
        $this->assertEquals($dataUser->Phone, '+7 (999) 345-55-66');

        $service = new BasketServices();
        $data = $service->actionCreate(
            new CreateBasketDTO(
                $dataUser->id,
                $dataMenu->id,
                1000,
                7
            )
        );

        $this->assertNotNull($data);
        $this->assertEquals($data->UserId, $dataUser->id);
        $this->assertEquals($data->MenuId, $dataMenu->id);
        $this->assertEquals($data->Price, 1000);
        $this->assertEquals($data->Count, 7);
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

        $serviceIngridient = new IngridientServices();
        $dataIngridient = $serviceIngridient->actionCreate(
            new CreateIngridientDTO(
                $dataCategory->id,
                'Морковка'
            )
        );
        $this->assertNotNull($dataIngridient);
        $this->assertEquals($dataIngridient->CategoryId, $dataCategory->id);
        $this->assertEquals($dataIngridient->Title, "Морковка");

        $serviceUser = new UserServices();
        $dataUser = $serviceUser->CreateAction(
            new CreateUserDTO(null, null, '+7 (999) 345-55-66', null)
        );

        $this->assertNotNull($dataUser);
        $this->assertEquals($dataUser->FirstName, null);
        $this->assertEquals($dataUser->Phone, '+7 (999) 345-55-66');

        $service = new BasketServices();
        $dataCreate = $service->actionCreate(
            new CreateBasketDTO(
                $dataUser->id,
                $dataMenu->id,
                1000,
                7
            )
        );

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->UserId, $dataUser->id);
        $this->assertEquals($dataCreate->MenuId, $dataMenu->id);
        $this->assertEquals($dataCreate->Price, 1000);
        $this->assertEquals($dataCreate->Count, 7);

        $data = $service->actionDelete(
            new DeleteBasketDTO($dataCreate->id)
        );
        $this->assertNotNull($data);
        $this->assertEquals($data->id, $dataCreate->id);
    }

    /**
     * A basic feature test update count.
     */
    public function test_update_count(): void
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

        $serviceIngridient = new IngridientServices();
        $dataIngridient = $serviceIngridient->actionCreate(
            new CreateIngridientDTO(
                $dataCategory->id,
                'Морковка'
            )
        );
        $this->assertNotNull($dataIngridient);
        $this->assertEquals($dataIngridient->CategoryId, $dataCategory->id);
        $this->assertEquals($dataIngridient->Title, "Морковка");

        $serviceUser = new UserServices();
        $dataUser = $serviceUser->CreateAction(
            new CreateUserDTO(null, null, '+7 (999) 345-55-66', null)
        );

        $this->assertNotNull($dataUser);
        $this->assertEquals($dataUser->FirstName, null);
        $this->assertEquals($dataUser->Phone, '+7 (999) 345-55-66');

        $service = new BasketServices();
        $dataCreate = $service->actionCreate(
            new CreateBasketDTO(
                $dataUser->id,
                $dataMenu->id,
                1000,
                7
            )
        );

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->UserId, $dataUser->id);
        $this->assertEquals($dataCreate->MenuId, $dataMenu->id);
        $this->assertEquals($dataCreate->Price, 1000);
        $this->assertEquals($dataCreate->Count, 7);

        $data = $service->actionCountUpdate(
            new CountUpdateBasketDTO(
                $dataCreate->id,
                3
            )
        );
        $this->assertNotNull($data);
        $this->assertEquals($data->Count, 3);
    }
}
