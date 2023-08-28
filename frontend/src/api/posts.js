import { API_BASE } from '../constants';

export async function getFeaturedPosts() {
    const response = await fetch(`${API_BASE}/content/posts/featured`);

    return (await response.json()) || [];
}
