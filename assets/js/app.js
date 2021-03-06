import $ from "jquery"

import 'bootstrap/dist/js/bootstrap'

import './tagsinput'

import Bloodhound from './typeahead.bundle'


$('.confirm-alert').click(function () {
    return confirm ("Etes-vous sûr(e) de vouloir supprimer cet élément ?");
});

let tags = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('label'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: '/autocomplete/tag.json',
});

tags.clearPrefetchCache();
tags.initialize(true);

$('.tag-input').tagsinput({
    typeaheadjs: [{
        highlights: true,

    }, {
        name: 'tags',
        display: 'label',
        value: 'label',
        source: tags
    }]
});

$('#appbundle_event_imageFile_file').next().children().addClass('img-thumbnail');


$(document).ready(function() {
    // get current URL path and assign 'active' class
    let pathname = window.location.pathname;
    $('.navbar-nav > li > a[href="'+pathname+'"]').parent().addClass('active');
})