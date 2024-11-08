<script setup lang="ts">
import {ref, onMounted} from 'vue';
import {getContacts} from "@/services/contactsService";

interface Contacts {
  email: string;
  phone: string;
  id: number;
  age: number;
  name: string;
  telephone: string;
}


const contacts = ref<Contacts[]>([])
const pagination = ref({
  current_page: 1,
  last_page: 1,
  next_page_url: null,
  prev_page_url: null
});

async function fetchContacts(url: string | null = null, contactsPerPage: number = 10): Promise<void> {
  try {
    const resp = url ? await getContactsByUrl(url) : await getContacts(contactsPerPage);
    
    if (resp?.status === 200) {
      contacts.value = resp.data.data;
      pagination.value = {
        current_page: resp.data.current_page,
        last_page: resp.data.last_page,
        next_page_url: resp.data.next_page_url,
        prev_page_url: resp.data.prev_page_url,
      };
    }
  } catch (error) {
    console.error('Erro ao obter os contatos:', error);
  }
}

async function getContactsByUrl(url: string) {
  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error(`Erro HTTP! status: ${response.status}`);
    }
    const data = await response.json();
    return {
      status: response.status,
      data: data
    };
  } catch (error) {
    console.error('Erro ao obter os contatos pela URL:', error);
    throw error;
  }
}

onMounted(() => {
  fetchContacts();
})

</script>

<template>
  <div class="container mx-auto">
    <h3 class="text-4xl py-4">Contatos</h3>
    
    <div class="flex justify-end pb-4">
      <button class="bg-blue-500 text-white font-bold px-4 py-2 rounded hover:bg-blue-600">Novo contato +</button>
    </div>
    
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border border-gray-200">
        <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
          <th class="py-3 px-6 text-left">ID</th>
          <th class="py-3 px-6 text-left">Name</th>
          <th class="py-3 px-6 text-left">Telefone</th>
          <th class="py-3 px-6 text-left">Idade</th>
          <th class="py-3 px-6 text-center">Actions</th>
        </tr>
        </thead>
        <tbody class="text-gray-700 text-sm font-light">
        <tr class="border-b border-gray-200 hover:bg-gray-100" v-for="(contact) in contacts" :key="contact.id">
          <td class="py-3 px-6 text-left whitespace-nowrap">{{ contact.id }}</td>
          <td class="py-3 px-6 text-left">{{ contact.name }}</td>
          <td class="py-3 px-6 text-left">{{ contact.telephone }}</td>
          <td class="py-3 px-6 text-left">{{ contact.age }}</td>
          <td class="py-3 px-6 flex items-center justify-center gap-2">
            <button class="bg-blue-500 text-white font-bold px-4 py-2 rounded hover:bg-blue-600">Exibir Endereço
            </button>
            <button class="bg-blue-500 text-white font-bold px-4 py-2 rounded hover:bg-blue-600">Editar</button>
            <button class="bg-red-500 text-white font-bold px-4 py-2 rounded hover:bg-red-600">Deletar</button>
          </td>
        </tr>
        </tbody>
      </table>
      
      <div class="flex justify-between mt-4">
        <button
            :disabled="!pagination.prev_page_url"
            @click="fetchContacts(pagination.prev_page_url)"
            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded disabled:opacity-50 cursor-pointer"
        >
          Anterior
        </button>
        <span>Página {{ pagination.current_page }} de {{ pagination.last_page }}</span>
        <button
            :disabled="!pagination.next_page_url"
            @click="fetchContacts(pagination.next_page_url)"
            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded disabled:opacity-50 cursor-pointer"
        >
          Próximo
        </button>
      </div>
    
    </div>
  </div>

</template>

