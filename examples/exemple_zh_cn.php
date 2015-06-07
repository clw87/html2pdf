<?php
/**
 * HTML2PDF Librairy - example
 * support Chinese language 
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      ChaiChunyan <chaichunyan@msn.com>
 *
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
    include(dirname(__FILE__).'/res/exemple_zh_cn.php');
    $content = ob_get_clean();

    // convert to PDF
    require_once(dirname(__FILE__).'/../html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'en');
        $html2pdf->setDefaultFont('javiergb');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('exemple_zh_cn.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
