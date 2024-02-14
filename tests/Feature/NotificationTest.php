<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Domain\Services\NotificationServices;
use App\DTO\Notification\CreateNotificationDTO;
use App\DTO\Notification\DeleteNotificationDTO;
use App\DTO\Notification\ShowNotificationDTO;
use App\DTO\Notification\UpdateNotificationDTO;

class NotificationTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test create.
     */
    public function test_create(): void
    {
        $service = new NotificationServices();
        $data = $service->CreateAction(
            new CreateNotificationDTO(
                "Однажды в самолёте...",
                null,
                "10fb1e506d60c8ec4326a2832273ef8c.jpg"
            )
        );

        $this->assertNotNull($data);
        $this->assertEquals($data->Title, "Однажды в самолёте...");
        $this->assertEquals($data->Description, null);
        $this->assertEquals($data->Image, "10fb1e506d60c8ec4326a2832273ef8c.jpg");
    }

    /**
     * A basic feature test delete.
     */
    public function test_delete(): void
    {
        $service = new NotificationServices();
        $dataCreate = $service->CreateAction(
            new CreateNotificationDTO(
                "Однажды в самолёте...",
                null,
                "10fb1e506d60c8ec4326a2832273ef8c.jpg"
            )
        );

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->Title, "Однажды в самолёте...");
        $this->assertEquals($dataCreate->Description, null);
        $this->assertEquals($dataCreate->Image, "10fb1e506d60c8ec4326a2832273ef8c.jpg");

        $data = $service->DeleteAction(
            new DeleteNotificationDTO($dataCreate->id)
        );

        $this->assertNotNull($data);
    }

    /**
     * A basic feature test update.
     */
    public function test_update(): void
    {
        $service = new NotificationServices();
        $dataCreate = $service->CreateAction(
            new CreateNotificationDTO(
                "Однажды в самолёте...",
                null,
                "10fb1e506d60c8ec4326a2832273ef8c.jpg"
            )
        );

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->Title, "Однажды в самолёте...");
        $this->assertEquals($dataCreate->Description, null);
        $this->assertEquals($dataCreate->Image, "10fb1e506d60c8ec4326a2832273ef8c.jpg");

        $data = $service->UpdateAction(
            new UpdateNotificationDTO(
                $dataCreate->id,
                "Однажды в самолёте...",
                "Описание",
                "10fb1e506d60c8ec4326a2832273ef8c.jpg"
            )
        );

        $this->assertNotNull($data);
        $this->assertEquals($data->Title, "Однажды в самолёте...");
        $this->assertEquals($data->Description, "Описание");
        $this->assertEquals($data->Image, "10fb1e506d60c8ec4326a2832273ef8c.jpg");
    }

    /**
     * A basic feature test show.
     */
    public function test_show(): void
    {
        $service = new NotificationServices();
        $dataCreate = $service->CreateAction(
            new CreateNotificationDTO(
                "Однажды в самолёте...",
                null,
                "10fb1e506d60c8ec4326a2832273ef8c.jpg"
            )
        );

        $this->assertNotNull($dataCreate);
        $this->assertEquals($dataCreate->Title, "Однажды в самолёте...");
        $this->assertEquals($dataCreate->Description, null);
        $this->assertEquals($dataCreate->Image, "10fb1e506d60c8ec4326a2832273ef8c.jpg");

        $data = $service->ShowAction(
            new ShowNotificationDTO($dataCreate->id)
        );

        $this->assertNotNull($data);
    }
}
