<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContact;
use App\Models\Contact;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function index(): Application|Factory|View
    {
        if (Gate::allows('viewAllAndDeleted')) {
            $contacts = Contact::with('user')->onlyTrashed()->orderBy('name')->get();
            return view('contacts.index', compact('contacts'));
        }

        if (Gate::allows('viewAll')) {
            $contacts = Contact::with('user')->orderBy('name')->get();
            return view('contacts.index', compact('contacts'));
        }

        $this->authorize('viewAny', Contact::class);

        $contacts = Contact::where('user_id', Auth::id())->get();
        return view('contacts.index', compact('contacts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create(): View|Factory|Application
    {
        $this->authorize('create', Contact::class);
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreContact $request
     * @return RedirectResponse
     */
    public function store(StoreContact $request): RedirectResponse
    {
        $request['slug'] = Str::slug($request->name, '-');
        $imgURL = $request->file('file')->storeAS('contacts_img', $request->file->getClientOriginalName());

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->slug = $request->slug;
        $contact->birth_date = $request->birth_date;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->country = $request->country;
        $contact->address = $request->address;
        $contact->job_contact = $request->job_contact;
        $contact->user_id = $request->user()->id;
        $contact->image = $imgURL;
        $contact->relation = join('', $request->relation);
        $contact->save();

        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Contact $contact
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function show(Contact $contact): Application|Factory|View
    {
        $this->authorize('view', $contact);

        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(Contact $contact): Application|Factory|View
    {
        $this->authorize('update', $contact);

        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreContact $request
     * @param Contact $contact
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(StoreContact $request, Contact $contact): RedirectResponse
    {
        $this->authorize('update', $contact);

        $editedContact = $request->all();
        $editedContact['relation'] = join('', $request->relation);
        $contact->update($editedContact);
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $this->authorize('delete', $contact);

        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
