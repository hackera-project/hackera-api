<?php

namespace App\Observers;

use App\Models\User;
use Jdenticon\Identicon;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $logo = new Identicon([
            'value' => $user->username . $user->id,
            'size' => 150,
        ]);

        $user->addMediaFromString($logo->getImageData('png'))
            ->usingFileName('logo.png')
            ->toMediaCollection('logo');
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
