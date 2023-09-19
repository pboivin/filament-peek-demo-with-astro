import { API_BASE } from '../constants';

export async function getMenus() {
    const response = await fetch(`${API_BASE}/content/menus`);
    const data = await response.json();
    const menus = {};

    for (let menu of data) {
        menus[menu.name] = menu.items;
    }

    return menus;
}

export async function getMenuItems(name) {
    return (await getMenus())[name];
}
