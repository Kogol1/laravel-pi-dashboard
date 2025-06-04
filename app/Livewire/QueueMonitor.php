<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Laravel\Pulse\Livewire\Card;
use Livewire\Attributes\Lazy;
use Illuminate\Contracts\View\View;
use Exception;

#[Lazy]
class QueueMonitor extends Card
{
    public string $project;
    public string $projectName;
    public string $databaseConnection;

    public function mount(string $project): void
    {
        $this->project = $project;

        $config = config("dashboard.projects.{$project}");

        $this->projectName = $config['name'];
        $this->databaseConnection = $config['database_connection'];
    }

    public function render(): View
    {
        $queuedJobs = collect();
        $failedJobs = collect();

        try {
            $queuedJobs = DB::connection($this->databaseConnection)
                ->table('jobs')
                ->select('queue', DB::raw('count(*) as total'))
                ->groupBy('queue')
                ->get();

            $failedJobs = DB::connection($this->databaseConnection)
                ->table('failed_jobs')
                ->select(DB::raw("'failed' as queue"), DB::raw('count(*) as total'))
                ->get();
        } catch (Exception $e) {
            // Silently fail if the DB is unreachable or tables don't exist
        }


        $data = $queuedJobs->merge($failedJobs);

        return view('livewire.queue-monitor', [
            'projectName' => $this->projectName,
            'data' => $data,
        ]);
    }
}
