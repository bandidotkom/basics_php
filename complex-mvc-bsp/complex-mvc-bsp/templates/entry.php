<?php
if(count($this->_) > 0)
{
?>
<h2><?php echo $this->_['title']; ?></h2>
<p class="entry_header">
<?php echo $this->_['benutzername']; ?> 
schrieb am
<?php echo $this->_['datum']; ?> 
um
<?php echo $this->_['uhrzeit']; ?> 
</p>
<p><?php echo $this->_['content']; ?></p>
<a href="?view=default">Zur&uuml;ck zur &Uuml;bersicht</a>
<?php
}
?>