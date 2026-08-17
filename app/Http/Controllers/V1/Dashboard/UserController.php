<?php

namespace App\Http\Controllers\V1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Dashboard\User\StoreUserRequest;
use App\Http\Requests\V1\Dashboard\User\UpdateUserRequest;
use App\Http\Resources\V1\Dashboard\User\UserResource;
use App\Models\User;
use App\Services\V1\Dashboard\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $userService) {}

    // GET /api/users
    public function index(Request $request)
    {
        $users = $this->userService->index($request->all());

        return UserResource::collection($users);
    }

    // POST /api/users
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $user = $this->userService->store($validated);

        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = $this->userService->show((int) $id);
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->userService->update((int) $id, $request->validated());
        return new UserResource($user);
    }

    public function delete($id) 
    {
         $user = User::findOrFail($id);
    $user->delete();
    return response()->json([
        'message' => 'کاربر با موفقیت حذف شد',
    ]);
    }
}
