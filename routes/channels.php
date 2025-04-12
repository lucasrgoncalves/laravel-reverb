<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Canal público (não deve exigir autenticação)
Broadcast::channel('Processar.Arquivo.{id}', function ($user, $id) {
    return true; // Permite que qualquer cliente se inscreva
});

// Canal privado (exige autenticação)
Broadcast::channel('Usuario.Processar.Arquivo.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
