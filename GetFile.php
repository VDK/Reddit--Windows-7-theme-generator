<?php
$subreddit =
  (!empty($_GET['sub']) ? $_GET['sub'] : 'EarthPorn');
  
//Get NSFW filter, default = on.  
$nsfw =  
  (!empty($_GET['nsfw']) ? $_GET['nsfw'] : 'On');
//trigger download  
header('Content-Disposition: attachment; filename="'.$subreddit.'-win7theme.theme"');
//Making multiple subreddits posible by replacing the "+" sign

$subreddit_title = str_replace( "+", " + ", $subreddit);  
$subreddit = str_replace( "+", "%2B", $subreddit);  
?>[Theme]
; Windows 7 - IDS_THEME_DISPLAYNAME_AERO
DisplayName=Reddit <?php echo $subreddit_title; ?> theme

; Computer - SHIDI_SERVER
[CLSID\{20D04FE0-3AEA-1069-A2D8-08002B30309D}\DefaultIcon]
DefaultValue=%SystemRoot%\System32\imageres.dll,-109

; UsersFiles - SHIDI_USERFILES
[CLSID\{59031A47-3F72-44A7-89C5-5595FE6B30EE}\DefaultIcon]
DefaultValue=%SystemRoot%\System32\imageres.dll,-123

; Network - SHIDI_MYNETWORK
[CLSID\{F02C1A0D-BE21-4350-88B0-7367FC96EF3C}\DefaultIcon]
DefaultValue=%SystemRoot%\System32\imageres.dll,-25

; Recycle Bin - SHIDI_RECYCLERFULL SHIDI_RECYCLER
[CLSID\{645FF040-5081-101B-9F08-00AA002F954E}\DefaultIcon]
Full=%SystemRoot%\System32\imageres.dll,-54
Empty=%SystemRoot%\System32\imageres.dll,-55

[Control Panel\Cursors]
AppStarting=%SystemRoot%\cursors\aero_working.ani
Arrow=%SystemRoot%\cursors\aero_arrow.cur
Hand=%SystemRoot%\cursors\aero_link.cur
Help=%SystemRoot%\cursors\aero_helpsel.cur
No=%SystemRoot%\cursors\aero_unavail.cur
NWPen=%SystemRoot%\cursors\aero_pen.cur
SizeAll=%SystemRoot%\cursors\aero_move.cur
SizeNESW=%SystemRoot%\cursors\aero_nesw.cur
SizeNS=%SystemRoot%\cursors\aero_ns.cur
SizeNWSE=%SystemRoot%\cursors\aero_nwse.cur
SizeWE=%SystemRoot%\cursors\aero_ew.cur
UpArrow=%SystemRoot%\cursors\aero_up.cur
Wait=%SystemRoot%\cursors\aero_busy.ani
DefaultValue=Windows Aero

[Sounds]
; IDS_SCHEME_DEFAULT


[Control Panel\Desktop]
TileWallpaper=0
WallpaperStyle=10
Pattern=

[VisualStyles]
Path=%SystemRoot%\resources\themes\Aero\Aero.msstyles
ColorStyle=NormalColor
Size=NormalSize
ColorizationColor=0X66779C48
Transparency=1
VisualStyleVersion=10
Composition=1

[MasterThemeSelector]
MTSM=DABJDKT

[Slideshow]
Interval=1800000
Shuffle=1
RSSFeed=http://veradekok.nl/win7theme/rss.php?sub=<? echo $subreddit;?>&nsfw=<?echo $nsfw;?>

[boot]
SCRNSAVE.EXE=
