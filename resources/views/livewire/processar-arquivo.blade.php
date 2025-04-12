<div class="bg-white dark:bg-gray-800 rounded-lg p-8 w-full max-w-md shadow-lg">
    <h1 class="text-2xl font-bold text-black dark:text-white text-center">Processador de Arquivo</h1>

    <legend class="mb-6 text-center {{ auth()->check() ? 'text-green-400' : 'text-orange-400' }}">
        {{ auth()->user() ? 'Bem-vindo, ' . auth()->user()->name . '!' : 'Você não está logado!' }}
    </legend>

    <div class="flex items-center justify-between mb-8">
        <span class="text-black dark:text-white font-medium">Status:</span>
        <div class="flex items-center gap-3">
            <div class="relative w-6 h-6">

                <div class="absolute w-6 h-6 rounded-full transition-colors duration-300 bg-gray-300"
                    :class="{
                        'bg-orange-400': $wire.status === 'processando',
                        'bg-green-400': $wire.status === 'finalizado',
                    }">
                </div>

                <span class="absolute inline-flex h-full w-full rounded-full opacity-75 animate-ping"
                    :class="{
                        'bg-gray-300': $wire.status === 'aguardando',
                        'bg-orange-400': $wire.status === 'processando',
                        'bg-green-400': $wire.status === 'finalizado',
                    }">
                </span>
            </div>
            <span class="text-black dark:text-white">
                {{ $status === 'aguardando' ? 'Aguardando' : ($status === 'processando' ? 'Processando...' : 'Processado') }}
            </span>
        </div>
    </div>

    <button wire:click="iniciarProcessamento" @if ($status === 'processando' || $status === 'finalizado') disabled @endif
        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 px-4 rounded-md transition-colors duration-300 disabled:opacity-50"
        :class="{
            'bg-gray-500': $wire.status === 'aguardando',
            'bg-orange-500': $wire.status === 'processando',
            'bg-green-500': $wire.status === 'finalizado',
        }">
        {{ $status === 'aguardando' ? 'Processar Arquivo' : ($status == 'processando' ? 'Aguarde...' : 'Arquivo Processado!') }}
    </button>

    @if ($status === 'aguardando')
        <p class="text-xs text-gray-500 dark:text-gray-400 italic text-center mt-2">Clique no botão acima para iniciar o
            processamento</p>
    @endif
</div>
