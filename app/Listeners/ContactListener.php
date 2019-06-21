<?php

namespace App\Listeners;

use App\Contact;
use App\Events\ContactEvent;
use XMLWriter;


class ContactListener
{
    /**
     * Handle the event.
     *
     * @param  ContactEvent  $event
     * @return void
     */
    public function handle(ContactEvent $event)
    {
        $xml = new XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);

        $contacts = Contact::all();

        $xml->startDocument('1.0','UTF-8');
        $xml->startElement('AddressBook');
        foreach ($contacts as $contact) {
            $xml->startElement('Contact');
            $xml->writeElement('id', $contact->id);
            $xml->writeElement('FirstName', $contact->first_name ? $contact->first_name : '');
            $xml->writeElement('LastName', $contact->last_name ? $contact->last_name : '');

            $xml->startElement('Phone');
            $xml->startAttribute('type');
            $xml->text('Work');
            $xml->endAttribute();
            $xml->writeElement('phonenumber', $contact->phone_number_work);
            $xml->writeElement('accountindex', $contact->account_index);
            $xml->endElement(); /*Phone*/

            if ($contact->phone_number_home) {
                $xml->startElement('Phone');
                $xml->startAttribute('type');
                $xml->text('Home');
                $xml->endAttribute();
                $xml->writeElement('phonenumber', $contact->phone_number_home);
                $xml->writeElement('accountindex', $contact->account_index);
                $xml->endElement(); /*Phone*/
            }

            if ($contact->phone_number_cell) {
                $xml->startElement('Phone');
                $xml->startAttribute('type');
                $xml->text('Cell');
                $xml->endAttribute();
                $xml->writeElement('phonenumber', $contact->phone_number_cell);
                $xml->writeElement('accountindex', $contact->account_index);
                $xml->endElement(); /*Phone*/
            }

            $xml->writeElement('Department', $contact->department ? $contact->department : '');
            $xml->writeElement('Primary', '0');
            $xml->endElement(); /*Contact*/
        }

        $xml->endElement(); /*AddressBook*/
        $xml->endDocument();

        $path = base_path()."/storage/app/phonebook.xml";
        file_put_contents($path, $xml->outputMemory(true));
    }
}
