import { h, Fragment } from 'preact';

export default function PostCard({ data }) {
    return (
        <a class="relative aspect-[4/3] p-4 border bg-gray-100" href={data.card_url}>
            <img
                class="absolute top-0 left-0 w-full h-full p-0 m-0 opacity-20 object-center object-cover"
                src={data.card_image}
                alt=""
            />
            <div class="relative z-1 p-4">{data.card_text}</div>
        </a>
    );
}
