<?php

namespace App\Contacts\Http\Controllers;

use App\Contacts\Http\Requests\ContactRequest;
use App\Contacts\Interfaces\ContactsRepositoryInterface;
use App\Contacts\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController
{

    public function __construct(
        private ContactsRepositoryInterface $contactsRepository
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $contactsPerPage = $request->get('amount_per_page', 10);
        return Contact::getAllPaginatedAsJson($contactsPerPage);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request): JsonResponse
    {
        try {
            $dataContacts = $request->all();

            $contact = new Contact($dataContacts);

            $newContact = $this->contactsRepository->save($contact);

            return response()->json([
                'message' => 'Contato criado com sucesso!',
                'data' => $newContact
            ], 201);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $contact = $this->contactsRepository->find($id);
            return response()->json($contact, 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, string $id): JsonResponse
    {
        try {
            $updatedContact = $request->all();
            $contactUpdated = $this->contactsRepository->update($id, $updatedContact);
            return response()->json([
                'message' => 'Contato criado com sucesso!',
                'data' => $contactUpdated
            ], 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $this->contactsRepository->delete($id);
            return response()->json(['message' => 'Contato removido com sucesso!'], 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }
}
