import { h, Fragment } from 'preact';

function ratioClass(value) {
    if (value === '4-3') return 'aspect-[4/3]';
    if (value === '3-4') return 'aspect-[3/4]';
}

export default function Image({ data }) {
    const src = data.image || data.url;

    return (
        <figure>
            {src ? (
                <img
                    class={`w-full ${ratioClass(data.ratio)} object-cover object-center`}
                    alt={data.alt || ''}
                    src={src || ''}
                />
            ) : (
                ''
            )}
            {data.caption ? <figcaption>{data.caption}</figcaption> : ''}
        </figure>
    );
}
