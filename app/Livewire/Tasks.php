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
        $this->tasks = auth()->user()->tasks()->latest()->get();
    }

    
    public function getListeners()
    {
        $userId = auth()->user()->id;
        return [
            "echo-private:user.{$userId},TaskCreated" => 'refresh',
            'echo:tasks,CriticalTaskCreated' => 'showNotif',
            'echo:tasks,TaskComplited' => 'showNotif',
        ];
    }

    public function refresh(){
        $this->tasks = auth()->user()->tasks()->latest()->get();
    }

    public function showNotif($event){

        Session::flash('message', $event['message']); 
    }
    

    public function create(){

        $taskDTO = $this->taskDTO();
        $this->service->storeTask($taskDTO);
        $this->tasks = auth()->user()->tasks()->latest()->get();
        $this->reset(['title', 'description', 'priority', 'status_id']);

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
