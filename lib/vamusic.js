//<![CDATA[
$(document).ready(function(){

    var cssSelector = {
        jPlayer: "#jquery_jplayer_1", 
        cssSelectorAncestor: "#jp_container_1"
    };

    var playlist = [
        {
            author:"Blasterjaxx & Timmy Trumpe",
            title:"Narco",
            discription: "Текст песни / описание",
            mp3:"music/Blasterjaxx & Timmy Trumpet – Narco.mp3"
           
        },
        {
          author:"Zayn_Malik_feat._Sia",
            title:"Dusk_Till_Dawn",
            discription: "Текст песни / описание",
            mp3:"music/Zayn_Malik_feat._Sia_-_Dusk_Till_Dawn_(PrimeMusic.cc).mp3"  
            
        }
        
    ];

    var options = {
        swfPath: "js",
        supplied: "oga, mp3",
        wmode: "window",
        smoothPlayBar: false,
        keyEnabled: true
    };

    new jPlayerPlaylist(cssSelector, playlist, options);
});
//]]>