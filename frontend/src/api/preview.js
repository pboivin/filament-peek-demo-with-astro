import { API_BASE } from '../constants';

export async function getPreview(token) {
    const response = await fetch(`${API_BASE}/preview/${token}`);

    try {
        return (await response.json()) || null;
    } catch (e) {
        return null;
    }
}
