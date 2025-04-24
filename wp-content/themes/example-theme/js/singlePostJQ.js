'use strict';

const modal = jQuery('#single-post');
const modalButtons = jQuery('.open-modal');
const closeBtn = jQuery('#close');
const modalContent = jQuery('#modal-content');

const myAJAXFunction = (id) => {
    const url = singlePost.ajax_url;
    const data = {
        action: 'single_post', post_id: id,
    };
    jQuery.post(url, data).done((response) => {
        console.log(response);
        const result = response.data;
        modalContent.empty();
        modalContent.html(`<h2>${result.post_title}</h2>`);
        modalContent.append(result.post_content);
        modal[0].showModal();
    })
}

modalButtons.on('click', (evt) => {
    evt.preventDefault();
    console.log(evt.target.dataset.id);
    myAJAXFunction(evt.target.dataset.id)
})

closeBtn.on('click', () => {
    modal[0].close();
})