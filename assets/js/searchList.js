var search_query;

$(document).ready(function(){
    //Add query for search
	$('#add_search').click(function(){
        //validate(Title,ElementID,Mandatory(true/false),MaxLength(Number/false),MinLength(Number/false),Type=(string/email/number/mobile/false),Display(DisplayID/false));
        if(!validate('Search Query','search_txt',man=true,max=100)) return false;
        search_txt = $.trim($('#search_txt').val());
        if(search_txt.length>0)
        {
            $('#search_form').prepend('<label class="button r'+search_txt+'">'+search_txt+'<span id="r'+search_txt+'" onclick="removeClass(\'r'+search_txt+'\');">X</span></label><input class="r'+search_txt+'" type="hidden" name="search_new[]" value="'+search_txt+'"/>');
        }
        $('#search_txt').val("");
        if($('.download-main-inner').css('display')=='none')
            $('.download-main-inner').show();
    });

    $('#search_txt').keypress(function(e){
        if(e.which==13)
        {
            $('#add_search').click();
            return false;
        }
    });

    //Submit search
	$('#restsubmit').click(function(){

		//assign queries to new temporary input and replace it to original input called "search[]"
		var querys = document.getElementsByName('search_new[]');
		var boxLength = querys.length;
		if($("[name='search[]']").length>0)
			$("[name='search[]']").remove();
        var total_skills=0;
		for(i=0;i<boxLength;i++)
		{
            total_skills=total_skills+1;
			$('#search_form').prepend('<input type="hidden" name="search[]" value="'+querys[i].value+'"/>');
		}
        if(total_skills==0)
        {
            alert("Please enter atleast one query.");
            return false;
        }

        $.ajax({
                url: baseurl+'member/searchSkillsAjax', 
                type: 'post',
                dataType: 'html',
                data: $('#myform').serialize(),
                success:function(result)
                {
                    $('#search-content').html(result);
                },
                error:function()
                {
                    alert('Internal error, Please try agian!');
                }
        });
    });

	//Search from saved quries
	$('.existSearch').click(function(){
		var id=$(this).attr('data');
        $.ajax({
                url: baseurl+'member/searchSkillsAjax/exist/'+id, 
                type: 'post',
                data: $('#myform').serialize(),
                success:function(result)
                {
                    $('#search-content').html(result);
                },
                error:function()
                {
                    alert('Internal error, Please try agian!');
                }
            });
    });

	//Save current query
    function saveSearchAs(){
    //$('#saveSearch').click(function(){
        var title=$('#search_title').val().trim();
        if(!title)
        {
            alert("The title cannot be empty.");
            return false;
        }

		$.ajax({
			url:baseurl+"member/saveSearchList",
			type:"POST",
			data:{"search":window.search_query,"title":title},
            dataType: 'json',
			success:function(data){
                if(data.resultset.success=='1')
                {
                    var id=data.resultset.id;
                    $('#previousSearch').prepend('<tr id='+id+'><td><a href="javascript:void(0);">'+title+'</a><span onclick="removeExistSearch('+id+');">X</span></td></tr>');
    				$('#saveSearch').remove();
                }
                else if(data.resultset.success=='exist')
                {
                    alert('Cannot save. You already saved a serach with this name.');
                }
                else
                {
                    alert('Internal error, Please try agian!');
                }

			},
            error:function()
            {
                alert('Internal error, Please try agian!');
            }
		});
	//});
    }

    //Configure dialog box
    $( "#dialog_box" ).dialog({
        autoOpen: false,
        modal: true,
        buttons: [ { text: "Save Search", click: function() { if(saveSearchAs()!=false) $( this ).dialog("close"); } },
        { text: "Cancel", click: function() { $( this ).dialog("close"); } } ]
    });

    //Open dialog box
    $('#saveSearch').click(function(){
        window.search_query=$(this).attr('search');
        $('#search_title').val($('#current_search').html());
        $("#dialog_box").dialog("open");
    });
});

function serialize_form()
{
     return $('#myform').serialize();
}

//Remove saved skill
function removeExistSearch(strID)
{
    $.ajax({
            url:baseurl+"member/deleteSearchList",
            type:"POST",
            dataType:"json",
            data:{"sid":strID},
            success:function(data){
                if(data.resultset.success=='1')
                    $('#'+strID).remove();
                else
                    alert("Internal Error. Please try again!");
            },
            error:function(){
                alert("Internal Error. Please try again!");
            }
        });
}

function removeClass(attr)
{
    $('.'+attr).remove();
}