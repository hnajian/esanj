<?php

namespace App\Livewire;

use App\DTOs\TaskDTO;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Livewire\Component;
use Session;

class Tasks extends Component
{
    public $tasks = [];

    public $title = '';
    public $description = '';
    public $priority = 'low';
    public $status_id = 1;


    protected TaskService $service;
 

    public function boot(TaskService $service){
        $this->service = $service;
        $this->tasks = Task::latest()->get();
    }
    

    public function create(){

        $taskDTO = $this->taskDTO();
        $this->service->storeTask($taskDTO);
        $this->tasks = Task::latest()->get();
        $this->reset('title');

    }

    public function render()
    {
        return view('livewire.tasks');
    }

    public function taskDTO(): TaskDTO{

        $dto = new TaskDTO(
            title: $this->title,
            description: $this->description,
            priority: $this->priority,
            status_id: $this->status_id,
            user_id: auth()->user()->id
        );
        return $dto;
    }
}
