import { h, Fragment } from 'preact';

export default function PageContent({ page }) {
    return (
        <main>
            <div class="relative min-h-[200px] flex items-center justify-center bg-gray-100">
                <div class="relative z-1 p-2 text-4xl text-gray-700 lg:text-6xl">
                    <h1>{page.title}</h1>
                </div>
            </div>

            <div class="max-w-wide mx-auto p-2">
                <div class="prose mt-8 mx-auto text-black" dangerouslySetInnerHTML={{ __html: page.content }} />
            </div>
        </main>
    );
}
