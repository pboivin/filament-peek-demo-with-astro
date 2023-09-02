import { h, Fragment } from 'preact';

export default function PageCard({ data }) {
    return (
        <a class="aspect-[4/3] p-4 border bg-gray-100" href={data.card_url}>
            {data.card_text}
        </a>
    );
}
