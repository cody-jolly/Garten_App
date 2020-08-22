// Load overview content on events
$('.garden-bed-overview').on('load', loadOverview('bed-overview', '.garden-bed-overview'));
$('.variety-overview').on('load', loadOverview('variety-overview', '.variety-overview'));
$('.production-overview').on('load', loadOverview('production-overview', '.production-overview'));
$('.harvest-overview').on('load', loadOverview('harvest-overview', '.harvest-overview'));
$('.weather-overview').on('load', loadOverview('weather-overview', '.weather-overview'));
$('#dash__wetter-ip').on('input', ()=>$('#dash__wetter-btn').removeClass('d-none'));
$('#dash__wetter-btn').on('click', ()=>{
    loadOverview('weather-overview/' + $('#dash__wetter-ip').val(), '.weather-overview');
    $('#dash__wetter-btn').addClass('d-none');
});

// Loads overview into element
function loadOverview(overview, element) {
    $(element).html('');
    $.get(window.rootpath + "src/overview/" + overview, function(data){
        $(element).html(data);
    });
}