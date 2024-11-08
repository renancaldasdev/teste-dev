import api from "./api";

export async function helloWorld() {
    try {
        return await api.get('hello');
    } catch (err) {
        throw err;
    }
}

export async function getContacts(contactsPerPage: number) {
    try {
        return await api.get('contacts', {
            params: {
                amount_per_page: contactsPerPage
            }
        });
    } catch (err) {
        throw err;
    }
}