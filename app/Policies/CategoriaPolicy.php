<?php

namespace App\Policies;

use App\Models\Categoria;
use App\Models\User;

class CategoriaPolicy
{
  // Todos pueden visualizar el listado de categorías
  public function viewAny(User $user): bool
  {
    return in_array($user->rol, [
      'admin', 'coordinador', 'asistente'
    ]);
  }

  // Todos pueden visualizar una categoría
  public function view(User $user, Categoria $categoria): bool
  {
    return in_array($user->rol, [
      'admin', 'coordinador', 'asistente'
    ]);
  }

  // Solo el administrador puede crear categorías
  public function create(User $user): bool
  {
    return $user->rol === 'admin';
  }

  // Administrador y asistente pueden editar categorías
  public function update(User $user, Categoria $categoria): bool
  {
    return in_array($user->rol, [
      'admin', 'asistente'
    ]);
  }

  // Solo el administrador puede eliminar categorías
  public function delete(User $user, Categoria $categoria): bool
  {
    return $user->rol === 'admin';
  }

  // Solo el administrador puede eliminar varias categorías
  public function deleteAny(User $user): bool
  {
    return $user->rol === 'admin';
  }
}