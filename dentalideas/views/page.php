<?php
    return "
    <!DOCTYPE html>
    <html>
        <head> 
            <meta charset='utf-8'/>
            <title>$pageData->title</title>
             $pageData->css 

        </head>
        <body>
            <div id='warpper'>
                $pageData->content
            </div>
        </body>
    </html>";
?>