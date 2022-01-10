<script>
    $( document ).ready(function() {
    //title
    $('title').html('Vin Data Record');
    //tombol print
    $('#singleSummaryButton').remove();
    // add tombol
    $('.fastlinkButton').append("<button class='btn btn-sm btn-primary' onclick='copy_url()'>Copy Link</button><p id='text-copy'></p>");
    //logo kiri
    // $('.leftLogo').attr('src','http://vindatarecord.com/public/images/VINDATA RECORD.png'); 
    // $('.leftLogo').css({"width" : "150px"});
    $('.leftLogo').after("<div class='report-run'></div>");
    $('.leftLogo').remove();
    //logo kanan
    $('.rightLogo').attr('src','http://vindatarecord.com/public/images/VINDATA_RECORD.png'); 
    $('.rightLogo').css({"width" : "150px"});

    //tulisan header
    $('.logo-title h1').html('Your Vin Data Record');
    $('.logo-title').css({"text-align": "center"});

    // $('.rundate').css({"text-align": "center", "font-size": "16pt"});
    $('.rundate').appendTo('.report-run');

    //background biru
    $('.data-art-container').remove();

    //baris 1 kotak kanan
    // $('.bbp-badge img').attr({'src' : 'https://www.getautohistory.com/public/img/putih.png', 'alt': ''});
    $('.bbp-badge img').remove();

    //YOUR VEHICLE AT A GLANCE
    $('.at-glance').remove();
    //score kiri
    $('.section-tab').remove();
    $('.score-dial').remove();
    //score kanan
    $('.reportSection-tab').remove();

    // text sesudah title 
    // $('.summary-header-section').remove();

    //logoautocheck
    $('.state-title-brand-img img').remove();

    $('.icon-section').appendTo('.score-outer');
    $('.score-section').remove();
    $('.owner-section').appendTo('.reportSections-outer');
    $('.ownersimg').appendTo('.bbp-box');
    $('.bbp-header').remove();
    $('.bbp-badge').remove();
    $('.bbp-text').remove();

    $('.row .owner-history-outer').remove();

    $('.section-divider-text').eq(0).html('TITLE BRAND INFORMATION');
    $('.section-divider-text').eq(1).html('ACCIDENT INFORMATION');
    $('.section-divider-text').eq(2).html('DAMAGE VERIFICATION');
    $('.section-divider-text').eq(3).html('EVENT INFORMATION');
    $('.section-divider-text').eq(4).html('ODOMETER VERIFICATION');
    $('.section-divider-text').eq(5).html('SERVICES BULLETIN INFORMATION');

    //link term
    $('.sectionSummaryText a').remove();

    //link
    $('.summary-header-section-glossary').remove();
    $('.backTop').remove();
    $('.glossaryTable').remove();
    $('.termsRow').remove();

    //copyright
    $('footer').css({"text-align": "center"});
    // $('footer b').css({"margin-top": "50px"});
    $('footer').append("<br/><br/><br/><br/><b style='margin-top : 50px;'>Copyright © Get Auto History. All rights reserved</b>");

    //replace all autocheck
    // fx('AutoCheck','GetAutoHistory')
});
function copy_url(){
    var $temp = $("<input>");
    var $url = $(location).attr('href');
    $("body").append($temp);
    $temp.val($url).select();
    document.execCommand("copy");
    $temp.remove();
    $("#text-copy").text("URL copied!");
}
function fx(a,b){
    if(window.find){
        while(window.find(a)){
            var rng=window.getSelection().getRangeAt(0);
            rng.deleteContents();
            rng.insertNode(document.createTextNode(b));
        }
    }else if(document.body.createTextRange){
        var rng=document.body.createTextRange();
        while(rng.findText(a)){
            rng.pasteHTML(b);
        }
    }
}
</script>