<?php

namespace App\Observers;

use App\Models\Company;
use Jdenticon\Identicon;

class CompanyObserver
{
    /**
     * Handle the Company "created" event.
     */
    public function created(Company $company): void
    {
        $logo = new Identicon([
            'value' => $company->title . $company->id,
            'size' => 150,
        ]);

        $company->addMediaFromString($logo->getImageData('png'))
            ->usingFileName('logo.png')
            ->toMediaCollection('logo');
    }

    /**
     * Handle the Company "updated" event.
     */
    public function updated(Company $company): void
    {
        //
    }

    /**
     * Handle the Company "deleted" event.
     */
    public function deleted(Company $company): void
    {
        //
    }

    /**
     * Handle the Company "restored" event.
     */
    public function restored(Company $company): void
    {
        //
    }

    /**
     * Handle the Company "force deleted" event.
     */
    public function forceDeleted(Company $company): void
    {
        //
    }
}
