<?php
class Link
{
public $url;
public $text;
public $htmllink;

function __construct($url, $text)
{
	$this->url=$url;
	$this->text=$text;
	$this->htmllink = $this->buildLink($url, $text);
}

function __toString()
{
	return "$this->htmllink";
}
	
function buildLink($url, $text)
{
	if(!preg_match("/^http/", $url))
	{
		$url = "https://".$url;
	}
	return "<a href=\"".$url."\">".$text."</a>";
}
}

//Objektinstanz erstellen
$testlink = new Link("google.de", "zu Google");
echo $testlink;
?>