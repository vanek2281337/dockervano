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
use App\Domain\Services\PurchasesHistoryServices;
use App\DTO\PurchasesHistory\CreatePurchasesHistoryDTO;
use App\DTO\PurchasesHistory\ShowByUserPurchasesHistoryDTO;
use App\DTO\PurchasesHistory\ShowPurchasesHistoryDTO;

class PurchasesHistoryTest extends TestCase
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

        $serviceBasket = new BasketServices();
        $dataBasket = $serviceBasket->actionCreate(
            new CreateBasketDTO(
                $dataUser->id,
                $dataMenu->id,
                1000,
                7
            )
        );

        $this->assertNotNull($dataBasket);
        $this->assertEquals($dataBasket->UserId, $dataUser->id);
        $this->assertEquals($dataBasket->MenuId, $dataMenu->id);
        $this->assertEquals($dataBasket->Price, 1000);
        $this->assertEquals($dataBasket->Count, 7);

        $service = new PurchasesHistoryServices();
        $data = $service->CreateAction(
            new CreatePurchasesHistoryDTO(
                $dataUser->id,
                '9999',
                1000,
                '[{
                    "Title": "Бургер с укропом",
                    "Price": 200,
                    "Count": 4,
                    "IngridientValue": [{
                        "Title": "Морковь", "Count": 4,
                        "Title": "Жимолость", "Count": 2
                    }]
                },
                {
                    "Title": "Вода из под крана",
                    "Price": 90,
                    "Count": 1,
                    "IngridientValue": []
                }]',
                '23.07.2023',
                '11:58'
            )
        );

        $this->assertNotNull($data);
        $this->assertEquals($data->UserId, $dataUser->id);
        $this->assertEquals($data->OrderCode, '9999');
        $this->assertNotNull($data->Values);
        $this->assertEquals($data->SetDate, '23.07.2023');
        $this->assertEquals($data->SetTime, '11:58');
    }

    /**
     * A basic feature test show by user id.
     */
    public function test_show_by_user_id(): void
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

        $serviceBasket = new BasketServices();
        $dataBasket = $serviceBasket->actionCreate(
            new CreateBasketDTO(
                $dataUser->id,
                $dataMenu->id,
                1000,
                7
            )
        );

        $this->assertNotNull($dataBasket);
        $this->assertEquals($dataBasket->UserId, $dataUser->id);
        $this->assertEquals($dataBasket->MenuId, $dataMenu->id);
        $this->assertEquals($dataBasket->Price, 1000);
        $this->assertEquals($dataBasket->Count, 7);

        $service = new PurchasesHistoryServices();
        $dataCreate = $service->CreateAction(
            new CreatePurchasesHistoryDTO(
                $dataUser->id,
                '9999',
                1000,
                '[{
                    "Title": "Бургер с укропом",
                    "Price": 200,
                    "Count": 4,
                    "IngridientValue": [{
                        "Title": "Морковь", "Count": 4,
                        "Title": "Жимолость", "Count": 2
                    }]
                },
                {
                    "Title": "Вода из под крана",
                    "Price": 90,
                    "Count": 1,
                    "IngridientValue": []
                }]',
                '23.07.2023',
                '11:58'
            )
        );

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->UserId, $dataUser->id);
        $this->assertEquals($dataCreate->OrderCode, '9999');
        $this->assertNotNull($dataCreate->Values);
        $this->assertEquals($dataCreate->SetDate, '23.07.2023');
        $this->assertEquals($dataCreate->SetTime, '11:58');

        $data = $service->ShowByUserAction(
            new ShowByUserPurchasesHistoryDTO($dataCreate->UserId)
        );

        $this->assertNotNull($data);
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

        $serviceBasket = new BasketServices();
        $dataBasket = $serviceBasket->actionCreate(
            new CreateBasketDTO(
                $dataUser->id,
                $dataMenu->id,
                1000,
                7
            )
        );

        $this->assertNotNull($dataBasket);
        $this->assertEquals($dataBasket->UserId, $dataUser->id);
        $this->assertEquals($dataBasket->MenuId, $dataMenu->id);
        $this->assertEquals($dataBasket->Price, 1000);
        $this->assertEquals($dataBasket->Count, 7);

        $service = new PurchasesHistoryServices();
        $dataCreate = $service->CreateAction(
            new CreatePurchasesHistoryDTO(
                $dataUser->id,
                '9999',
                1000,
                '[{
                    "Title": "Бургер с укропом",
                    "Price": 200,
                    "Count": 4,
                    "IngridientValue": [{
                        "Title": "Морковь", "Count": 4,
                        "Title": "Жимолость", "Count": 2
                    }]
                },
                {
                    "Title": "Вода из под крана",
                    "Price": 90,
                    "Count": 1,
                    "IngridientValue": []
                }]',
                '23.07.2023',
                '11:58'
            )
        );

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->UserId, $dataUser->id);
        $this->assertEquals($dataCreate->OrderCode, '9999');
        $this->assertNotNull($dataCreate->Values);
        $this->assertEquals($dataCreate->SetDate, '23.07.2023');
        $this->assertEquals($dataCreate->SetTime, '11:58');

        $data = $service->ShowAction(
            new ShowPurchasesHistoryDTO($dataCreate->id)
        );
        
        $this->assertNotNull($data);
    }
}
