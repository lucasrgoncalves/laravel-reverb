<?php

namespace App\Livewire;

use App\Jobs\ProcessarArquivoJob;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class ProcessarArquivo extends Component
{
    public string $status = 'aguardando';
    public ?string $currentUserId = null;

    public function mount()
    {
        $this->currentUserId = Auth::id() ?? Str::uuid()->toString();
    }

    protected function getListeners()
    {
        if (empty($this->currentUserId)) {
            return [];
        } else if (Auth::check() && Auth::id() === $this->currentUserId) {
            // Canal privado
            return [
                "echo-private:Usuario.Processar.Arquivo.{$this->currentUserId},.processar.arquivos.finalizado" => 'finalizaProcessamento',
                'resetarProcessamento' => 'resetarProcessamento',
            ];
        } else {
            // Canal público
            return [
                "echo:Processar.Arquivo.{$this->currentUserId},.processar.arquivos.finalizado" => 'finalizaProcessamento',
                'resetarProcessamento' => 'resetarProcessamento',
            ];
        }
    }

    public function render()
    {
        return view('livewire.processar-arquivo');
    }

    public function iniciarProcessamento()
    {
        $this->status = 'processando';
        ProcessarArquivoJob::dispatch($this->currentUserId);
        $this->dispatch('processando-arquivo');
    }

    public function finalizaProcessamento()
    {
        $this->status = 'finalizado';
        $this->dispatch('resetarProcessamento');
        $this->dispatch('processamento-finalizado');
    }

    public function resetarProcessamento()
    {
        sleep(5);
        $this->status = 'aguardando';
    }
}
