

/*This function is called when state dropdown value change*/
function selectState(state_id){
    if(state_id!="-1"){
        loadData('city',state_id);
    }else{
        $("#city_dropdown").html("<option value='-1'>Select city</option>");
    }
}

/*This function is called when city dropdown value change*/
function selectCity(country_id){
    if(country_id!="-1"){
        loadData('state',country_id);
        $("#city_dropdown").html("<option value='-1'>Select city</option>");
    }else{
        $("#state_dropdown").html("<option value='-1'>Select state</option>");
        $("#city_dropdown").html("<option value='-1'>Select city</option>");
    }
}

/*This is the main content load function, and it will
 called whenever any valid dropdown value changed.*/
function loadData(loadType,loadId){
    var loader_url = baseurl + '/assets/img/ajax-loader.gif';
    $("#"+loadType+"_loader").show();
    $("#"+loadType+"_loader").fadeIn(400).
        html('Please wait... <img src="'+loader_url+'" />');
    $.ajax({
        type: "POST",
        url: "generate_location",
        data: { loadType: loadType, loadId: loadId },
        cache: false,
        success: function( data, status ){
            $("#"+data.loadType+"_loader").hide();
            $("#"+data.loadType+"_dropdown").
                html("<option value='-1'>Select "+data.loadType+"</option>");
            $("#"+data.loadType+"_dropdown").append( data.html );
        }
    });
}
