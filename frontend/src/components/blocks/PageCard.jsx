import { h, Fragment } from 'preact';

export default function PageCard({ data }) {
    const text = data.text || data.page?.title;
    const url = `/${data.page?.slug}`;

    return (
        <a class="relative aspect-[4/3] p-4 border bg-gray-100" href={url}>
            {text}
        </a>
    );
}
