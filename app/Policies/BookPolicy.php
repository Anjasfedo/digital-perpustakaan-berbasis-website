<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Constants;
use Illuminate\Auth\Access\Response;

class BookPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole([Constants::ADMIN, Constants::USER]);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Book $book): bool
    {
        return $user->hasRole(Constants::ADMIN) || ($user->hasRole(Constants::USER) && $user->id === $book->user_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole([Constants::ADMIN, Constants::USER]);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Book $book): bool
    {
        return $user->hasRole(Constants::ADMIN) || ($user->hasRole(Constants::USER) && $user->id === $book->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Book $book): bool
    {
        return $user->hasRole(Constants::ADMIN) || ($user->hasRole(Constants::USER) && $user->id === $book->user_id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Book $book): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Book $book): bool
    {
        //
    }
}