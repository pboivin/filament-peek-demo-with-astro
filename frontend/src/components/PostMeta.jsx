import { h, Fragment } from 'preact';

export default function PostMeta({ date, categoryName, categorySlug }) {
    return date ? (
        <div>
            Published on {date} — in <a href={`/category/${categorySlug}`}>{categoryName}</a>
        </div>
    ) : (
        <div>[Not published]</div>
    );
}
