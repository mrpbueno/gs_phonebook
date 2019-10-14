<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\ContactImport;
use Excel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactRequest $request
     * @return Response
     */
    public function store(ContactRequest $request)
    {
        Contact::create($request->all());
        flash(trans('app.contact_created'))->success();

        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Contact $contact
     * @return Response
     */
    public function show(Contact $contact)
    {
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @return Response
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ContactRequest $request
     * @param Contact $contact
     * @return Response
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->all());
        flash(trans('app.contact_updated'))->success();

        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return Response
     * @throws \Exception
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        flash(trans('app.contact_deleted'))->success();

        return redirect()->route('contact.index');
    }

    /**
     * @return BinaryFileResponse
     */
    public function phonebook()
    {
        $path = base_path().'/storage/app/phonebook.xml';

        return response()->download($path);
    }

    public function xml()
    {
        $path = base_path().'/storage/app/phonebook.xml';
        header('Content-type: text/xml');
        readfile($path);
    }

    public function import()
    {
        return view('contact.import');
    }

    /**
     * @param ImportRequest $request
     * @return RedirectResponse
     */
    public function importFile(ImportRequest $request)
    {
        $path = $request->file('import_file')->getRealPath();
        Excel::import(new ContactImport, $path);
        flash(trans('app.contact_imported'))->success();

        return redirect()->route('contact.index');
    }
}
