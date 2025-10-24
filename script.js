$(document).ready(function() {
    
    $('#toggle-info-btn').click(function() {
        
        $('#more-info').slideToggle();

        if ($(this).text().trim() == "Tampilkan Visi Misi") {
            $(this).text("Sembunyikan Visi Misi");
        } else {
            $(this).text("Tampilkan Visi Misi");
        }
    });

});