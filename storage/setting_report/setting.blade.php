<script>
    $( document ).ready(function() {
    //title
    $('title').html('Get Auto History');
    //tombol print
    $('#singleSummaryButton').remove();
    // add tombol
    $('.fastlinkButton').append("<button onclick='window.print()'' class='btn btn-sm btn-primary'>Print Document</button>&nbsp;<button class='btn btn-sm btn-primary' onclick='copy_url()'>Copy Link</button><p id='text-copy'></p>");
    //logo kiri
    $('.leftLogo').attr('src','https://www.getautohistory.com/public/img/1.jpg'); 
    //logo kanan
    $('.rightLogo').attr('src','https://www.getautohistory.com/public/img/Ceklis.png'); 

    //tulisan header
    $('.logo-title h1').html('Your Get Auto History');
    $('.logo-title').css({"text-align": "center"});

    $('.rundate').css({"text-align": "center", "font-size": "16pt"});

    //background biru
    $('.data-art-container').remove();

    //baris 1 kotak kanan
    $('.bbp-badge img').attr({'src' : 'https://www.getautohistory.com/public/img/putih.png', 'alt': ''});

    //YOUR VEHICLE AT A GLANCE
    $('.at-glance').remove();
    //score kiri
    $('.section-tab').remove();
    $('.score-dial').remove();
    //score kanan
    $('.reportSection-tab').remove();

    //logoautocheck
    $('.state-title-brand-img img').remove();

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
    fx('AutoCheck','GetAutoHistory')
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