import { h, Fragment } from 'preact';

import PostMeta from './PostMeta.jsx';
import RenderBlocks from './RenderBlocks.jsx';

export default function PostContent({ post, category }) {
    console.log(post);

    return (
        <main>
            <div class="relative min-h-[200px] flex items-center justify-center bg-black">
                {post.main_image ? (
                    <div
                        class="absolute inset-0 z-0 opacity-50"
                        style={`background-image: url(${post.main_image}); background-size: cover; background-position: center;`}
                    ></div>
                ) : (
                    ''
                )}

                <div class="relative z-1 p-2 text-4xl text-gray-700 lg:text-6xl">
                    <div class="text-4xl text-white">
                        <h1>{post.title}</h1>
                    </div>
                </div>
            </div>

            <div class="max-w-wide mx-auto p-2">
                <div class="prose mt-8 mx-auto text-black">
                    <RenderBlocks blocks={post.content_blocks} />

                    <hr />

                    <PostMeta date={post.published_at} categoryName={category?.name} categorySlug={category?.slug} />

                    <RenderBlocks blocks={post.footer_blocks} />

                    {/*
                    <div>
                        <h2>See also</h2>

                        <div class="grid gap-4 grid-cols-1 sm:grid-cols-2">
                            <a class="block relative aspect-[4/3] border bg-gray-100" href="/blog-post">
                                <img
                                    class="absolute top-0 left-0 w-full h-full p-0 m-0 opacity-20 object-center object-cover"
                                    src="https://picsum.photos/id/219/800/600"
                                    alt=""
                                />
                                <div class="relative z-1 p-4">Dolorum libero qui soluta deleniti</div>
                            </a>
                            <a class="aspect-[4/3] p-4 border bg-gray-100" href="/about">
                                {' '}
                                About Us
                            </a>
                        </div>
                    </div>
                    */}
                </div>
            </div>
        </main>
    );
}
