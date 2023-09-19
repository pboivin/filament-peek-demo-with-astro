import { h, Fragment } from 'preact';

import Title from './blocks/Title.jsx';
import Paragraph from './blocks/Paragraph.jsx';
import Image from './blocks/Image.jsx';
import PageCard from './blocks/PageCard.jsx';
import PostCard from './blocks/PostCard.jsx';

const blockTypes = {
    title: (data) => <Title data={data} />,
    paragraph: (data) => <Paragraph data={data} />,
    image: (data) => <Image data={data} />,
    page_card: (data) => <PageCard data={data} />,
    post_card: (data) => <PostCard data={data} />,
};

export default function RenderBlocks({ blocks }) {
    return blocks.map((block) => {
        const render = blockTypes[block.type];

        return render ? render(block.data) : <div class="text-red-500">[block {block.type} not found]</div>;
    });
}
