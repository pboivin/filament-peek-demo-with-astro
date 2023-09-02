import { h, Fragment } from 'preact';

export default function RenderBlocks({ blocks }) {
    return blocks.map((block) => <div>{block.type}</div>);
}
