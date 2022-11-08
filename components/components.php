<?php

function card($title, $content, $link, $link_text) {
    return "
        <div class='m-5 bg-gray-50 p-3 rounded-lg'>
            <div class='m-5 flex flex-col items-center gap-5'>
                <h5 class='text-2xl font-semibold'>$title</h5>
                <p class='text-neutral-600'>$content</p>
                <a href='$link' class='btn btn-primary p-3 bg-indigo-500 rounded w-52 text-center text-white'>$link_text</a>
            </div>
        </div>
    ";
}

?>