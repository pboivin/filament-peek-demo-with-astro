import { API_BASE } from '../constants';

export async function getPreview(token) {
    try {
        const response = await fetch(`${API_BASE}/preview/${token}`);

        return (await response.json()) || null;
    } catch (e) {
        return null;
    }
}
