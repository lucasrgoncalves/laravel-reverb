<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProcessarArquivoEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function broadcastOn(): array
    {
        $idCanalWebSocketReverb = Auth::check() && Auth::id() === $this->userId ? 'Usuario.Processar.Arquivo.' . $this->userId : 'Processar.Arquivo.' . $this->userId;

        $tipoCanal = Auth::check() && Auth::id() === $this->userId ? PrivateChannel::class : Channel::class;

        return [
            new $tipoCanal($idCanalWebSocketReverb),
        ];
    }

    public function broadcastAs()
    {
        return 'processar.arquivos.finalizado';
    }
}
