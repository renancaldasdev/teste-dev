<?php

namespace App\Contacts\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Contacts\Interfaces\ContactsRepositoryInterface;
use App\Contacts\Models\Contact;

class ContactsRepository extends BaseRepository implements ContactsRepositoryInterface
{
    protected string $_model = Contact::class;

}
