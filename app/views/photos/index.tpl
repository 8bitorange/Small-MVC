<h2>We got photos</h2>

<!-- this will loop through and load preview of each flickr photo -->
<div id="flickr">
{foreach from=$photos item=photo}
    <a href="{$photo.link}"><img src="{$photo.photo}"></a>
{/foreach}
</div>