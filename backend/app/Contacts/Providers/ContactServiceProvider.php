<?php

namespace App\Contacts\Providers;

use App\Contacts\Interfaces\ContactsRepositoryInterface;
use App\Contacts\Repositories\ContactsRepository;
use Carbon\Laravel\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{

    public function register(): void {
       $this->app->bind(ContactsRepositoryInterface::class, ContactsRepository::class);
    }

    public function boot()
    {
    }
}
