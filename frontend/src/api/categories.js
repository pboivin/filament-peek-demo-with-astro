import { API_BASE } from '../constants';

export async function getCategories() {
    const response = await fetch(`${API_BASE}/content/categories`);

    return (await response.json()) || [];
}
