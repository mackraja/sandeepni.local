<?php
if($type == 'forgot'){
$title = "Forgot your password? Let's get you a new one.";
$button = "Reset Password";
}elseif($type == 'activate'){
$title = "Just one more step...";
$button = "Activate Account";
}?>
<center>
<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
    <tr>
        <td align="center" valign="top" id="bodyCell">
                <!-- BEGIN TEMPLATE // -->
                <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">
                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN PREHEADER // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="600" id="templatePreheader">
                                <tr>
                                        <td valign="top" class="preheaderContainer" style="padding-top:9px;"></td>
                                </tr>
                            </table>
                            <!-- // END PREHEADER -->
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN HEADER // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">
                                <tr>
                                    <td valign="top" class="headerContainer"><table class="mcnImageBlock" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody class="mcnImageBlockOuter">
    <tr>
        <td style="padding:9px" class="mcnImageBlockInner" valign="top">
            <table class="mcnImageContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody><tr>
                    <td class="mcnImageContent" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;" valign="top">

                            <a href="http://www.goloktech.com" title="" class="" target="_blank">
                                <img alt="GolokTech" src="http://www.goloktech.com/images/logo.png" style="max-width:98px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage" align="middle" width="98">
                            </a>

                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</tbody>
</table><table class="mcnTextBlock" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody class="mcnTextBlockOuter">
<tr>
    <td class="mcnTextBlockInner" valign="top">

        <table class="mcnTextContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="600">
            <tbody><tr>

                <td class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;" valign="top">


                </td>
            </tr>
        </tbody></table>

    </td>
</tr>
</tbody>
</table></td>
                                </tr>
                            </table>
                            <!-- // END HEADER -->
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN BODY // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateBody">
                                <tr>
                                    <td valign="top" class="bodyContainer"><table class="mcnTextBlock" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody class="mcnTextBlockOuter">
<tr>
    <td class="mcnTextBlockInner" valign="top">

        <table class="mcnTextContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="600">
            <tbody><tr>

                <td class="mcnTextContent" style="padding: 9px 18px; text-align: center;" valign="top">

                    <h1 style="color: #606060 ! important;font-family: Helvetica,Arial,sans-serif;font-size: 26px;font-weight: bold;letter-spacing: -1px;line-height: 115%;margin: 0px;padding: 0px;text-align: center;"><?php echo $title;?></h1>
&nbsp;

<h3 style="color:#606060!important;font-family:Helvetica,Arial,sans-serif;font-size:18px;letter-spacing:-.5px;line-height:115%;margin:0;padding:0;text-align:center"><?php echo $username;?></h3>
&nbsp;

<div style="text-align: center;">Click the big button below to <?php echo lcfirst($button);?>.<br>
&nbsp;</div>

                </td>
            </tr>
                                <tr>
    <td style="padding-top:0; padding-right:18px; padding-bottom:18px; padding-left:18px;" class="mcnButtonBlockInner" align="center" valign="top">
        <table class="mcnButtonContentContainer" style="border-collapse: separate ! important;border: 2px solid #6DC6DD;border-radius: 5px;background-color: #6DC6DD;" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td style="font-family: Arial; font-size: 16px; padding: 16px;" class="mcnButtonContent" align="center" valign="middle">
                        <a class="mcnButton " title="<?php echo $button;?>" href="<?php echo $url; ?>" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;"><?php echo $button;?></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
        </tbody></table>

    </td>
</tr>
</tbody>
</table></td>
                                </tr>
                            </table>
                            <!-- // END BODY -->
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN FOOTER // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter">
                                <tr>
                                    <td valign="top" class="footerContainer" style="padding-bottom:9px;"><table class="mcnButtonBlock" border="0" cellpadding="0" cellspacing="0" width="100%">
</table><table class="mcnFollowBlock" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody class="mcnFollowBlockOuter">
<tr>
    <td style="padding:9px" class="mcnFollowBlockInner" align="center" valign="top">
        <table class="mcnFollowContentContainer" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td style="padding-left:9px;padding-right:9px;" align="center">
    <table style="background-color: #F2F2F2;border: 1px solid #EEEEEE;" class="mcnFollowContent" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody><tr>
            <td style="padding-top:9px; padding-right:9px; padding-left:9px;" align="center" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                                <tbody><tr>
                                                        <td valign="top">


                                                <table class="mcnFollowStacked" align="left" border="0" cellpadding="0" cellspacing="0">

                                                    <tbody><tr>
                                                        <td class="mcnFollowIconContent" style="padding-right:10px; padding-bottom:9px;" align="center" valign="top">
                                                            <a href="https://www.facebook.com/goloktechnology" target="_blank"><img src="http://www.goloktech.com/images/color-facebook-96.png" alt="Facebook" class="mcnFollowBlockIcon" style="width:48px; max-width:48px; display:block;" width="48"></a>
                                                        </td>
                                                    </tr>


                                                </tbody></table>


                                                        <!--[if gte mso 6]>
                                                        </td>
                                                <td align="left" valign="top">
                                                        <![endif]-->


                                                <table class="mcnFollowStacked" align="left" border="0" cellpadding="0" cellspacing="0">

                                                    <tbody><tr>
                                                        <td class="mcnFollowIconContent" style="padding-right:10px; padding-bottom:9px;" align="center" valign="top">
                                                            <a href="https://www.linkedin.com/company/goloktech-pvt-ltd" target="_blank"><img src="http://www.goloktech.com/images/color-linkedin-96.png" alt="LinkedIn" class="mcnFollowBlockIcon" style="width:48px; max-width:48px; display:block;" width="48"></a>
                                                        </td>
                                                    </tr>


                                                </tbody></table>


                                                        <!--[if gte mso 6]>
                                                        </td>
                                                <td align="left" valign="top">
                                                        <![endif]-->


                                                <table class="mcnFollowStacked" align="left" border="0" cellpadding="0" cellspacing="0">

                                                    <tbody><tr>
                                                        <td class="mcnFollowIconContent" style="padding-right:0; padding-bottom:9px;" align="center" valign="top">
                                                            <a href="https://plus.google.com/115309546090765039490/about" target="_blank"><img src="http://www.goloktech.com/images/color-googleplus-96.png" alt="Google Plus" class="mcnFollowBlockIcon" style="width:48px; max-width:48px; display:block;" width="48"></a>
                                                        </td>
                                                    </tr>


                                                </tbody></table>


                                                        <!--[if gte mso 6]>
                                                        </td>
                                                <td align="left" valign="top">
                                                        <![endif]-->

                                                        </td>
                                                </tr>
                                        </tbody></table>
            </td>
        </tr>
    </tbody></table>
</td>
</tr>
</tbody></table>

    </td>
</tr>
</tbody>
</table><table class="mcnTextBlock" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody class="mcnTextBlockOuter">
<tr>
    <td class="mcnTextBlockInner" valign="top">

        <table class="mcnTextContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="600">
            <tbody><tr>

                <td class="mcnTextContent" style="padding: 9px 18px; text-align: center;" valign="top">

                    <div style="text-align: center;">© 2001-2015 GolokTech<span style="font-size:10px!important; vertical-align:super">®</span>, All Rights Reserved.<br>
<span style="color:#606060!important">SCO 6, First Floor. • Naya Gaon • 160103 India</span></div>

                </td>
            </tr>
        </tbody></table>

    </td>
</tr>
</tbody>
</table></td>
                                </tr>
                            </table>
                            <!-- // END FOOTER -->
                        </td>
                    </tr>
                </table>
                <!-- // END TEMPLATE -->
        </td>
    </tr>
</table>
</center>
