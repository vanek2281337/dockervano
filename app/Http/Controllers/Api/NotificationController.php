<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Services\NotificationServices;
use App\DTO\Notification\CreateNotificationDTO;
use App\DTO\Notification\ShowNotificationDTO;
use App\DTO\Notification\UpdateNotificationDTO;
use App\DTO\Notification\DeleteNotificationDTO;
use App\Domain\Services\NotificationValidationServices;

class NotificationController extends Controller
{
    public function create(Request $request, NotificationServices $service, NotificationValidationServices $validation)
    {
        $is_valid = $validation->CreateActionValidate($request);
        if (key_exists('errors', $is_valid))
        {
            return response()->json([
                "response" =>  $is_valid
            ]);
        }
        return response()->json([
            "response" => $service->CreateAction(
                new CreateNotificationDTO(
                    $request->Title,
                    $request->Description ? $request->Description : null,
                    $request->Image ? $request->file('Image')->store('uploads', 'public') : null
                )
            )
        ]);
    }

    public function show(int $notification_id, NotificationServices $service)
    {
        return response()->json([
            "response" => $service->ShowAction(
                new ShowNotificationDTO($notification_id)
            )
        ]);
    }

    public function all(NotificationServices $service)
    {
        return response()->json([
            "response" => $service->AllAction()
        ]);
    }
    
    public function update(Request $request, NotificationServices $service, NotificationValidationServices $validation)
    {
        $is_valid = $validation->CreateActionValidate($request);
        if (key_exists('errors', $is_valid))
        {
            return response()->json([
                "response" =>  $is_valid
            ]);
        }
        return response()->json([
            "response" => $service->UpdateAction(
                new UpdateNotificationDTO(
                    $request->Id,
                    $request->Title,
                    $request->Description ? $request->Description : null,
                    $request->file('Image') ? $request->file('Image')->store('uploads', 'public') : null
                )
            )
        ]);
    }

    public function delete(int $notification_id, NotificationServices $service)
    {
        return response()->json([
            "response" => $service->DeleteAction(
                new DeleteNotificationDTO($notification_id)
            )
        ]);
    }
}
