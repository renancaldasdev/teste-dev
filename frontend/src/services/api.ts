import axios from 'axios'

const client = axios.create({
    baseURL: import.meta.env.VITE_API_URL,
})

const get = async (url: string, params?: any) => {
    return await client.get(url, params)
}

const post = async (url: string, params: any) => {
    return await client.post(url, params)
}

const update = async (url: string, params: any) => {
    return await client.patch(url, params)
}

const destroy = async (url: string, params?: any) => {
    return await client.delete(url, params)
}

export default {get, post,update, destroy}