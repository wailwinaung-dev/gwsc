<?php
    include_once(__DIR__ . '/database/model/RSSTable.php');
    
    $rssTable = new RSSTable();
    $rss_sites = $rssTable->getAll();


    header("Content-Type: text/xml");
    $headerXmlString=<<<header
    <?xml version="1.0" encoding="UTF-8" ?>
    <rss version="2.0">
    <channel>
     <title>Global Wild Swimming and Camping</title>
     <description>Contains the Information of camping sites , local attractions , avaliable package informations and booking to a package.You can i give reivew to each campsite and package.</description>
     <link>http://localhost/gwsc</link>
    header;

    $bodyXmlString="";

    foreach($rss_sites as $rss_site):
        $bodyXmlString.="<item>";
        $bodyXmlString.="<title>{$rss_site['title']}</title>";
        $bodyXmlString.="<description>{$rss_site['description']}</description>";
        $bodyXmlString.="<link>{$rss_site['url']}</link>";
        $bodyXmlString.="</item>";
    endforeach;


    $footXmlString=<<<footer
    </channel>
    </rss>
    footer;

    echo($headerXmlString.$bodyXmlString.$footXmlString);
?>