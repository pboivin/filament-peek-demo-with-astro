import { h, Fragment } from 'preact';
import { getPreview } from '../api/preview.js';

import PostContent from './PostContent.jsx';

function getToken() {
    const params = new URLSearchParams(document.location.search);

    return params.get('token');
}

const token = getToken();

const previewData = token ? await getPreview(token) : null;

export default function PostPreviewContainer() {
    return <>{!previewData ? <div class="p-8 text-center text-red-500">Not available</div> : <PostContent post={previewData.post} />}</>;
}
