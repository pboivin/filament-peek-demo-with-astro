import { h, Fragment } from 'preact';

export default function Paragraph({ data }) {
    return <div dangerouslySetInnerHTML={{ __html: data.text }}></div>;
}
