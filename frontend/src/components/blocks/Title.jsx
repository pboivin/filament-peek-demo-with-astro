import { h, Fragment } from 'preact';

export default function Title({ data }) {
    const Heading = `${data.level}`;

    return <Heading>{data.text}</Heading>;
}
