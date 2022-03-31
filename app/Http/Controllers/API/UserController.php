<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Notification;
use App\Services\UserService;
use App\Notifications\VerifyNotification;
use App\Jobs\VerifyEmailJob;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function show($id)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->userService->getById($id),
        ]);
    }

    public function index()
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->userService->getAll(),
        ]);
    }

    public function take($limit)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->userService->getTake($limit),
        ]);
    }

    public function verified()
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->userService->verified(),
        ]);
    }

    public function store(Request $request)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Create",
            "data" => $this->userService->create($request),
        ]);
    }

    public function update(Request $request, $id)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Update",
            "data" => $this->userService->update($request, $id),
        ]);
    }

    public function storeBulk(Request $request)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Create",
            "data" => $this->userService->storeBulk($request),
        ]);
    }

    public function updateBulk(Request $request)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Update",
            "data" => $this->userService->updateBulk($request),
        ]);
    }

    public function updateOrCreate(Request $request, $id)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Update",
            "data" => $this->userService->updateOrCreate($request, $id),
        ]);
    }

    public function save(Request $request)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Create",
            "data" => $this->userService->save($request),
        ]);
    }

    public function saveUpdate(Request $request, $id)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Update",
            "data" => $this->userService->save($request, $id),
        ]);
    }

    public function destroy($id)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Delete",
            "data" => $this->userService->destroy($id),
        ]);
    }

    public function permanetDelete($id)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Delete",
            "data" => $this->userService->permanetDelete($id),
        ]);
    }

    public function restore($id)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Restore",
            "data" => $this->userService->restore($id),
        ]);
    }

    public function deleted()
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->userService->getDeleted(),
        ]);
    }

    public function getAllWithDeleted()
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->userService->getAllWithDeleted(),
        ]);
    }

    public function upload(Request $request, $id)
    {
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Retrieve",
            "data" => $this->userService->upload($request, $id),
        ]);
    }

    public function sendVerifyReminder($id)
    {
        $user = $this->userService->getById($id);
        if (empty($user->email_verified_at)) {
            Notification::route('mail', $user->email)->notify(new VerifyNotification);
        }

        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Send Notification",
            "data" => true,
        ]);
    }

    public function sendBulkVerifyReminder()
    {
        VerifyEmailJob::dispatch();
        return Response::json([
            "success" => true,
            "code" => 200,
            "message" => "Sucessfully Send Notification",
            "data" => true,
        ]);
    }
}
