import { h, Fragment } from 'preact';

export default function PostCard({ data }) {
    const text = data.text || data.post?.title;
    const url = `/blog/${data.post?.slug}`;
    const image = data.post?.main_image;

    return (
        <a class="relative aspect-[4/3] border bg-gray-100" href={url}>
            {image ? (
                <img
                    class="absolute top-0 left-0 w-full h-full p-0 m-0 opacity-20 object-center object-cover"
                    src={image}
                    alt=""
                />
            ) : (
                ''
            )}
            <div class="relative z-1 p-4">{text}</div>
        </a>
    );
}
