import { API_BASE } from "../constants";

let cachedMenus = null;

export async function getMenus() {
    if (!cachedMenus) {
        const response = await fetch(`${API_BASE}/content/menus`);
        const data = await response.json();

        cachedMenus = {};

        for (let menu of data) {
            cachedMenus[menu.name] = menu.items;
        }
    }

    return cachedMenus;
}

export async function getMenuItems(name) {
    return (await getMenus())[name];
}
