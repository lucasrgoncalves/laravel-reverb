<?php

namespace App\Jobs;

use App\Events\ProcessarArquivoEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessarArquivoJob implements ShouldQueue
{
    use Queueable;
    private $userId;

    /**
     * Create a new job instance.
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(5); // Simula o processamento do arquivo
        ProcessarArquivoEvent::dispatch($this->userId);
    }
}
