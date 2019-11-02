<?php define(othemes_arama, "Arama"); ?>
<form id="searchform" method="get" action="<?php echo home_url( '/' ); ?>">
<input type="text" value="Filmin adını yaz ve enterla." name="s" id="searchbox" onfocus="if (this.value == '<?php echo othemes_arama; ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo othemes_arama; ?>';}" />
<input type="submit" id="searchbutton" value="ARA" />
</form>
