<?php

namespace App\Services;
use App\DTOs\TaskDTO;
use App\Enums\Priority;
use App\Events\CriticalTaskCreated;
use App\Events\TaskCreated;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Event;

class TaskService
{

    public function storeTask(TaskDTO $dto): Task
    {
        $task = new Task();
        $task->title = $dto->title;
        $task->description = $dto->description;
        $task->priority = Priority::from($dto->priority);
        $task->status_id = $dto->status_id;
        $task->user_id = $dto->user_id;
        $task->save();

        TaskCreated::dispatch($task);
        
        if($task->priority = Priority::HIGH){
            broadcast(new CriticalTaskCreated($task))->toOthers();
        }

        return $task;
    }
}