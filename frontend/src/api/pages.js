import { API_BASE } from '../constants';

export async function getPages() {
    const response = await fetch(`${API_BASE}/content/pages`);

    return (await response.json()) || [];
}

export async function getPage(slug) {
    const response = await fetch(`${API_BASE}/content/page/${slug}`);

    return (await response.json()) || [];
}
