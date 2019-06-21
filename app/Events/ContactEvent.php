<?php

namespace App\Events;

use App\Contact;


class ContactEvent
{
    /**
     * @var Contact
     */
    private $contact;

    /**
     * Create a new event instance.
     *
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }
}
