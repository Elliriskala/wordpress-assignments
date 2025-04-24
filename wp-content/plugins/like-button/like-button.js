'use strict'


const likeForm = document.querySelector('#like-form');

likeForm.addEventListener('submit', async (evt) => {
    evt.preventDefault();

    const postId = document.querySelector('#post_id').value;

    const url = likeButton.ajax_url;
    const data = new URLSearchParams({
        action: 'add_like',
        post_id: postId,
        like_form_nonce: likeButton.nonce
    });
    const response = await fetch(url, {
        method: 'POST',
        body: data,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
    });
    const like = await response.text();
    likeForm.innerHTML = like;
});
