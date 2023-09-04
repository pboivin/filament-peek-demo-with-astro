import { API_BASE } from '../constants';

export async function getFeaturedPosts() {
    const response = await fetch(`${API_BASE}/content/posts/featured`);

    return (await response.json()) || [];
}

export async function getPosts() {
    const response = await fetch(`${API_BASE}/content/posts`);

    return (await response.json()) || [];
}

export async function getPostsForCategory(slug) {
    const response = await fetch(`${API_BASE}/content/posts/category/${slug}`);

    return (await response.json()) || [];
}

export async function getPost(slug) {
    const response = await fetch(`${API_BASE}/content/post/${slug}`);

    return (await response.json()) || [];
}
