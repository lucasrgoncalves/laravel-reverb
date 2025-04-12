<div class="bg-gradient-to-br from-gray-900 to-gray-800 p-8 rounded-xl shadow-2xl max-w-2xl w-full">
    @if ($mostrarProcessar)
        @livewire('processar-arquivo')
    @else
        <div class="text-center text-white">
            <h2 class="text-3xl font-bold mb-4 text-orange-400">Laravel Reverb Demo</h2>

            <div class="flex items-center justify-center mb-6">
                <div class="w-20 h-0.5 bg-gradient-to-r from-transparent via-orange-400 to-transparent"></div>
                <div class="mx-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div class="w-20 h-0.5 bg-gradient-to-r from-transparent via-orange-400 to-transparent"></div>
            </div>

            <div class="mb-8 bg-gray-800 bg-opacity-50 p-6 rounded-lg">
                <h3 class="text-lg font-semibold mb-3 text-orange-300">Sobre esta aplicação</h3>
                <p class="text-gray-300 mb-4">
                    Esta é uma aplicação de demonstração do <span class="font-semibold text-orange-300">Laravel
                        Reverb</span>,
                    o servidor oficial de WebSockets do Laravel.
                </p>
                <p class="text-gray-300 mb-4">
                    Reverb permite comunicação em tempo real entre o servidor e os clientes,
                    possibilitando atualizações instantâneas sem necessidade de recarregar a página.
                </p>
                <p class="text-gray-300 mb-2">
                    Nesta demo, você verá como o Laravel Reverb:
                </p>
                <ul class="text-left space-y-1 text-gray-300 list-disc list-inside mb-4">
                    <li>Processa arquivos de forma assíncrona</li>
                    <li>Atualiza a interface em tempo real</li>
                    <li>Utiliza canais privados para usuários autenticados</li>
                    <li>E canais públicos para visitantes</li>
                </ul>
            </div>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button wire:click="escolherAutenticar"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Acessar com Login
                    </div>
                </button>
                <button wire:click="continuarSemAutenticar"
                    class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-lg transition-all duration-300">
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Continuar como Visitante
                    </div>
                </button>
            </div>

            <p class="text-gray-400 text-sm mt-6">
                Este é um projeto de estudo e demonstração das capacidades do Laravel Reverb
            </p>
        </div>
    @endif
</div>
