// bind onclick event to the pagination links
$('.pagination a').click(function () {
    var link = $(this).get(0).href; // get the link from the DOM object
    var form = $('#form1'); // get the form you want to submit
    var segments = link.split('/');
    // assume the page number is the fifth parameter of the link
    $('#page').val(segments[6]); // set a hidden field with the page number
    form.attr('action', link); // set the action attribute of the form
    form.method="post";
    form.submit(); // submit the form
    return false; // avoid the default behaviour of the link
});